<?php
/*
Plugin Name: wordpress plugin for genmapper  
//https://github.com/ebela/gen-mapper

stilusok
church-circles/
church-circles-czech/style.css template.js


used components:
- https://github.com/select2/select2   
- http://loudev.com (multiselect)
- https://github.com/maykinmedia/dual-listbox (multiselect)

*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


define( 'GENMAPPER_VERSION',       '1.0.0' ); // Current plugin version
define( 'GENMAPPER_URL',           plugin_dir_url( __FILE__ ) );
define( 'GENMAPPER_DIR',           plugin_dir_path( __FILE__ ) );

//define('GENMAPPER_THEME','church-circles-czech');
define('GENMAPPER_THEME','movementeer');


define( 'GENMAPPER_MAP_GOOGLE_API_KEY','AIzaSyBCRjAY3pXBm6MI4tECGJjP-6txX9tXQvU');


require_once GENMAPPER_DIR.'/extras.inc.php';

//function genmapper_set_db_tables_name()
//{
	global $wpdb;
	global $genmap_t_genmap;
	$genmap_t_genmap = $wpdb->prefix . 'genmap';
	global $genmap_t_genmap_nodes;
	$genmap_t_genmap_nodes = $wpdb->prefix . 'genmap_nodes';
	global $genmap_t_genmap_countries;
	$genmap_t_genmap_countries = $wpdb->prefix . 'genmap_countries'; 
	
	global $genmap_fields_string;
	$genmap_fields_string = 'id,parentId,name,leaderType,place,date,attenders,believers,baptized,church,elementWord,elementPrayer,elementLove,elementWorship,elementMakeDisciples,elementLeaders,elementGive,elementLordsSupper,elementBaptism,threeThirds,trainingUsed,trainingPhase,active,actionSteps,contact';
	
//}
//add_action( 'init', 'genmapper_set_db_tables_name');




function genmapper_init()
{


	wp_register_style(  'jq-select2_css', GENMAPPER_URL . "select2.min.css" );
	wp_register_script( 'jq-select2_js', GENMAPPER_URL . "select2.min.js", array('jquery') );

	wp_register_style(  'jq-datepicker_css', GENMAPPER_URL . "datepicker.min.css" );
	wp_register_script( 'jq-datepicker_js', GENMAPPER_URL . "datepicker.min.js", array('jquery') );

	
	wp_register_style(  'hint_css', GENMAPPER_URL . "hint.min.css" );
	wp_register_style(  'genmapper_main_css', GENMAPPER_URL . "style.css", array(), time() );
	wp_register_style(  'genmapper_base_css', GENMAPPER_URL . "style-base.css", array('genmapper_main_css','hint_css','jq-select2_css','jq-datepicker_css'), time() );

	wp_register_script( 'genmapper_main_script', GENMAPPER_URL . 	"genmapper.js" , array('d3','i18next', 'loadsh','genmapper_translations','FileSaver','xlsx', 'genmapper_template_js','jquery','jq-select2_js','genmapper_google_api-async-defer','jq-datepicker_js'), time());
	wp_register_style(  'genmapper_template_css', GENMAPPER_URL . 			GENMAPPER_THEME."/style.css" );
	wp_register_script( 'genmapper_template_js', GENMAPPER_URL . 	GENMAPPER_THEME."/template.js" , array('d3','i18next', 'loadsh','FileSaver','xlsx'), time());
	
	wp_register_script( 'd3', GENMAPPER_URL . "d3.min.js" );
	wp_register_script( 'i18next', GENMAPPER_URL . "i18next.min.js" , array('i18next-languagedetector'));
	wp_register_script( 'i18next-languagedetector', GENMAPPER_URL . "i18nextBrowserLanguageDetector.min.js" );
	wp_register_script( 'loadsh', GENMAPPER_URL . "lodash.min.js" );
	wp_register_script( 'genmapper_translations', GENMAPPER_URL . "translations.js" );
	wp_register_script( 'FileSaver', GENMAPPER_URL . "FileSaver.min.js" );
	wp_register_script( 'xlsx', GENMAPPER_URL . "xlsx.core.min.js" );

	wp_localize_script( 'genmapper_template_js', 'GenMapperBase', 
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php'), 
			'baseurl' => GENMAPPER_URL, 
			'themeurl' => GENMAPPER_URL.''.GENMAPPER_THEME.'/', 
			'default_country_code' => 'DEFAULTCOUNTRYCODE'
		) );
	

	wp_register_script( 'genmapper_google_api-async-defer', "https://maps.googleapis.com/maps/api/js?key=".GENMAPPER_MAP_GOOGLE_API_KEY."&callback=genmapper_gmap_init&libraries=places" );
	


/*
	css
	
	scipts
<script src="template.js"></script>
<script src="../d3.min.js"></script>
<script src="../i18next.min.js"></script>
<script src="../i18nextBrowserLanguageDetector.min.js"></script>
<script src="../lodash.min.js"></script>
<script src="../translations.js"></script>
<script src="../genmapper.js"></script>
<script src="../FileSaver.min.js"></script>
<script src="../xlsx.core.min.js"></script>	
	
	
*/
}


add_action( 'wp_loaded', 'genmapper_init');

/*
 https://premium.wpmudev.org/blog/creating-database-tables-for-plugins/?utm_expid=3606929-67.KOuGWaEfRS2elZCEv5f8LA.0&utm_referrer=https%3A%2F%2Fwww.google.com%2F
 https://codex.wordpress.org/Creating_Tables_with_Plugins
*/
function genmapper_create_db() {
//TODO: a tablak lerehozasat aktualizalni
	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'genmap_nodes';

	$sql= "
	/* CREATE TABLE */
CREATE TABLE IF NOT EXISTS $table_name(
  uid INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT, 
  id INT(11), 
  parentId DECIMAL(10, 2), 
  name VARCHAR(100), 
  leaderType VARCHAR(100), 
  place VARCHAR(100), 
  date DATE,
  attenders DECIMAL(10, 2), 
  believers DECIMAL(10, 2), 
  baptized DECIMAL(10, 2), 
  church DECIMAL(10, 2), 
  elementWord DECIMAL(10, 2), 
  elementPrayer DECIMAL(10, 2), 
  elementLove DECIMAL(10, 2), 
  elementWorship DECIMAL(10, 2), 
  elementMakeDisciples DECIMAL(10, 2), 
  elementLeaders DECIMAL(10, 2), 
  elementGive DECIMAL(10, 2), 
  elementLordsSupper DECIMAL(10, 2), 
  elementBaptism DECIMAL(10, 2), 
  threeThirds VARCHAR(100), 
  trainingUsed VARCHAR(100), 
  trainingPhase VARCHAR(100), 
  active DECIMAL(10, 2), 
  actionSteps VARCHAR(100), 
  contact VARCHAR(100),
  user_id INT(11),  /* creator user */ 
  last_mod_user_id INT(11), 
  last_mod_date DATETIME,

  genmap_id INT(11) NOT NULL, 
  
  
  UNIQUE KEY `genmap_nodes_uid` (`uid`)
) $charset_collate";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	//dbDelta( $sql );
}

register_activation_hook( __FILE__, 'genmapper_create_db' );


function genmapper_register_shortcode_requirements()
{
	add_action( 'wp_print_footer_scripts', 'genmapper_user_country_is_set' );	
	wp_enqueue_style('genmapper_base_css');
	wp_enqueue_style('genmapper_template_css');
	wp_enqueue_script('genmapper_main_script' );
}


global $genmapper_displayed;
$genmapper_displayed = false;

function genmapper_sc($atts, $content)
{
	global $genmapper_displayed;
	if ( $genmapper_displayed ) 
	{
		error_log("Genmapper already displayed");
	}
	genmapper_register_shortcode_requirements();
    //run actual function for rendering
    //$content = shortcode_person_slider($atts);
    
    $cu = wp_get_current_user();
    $display_name = $cu->ID ? $cu->display_name : '<a href="'.get_site_url(null,'/wp-login.php').'">Not logged in user</a>';
    //error_log(var_export($cu,1));
    
    $genmapper_info_content = '<span class="username">'. $display_name .'</span>
	' . ( $cu->ID ? 
		'| Genmaps: '.genmapper_genmap_select().' | '.'<input type="button" name="new_genmap" value="New genmap" onclick="javascript:window.location.reload(false);"> ' 
		: 
		'' ). '';	
    
    $content = '';
    
    $contentGenmapperInfo='
<style>
.gm_inprogress_wrap1 {
visibility: hidden;
z-index: 999999;
position: absolute;
left: 0;
top: 0;
width: 100%;
height: 100%;
}

.gm_inprogress_wrap2 {
visibility: visible;
font-size: 80%;
}

.gm_inprogress_inlineblock {
position: relative;
display: -moz-inline-box;
display: inline-block;
}

.gm_inprogress_wrap2 .gm_inprogress_msg_style {
background-color: #f9edbe;
border: 1px solid #f0c36d;
-webkit-border-radius: 0 0 2px 2px;
border-radius: 0 0 2px 2px;
-webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.2);
box-shadow: 0 2px 4px rgba(0,0,0,0.2);
color: #222;
padding: 6px 10px;
}

.gm_inprogress_inner {
	padding-left: 2px;white-space: nowrap;
}
	
</style>
<div id="genmapper_inprogress" class="gm_inprogress_wrap1" style="display: none">
	<div class="gm_inprogress_wrap2" style="text-align: center;">
		<div class="gm_inprogress_inlineblock">
			<div class="gm_inprogress_msg_style">
				<div class="gm_inprogress_inlineblock">
					<div class="gm_inprogress_inner">
						Loading...
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

    
    <section id="genmapper_info">

	<div id="genmapper_info-content">'.$genmapper_info_content.'</div>
	<div id="genmapper_info-editor" style="display:none">
	<form onsubmit="genmapper.saveInfoOnClick(); return false;">
	<input type="hidden" name="id">
	<ul style="list-style-type:none">
	<li>
	<label for name="genmapper_name">Name</label>
	<input type="text" name="name" id="genmapper_name">
	</li>
	<li>
	<label for name="genmapper_country_code">Country</label>
	'. genmapper_country_select() .'
	</li>
	<li>
	<input type="button" value="save" onclick="genmapper.saveInfoOnClick();" >
	<input type="button" value="delete" onclick="genmapper.deleteGenmapOnClick();" >
	</li>
	</ul>
	    
	</form>
	<p id="genmapper_changesarenotsaved">Changes are not saved. Name your genmap in order to have the genmap saved</p>
	</div>
    
  </section>';
  $content.='
  <aside id="left-menu">
  </aside>
  <section id="intro">
    <div id="intro-content"></div>
  </section>

  <section id="alert-message">
  </section>

  <section id="edit-project">
  </section>

  <section id="edit-group">
  </section>
  
  '.$contentGenmapperInfo.'


  <section id="genmap-main">
    <svg id="genmap-main-svg" width="100%"></svg>
  </section>
';
    $content.= PHP_EOL;
	$genmapper_displayed = true;
    
    return $content;
}

add_shortcode("genmapper", 'genmapper_sc');


/*
	
 */
function genmapper_genmap_select()
{
	global $wpdb;
	global $genmap_t_genmap;
	
	
	$user_id = get_current_user_id();
	
	$h='<select class="select2" data-placeholder="Select genmap here to load from database" onchange="window.genmapper.selectGenmapOnChange(this);">'.PHP_EOL;
	$h.='<option value="">Select genmap here to load from database</option>'.PHP_EOL;
	
	$q="SELECT `id`, `country_code`, `name`, DATE(`last_mod_date`) AS `mod_date` FROM $genmap_t_genmap WHERE `deleted` IS NULL  ORDER BY `last_mod_date` DESC";
	
	$where = '';
	if ( ! is_super_admin() )
	{
		$is_country_manager = get_the_author_meta( 'genmapper_country_manager', $user_id );
		$genmapper_country_code = get_the_author_meta( 'genmapper_country_code', $user_id );

		if ( $is_country_manager  ) {
			$where=" AND `country_code` IN ('".implode("','", $genmapper_country_code)."') ";
		}
		else {
			$where=' AND `user_id` = '. $user_id.' ';
		}
		
	}
	$q="SELECT `id`, `country_code`, `name`, DATE(`last_mod_date`) AS `mod_date` FROM $genmap_t_genmap WHERE `deleted` IS NULL $where ORDER BY `last_mod_date` DESC";
	
	$rows=$wpdb->get_results($q);
	
	foreach ($rows as $r )
	{
		//$option_text = is_super_admin() ? $r->country_code.' - ':'';
		$option_text =  ($r->country_code ? $r->country_code:'&nbsp;&nbsp;&nbsp;') .' - ';
		$option_text.= htmlspecialchars($r->name).' - '.$r->mod_date;
		
		$h.='<option value="'.$r->id.'">'.$option_text.'</option>'.PHP_EOL;
	}
	$h.='</select>';
	return $h;
}

function genmapper_country_select($selected=null, $args = array())
{
	global $wpdb;
	global $genmap_t_genmap_countries;
	
	if ( is_bool($args)) {
		$args  = array('echo'=>$args);
	}
	$default_size = 10;
	
	$echo = isset($args['echo'])? $args['echo'] : false;
	
	$multiple = isset($args['multi'])? ' multiple="multiple"':'';
	
	$size = $multiple ? ( isset($args['size']) && intval($args['size'])>0 ? intval($args['size']) : $default_size ) : '';
	
	$size = $size ? ' size="'.$size.'"':'';
    
    
    if ( is_string($selected) && count($selected)>0 )
    {
	    $selected = array($selected);
	    
    }
    else if ( ! is_array($selected) )
    {
	    $selected = array();
    }
    
    
    $countries=$wpdb->get_results("SELECT `name`, `alpha3_code` AS `code` FROM $genmap_t_genmap_countries WHERE `active` = 'Y'  ORDER BY `name`");
	
	$class = $multiple ? 'multiselect':'select2';
    
    $content='
    <select class="'.$class.'" name="country_code[]" id="genmapper_country_code" data-placeholder="Select a country"'.$multiple.$size.'>';
    foreach ($countries as $c) {
	    $_selected = in_array($c->code , $selected ) ? ' selected':'';
	    $content.='<option'.$_selected .' value="'.$c->code.'">'.$c->name.'</option>';
	}
    $content.='</select>';
    if ( $echo ) echo $content;
    return $content;
} 

function genmapper_create_genmap($gi = null)
{
	global $wpdb;
	global $genmap_t_genmap;
	
	$name = isset($gi['name']) && $gi['name'] ? $gi['name'] : 'Genmap - '.date('Y.m.d. H:i:s');
	$country_code=isset($gi['country_code']) && $gi['country_code'] ? $gi['country_code'] : get_user_meta(get_current_user_id(), 'genmapper_country_code', true);

	
	$data = is_array($gi) ? $gi : array();
	$data['name'] = $name;
	$data['user_id']=get_current_user_id();
	$data['last_mod_user_id']=get_current_user_id();
	$data['last_mod_date']=date('Y-m-d H:i:s');
	$data['create_date']=date('Y-m-d H:i:s');

	$data['country_code'] = $country_code;


	$wpdb->insert($genmap_t_genmap,$data);
	return $wpdb->insert_id;
}

function genmapper_get_genmap($genmap_id)
{
	global $wpdb;
	global $genmap_t_genmap;
	$genmap_info=$wpdb->get_row("SELECT * FROM $genmap_t_genmap WHERE `id`=$genmap_id");
	return $genmap_info;
}

function genmapper_is_node_exists($nodeData, $genmap_id=null)
{
	global $wpdb;
	global $genmap_t_genmap_nodes;
	
	
	if ( $genmap_id === null)
	{
		$genmap_id = $nodeData['genmap_id'];
	}


	$whereIdAndParentId = "`id` = ".$nodeData['id']." AND parentId ". ( $nodeData['id'] == 0 ? ' IS NULL ' : ' = '.$nodeData['parentId'] );
	$node_exists = $wpdb->get_var( "SELECT COUNT(*) FROM $genmap_t_genmap_nodes  WHERE $whereIdAndParentId AND genmap_id=$genmap_id AND `deleted` IS NULL" );
	//error_log(__FUNCTION__.' node exists result: '.var_export($node_exists,1).'  return value: '.var_export($node_exists == 1,1));
	error_log(__FUNCTION__.' '.$wpdb->last_query);
	return  $node_exists > 0;
}

function genmapper_add_node($nodeData, $genmap_id=null)
{
	global $wpdb;
	global $genmap_t_genmap_nodes;


	if ( ! isset($nodeData['genmap_id']) && intval($genmap_id) == 0 )
	{
		
		error_log('genmap id is not set.');
		return false;
	}
	
	//hozzaadas elott ellenorizzuk hogy volt-e mar ilyen node, ha igen, akkor azt toroljuk
	if (  genmapper_is_node_exists($nodeData, $genmap_id) )
	{
		genmapper_remove_node($nodeData, $genmap_id);
	}

	$nodeData = genmapper_fix_node_properties_type($nodeData);
	$nodeData['user_id'] = get_current_user_id();
	$nodeData['last_mod_user_id'] = get_current_user_id();
	$nodeData['last_mod_date'] = date('Y-m-d H:i:s');
	
	if ( ! isset($nodeData['genmap_id']) ) {
		$nodeData['genmap_id'] = $genmap_id;
	}
	
	error_log(__FUNCTION__.' -- '. var_export($nodeData,1));

/**
			$data = $n;
			$data['genmap_id']=$genmap_id;
			$data['user_id']=get_current_user_id();
			$data['last_mod_user_id']=get_current_user_id();
			$data['last_mod_date']=date('Y.m.d H:i:s');
			if ( $data['id'] == 0 ) $data['parentId'] = null;
			if ( $data['date'] =='0000-00-00 00:00:00' ) $data['date'] = null;
			
			$wpdb->insert($table_name, $data );

*/

	$wpdb->insert($genmap_t_genmap_nodes, $nodeData );
	error_log(__FUNCTION__.' '.$wpdb->last_query);
	return $wpdb->insert_id;
}


/*
	
*/
function genmapper_remove_node($nodeData, $genmap_id=null)
{
	global $wpdb;
	global $genmap_t_genmap_nodes;
	
	
	if ( $genmap_id === null)
	{
		$genmap_id = $nodeData['genmap_id'];
	}
	
	if ( ! $genmap_id )
	{
		error_log('genmap id is not set.');
		return false;
	}
	
	//elvileg a root node nem torolheto.
	if ( $nodeData['id'] == 0 ) $nodeData['parentId'] = null;

	error_log('deleting node '.var_export($nodeData,1 ));  
	$updated_rowscount = $wpdb->update( 
		$genmap_t_genmap_nodes, 
		array( 'deleted'=> current_time('mysql', 1) 
		),
		//strtotime("now") ), //date('Y-m-d H:i:s') ) , //''.current_time('mysql', 1)).'', 
		array( 'genmap_id'=>$genmap_id, 
			   'id' => $nodeData['id'], 
			   'parentId' => $nodeData['parentId'],
			   'deleted'=>null 
		) ,
		array( '%s' )
			   
		
		);  
	error_log(__FUNCTION__.' '.$wpdb->last_query);
	error_log('deleted row count: '.var_export($updated_rowscount ,1)) ;  
	
	return  $updated_rowscount;
}


/*
	A paramterben kapott node tulajdonsagainak a tipusat 
*/
function genmapper_fix_node_properties_type($node)
{
	foreach ($node as &$e )
	{
		if ( is_string($e) )
		{
			if ( strtolower($e) == 'true' ) $e = 1;
			if ( strtolower($e) == 'false' ) $e = 0;
			$e=stripslashes($e);
		}
	}
	if ( $node['id'] == 0 ) $node['parentId'] = null;
	if ( $node['date'] == '0000-00-00 00:00:00' ) $node['date'] = null;
	
	return $node;
}

function ajax_genmapper_nodes2db()
{
//	echo('called '.__FUNCTION__);
	error_log(__FUNCTION__.' post count:'.count($_POST).' ..  nodes count:'.count($_POST['nodes']).' _POST: '. var_export($_POST,1));
	error_log(__FUNCTION__.' start');
	
	
	//uj genmap letrehozasa
	
	$genmap_id = genmapper_create_genmap();
	if ( ! $genmap_id )
	{
		echo 'ERROR: cant create genmap';
		wp_die();
	}
	
	$nodes = isset($_POST['nodes']) && is_array($_POST['nodes']) ? $_POST['nodes']:null;
	error_log(__FUNCTION__.' nodes: '.var_export($nodes,1));

	genmapper_store_nodes($genmap_id, $nodes);
	error_log(__FUNCTION__.' end');

	$answer['genmap']=genmapper_get_genmap($genmap_id);
	$answer['message']='Uploaded nodes stored in db';	
	echo json_encode($answer);

	wp_die();
}

function genmapper_store_nodes($genmap_id, $nodes) {
	
	if ( is_array($nodes) ) {
		global $wpdb;
		global $genmap_t_genmap_nodes;
		$table_name = $genmap_t_genmap_nodes;
		error_log(__FUNCTION__.' storing nodes '.var_export($nodes,1));
		
		//shadow copy of nodes.. maybe not needed..
		$_nodes = $nodes;

		foreach ($nodes as $i=>$n )
		{
			$generation=0;
			$_i=$i;$safetyexitcounter=100000;
			while ( $_nodes[$_i]['parentId']!='' && $safetyexitcounter-- ) { 
				$generation++; 
				$_i=$_nodes[$_i]['parentId']; 
			}
			$n['generation']=$generation;
			error_log(__FUNCTION__.' storing node '.var_export($n,1));
			genmapper_add_node($n, $genmap_id);
		}
	}
}
function ajax_genmapper_send_event()
{
	global $wpdb;
	
	error_log(__FUNCTION__.' start');

	$data = isset($_POST['data']) && is_array($_POST['data']) ? $_POST['data']:null;

	if ( ! is_user_logged_in() )
	{
		$msg =  " user not logged in, changes ignored.";
		error_log(__FUNCTION__. $msg.var_export($data,1) );
		echo $msg;
		return 0;
	}
	
	
	$error = array();
	if ( ! isset($data['cmd']) )
	{
		error_log('hibas hivas');
		wp_die();
	}

	if ( ! isset($data['nodeData']) )
	{
		error_log (__FUNCTION__.' cmd['.$cmd.'] hianyzo parameter');
		wp_die();
		
	}
	
	
	$cmd = $data['cmd'];
	error_log(__FUNCTION__.' command: ['.$cmd.']  data: '.var_export($data,1));
	
	$answer = array();
	
	if ( $cmd == 'addNode' ) {
		$answer['new_node_id'] = genmapper_add_node($data['nodeData'],$data['genmap']['id']);
	}
	else if ( $cmd == 'editNode' ) {
		$answer['edited_node_id'] = genmapper_add_node($data['nodeData'],$data['genmap']['id']);
	}
	else if ( $cmd == 'removeNode' ) {
		$answer['removed_node_count'] = genmapper_remove_node($data['nodeData'],$data['genmap']['id']);
	}
	
	

	if ( count($error) )
	{
		error_log(__FUNCTION__.' ERROR: '.var_export($error,1));
		
	}

	error_log(__FUNCTION__.' end');
	echo json_encode($answer);
	wp_die();
}

//db-bol betolti a get parameterben kapott id-ju genmapot es azt visszaadja
function ajax_genmapper_import_from_db()
{
	global $wpdb;
	global $genmap_fields_string;
	global $genmap_t_genmap_nodes;
	global $genmap_t_genmap;
	
	$genmap_id = isset($_GET['genmap_id']) && is_numeric($_GET['genmap_id']) ? intval($_GET['genmap_id']):null;
	
	error_log(__FUNCTION__ .' genmapid:'.$genmap_id);
	
	if ( ! $genmap_id )
	{
		echo 'ERROR:'.__LINE__;
		wp_die();
	}
	$eol='';
	$csv = $genmap_fields_string;
	$csv.=PHP_EOL;


	//header('Content-type: text/plain');
	$q="SELECT $genmap_fields_string FROM $genmap_t_genmap_nodes  WHERE genmap_id=$genmap_id AND `deleted` IS NULL ORDER BY id";
	error_log("Query: ".PHP_EOL.$q.PHP_EOL);
	$rows=$wpdb->get_results($q);
	if ( false ) //regi stringes megoldas
	{
	foreach ($rows as $r )
	{
		$csv.=$eol;
		$eol=PHP_EOL;
		foreach ($r as $f )
		{
			$csv.='"'.$f.'"'.',';
		}
	}
	}
	if ( true ) // uj, a memoriaban csv filet irok pelda alapjan
	{
	$fp = fopen('php://temp', 'w+');
	foreach ($rows as $r) {
		$fields = array();

		foreach ($r as $f )
		{
			$fields[] = $f;
		}
	    // Add row to CSV buffer
	    fputcsv($fp, $fields);
	}
	rewind($fp); // Set the pointer back to the start

	$csvhead = $genmap_fields_string.PHP_EOL;
	$default_node_csv_line = "0,,Default Leader's Name,fullTimeMissionary,,,0,0,0,0,0,0,0,0,0,0,0,0,0,,,,1,action,contact";

	
	$csv = stream_get_contents($fp); // Fetch the contents of our CSV
	$csv = count($csv)>0 ? $csv : $default_node_csv_line;
	
	
	
	fclose($fp); // Close our pointer and free up memory and /tmp space
	}
	$answer['genmap']=genmapper_get_genmap($genmap_id);
	$answer['csv']=$csvhead.$csv;
	
	echo json_encode($answer);
	wp_die();
}

function ajax_genmapper_update_genmap_info()
{
	global $wpdb;
	global $genmap_t_genmap;
	
	$genmap_info = array();
	if ( isset($_POST['genmap_info']) ) {
//		parse_str($_POST['genmap_info'],$genmap_info);
		$genmap_info = $_POST['genmap_info'];
		if ( $genmap_info['deleted']=='') unset($genmap_info['deleted']);
	}
	error_log(__FUNCTION__ .' posted genmap info ' .var_export($genmap_info,1));
	
	if ( ! is_array($genmap_info) )
	{
		echo 'ERROR: genmap info not found';
		wp_die();
	}

	if ( ! is_user_logged_in() )
	{
		$msg = ("user not logged in, changes ignored. data: ".var_export($genmap_info,1)  );
		$result = 0;
		$answer = array('result'=>$result,'message'=>$msg);
		error_log(__FUNCTION__.' '.var_export($answer,1));
		echo json_encode($answer);

		return 0;
	}
	
	if ( $genmap_info['id'] == 0 ) {
		
		$genmap_info['id'] = genmapper_create_genmap($genmap_info);
		$result = 3;
		$msg = 'new genmapper created with id : '. $genmap_info['id'];

		$nodes = isset($_POST['nodes']) && is_array($_POST['nodes']) ? $_POST['nodes']:null;
		genmapper_store_nodes($genmap_info['id'], $nodes);

		$answer = array('result'=>$result,'message'=>$msg,'genmap_info'=>$genmap_info);
		error_log(__FUNCTION__.' '.var_export($answer,1));
		echo json_encode($answer);
	
		wp_die();
		
	}
	else
	{
		$update = true;
		
		if ( ! is_super_admin() ) {
			$update = false;
			
			$_genmap_info=$wpdb->get_row("SELECT * FROM $genmap_t_genmap WHERE `id`="
			.intval($genmap_info['id']));
			$country_code=get_user_meta(get_current_user_id(), 'genmapper_country_code', true);
	
			error_log(__FUNCTION__. ' '. var_export($country_code,1).' '.var_export($genmap_info,1).' '.var_export($_genmap_info,1));
	
	
			if ( $_genmap_info && ! $_genmap_info->country_code ) {
				if ( $country_code ) {
					$genmap_info['country_code'] = $country_code[0];
					$update = true;
				}
			}
			
			if ( count($country_code)>0 &&  in_array($_genmap_info->country_code,$country_code) ) {
					$update = true;
			}
			
		}
	
		if ( isset($_POST['delete']) && $_POST['delete'] == 'true' ) {
			//jogosultsag ellenorzes
	
			//torles 
			$genmap_info['deleted'] = date('Y-m-d H:i:s');
			$result=2;
		}
	
		
		
	
		if ( $update )
		{
			
		error_log('updating '.  $genmap_t_genmap. var_export($genmap_info,1). var_export(array( 'id' => $genmap_info['id']),1 ) ); 
	
		$genmap_info['last_mod_user_id']=get_current_user_id();
		$genmap_info['last_mod_date']=date('Y-m-d H:i:s');
	
		$updated_rowscount = $wpdb->update( $genmap_t_genmap, $genmap_info, array( 'id' => $genmap_info['id'] ), array('%s') );  
		
		
			$result =isset($result)?$result:1;
			$msg = 'successful updated genmap record '.$updated_rowscount;
		}
		else
		{
			$result = 0;
			$msg = 'not updated genmap_info';
		}
	
	
	}
	
	$answer = array('result'=>$result,'message'=>$msg);
	error_log(__FUNCTION__.' '.var_export($answer,1));
	echo json_encode($answer);

	wp_die();
	
}

add_action( 'wp_ajax_genmapper_nodes2db', 'ajax_genmapper_nodes2db' );
add_action( 'wp_ajax_nopriv_genmapper_nodes2db', 'ajax_genmapper_nodes2db' );

add_action( 'wp_ajax_genmapper_send_event', 'ajax_genmapper_send_event' );
add_action( 'wp_ajax_nopriv_genmapper_send_event', 'ajax_genmapper_send_event' );

add_action( 'wp_ajax_genmapper_import_from_db', 'ajax_genmapper_import_from_db' );
add_action( 'wp_ajax_nopriv_genmapper_import_from_db', 'ajax_genmapper_import_from_db' );

add_action( 'wp_ajax_genmapper_update_genmap_info', 'ajax_genmapper_update_genmap_info' );
add_action( 'wp_ajax_nopriv_genmapper_update_genmap_info', 'ajax_genmapper_update_genmap_info' );





//////////////////////////////////////////////////////////////////////
// user meta
/////////////////////////////////////////////////////////////////////
// Hook is used to save custom fields that have been added to the WordPress profile page (if current user) 

add_action( 'personal_options_update', 'update_extra_profile_fields'  );

// Hook is used to save custom fields that have been added to the WordPress profile page (if not current user) 
add_action( 'edit_user_profile_update', 'update_extra_profile_fields' );

function update_extra_profile_fields( $user_id ) {
	
	$genmapper_country_manager = get_the_author_meta( 'genmapper_country_manager', $user_id );
	$genmapper_country_code = get_the_author_meta( 'genmapper_country_code', $user_id );
	error_log('$genmapper_country_manager:'.var_export($genmapper_country_manager,1));
	error_log('$genmapper_country_code:'.var_export($genmapper_country_code,1));
	error_log('$_POST["genmapper_country_manager"]:'.var_export($_POST['genmapper_country_manager'],1));
	
	$disabled = ! $genmapper_country_manager && ! is_super_admin() ? ' disabled':'';
	//$disabled=false;
    if ( current_user_can( 'edit_user', $user_id ) && ! $disabled )
    {
	    error_log(__FUNCTION__.' '. var_export($_POST,1));
	    update_user_meta($user_id, 'genmapper_country_manager',isset($_POST['genmapper_country_manager']));
	    if ( isset($_POST['country_code']) )
	    	update_user_meta($user_id, 'genmapper_country_code',$_POST['country_code']);

    }
}

// *********************************** USER ADATLAP A USER MODULBAN  ***********************
// Hooks near the bottom of profile page (if current user) 
add_action('show_user_profile', 'custom_user_profile_fields');

// Hooks near the bottom of the profile page (if not current user) 
add_action('edit_user_profile', 'custom_user_profile_fields');

// @param WP_User $user
function custom_user_profile_fields( $user ) {

$genmapper_country_manager = get_the_author_meta( 'genmapper_country_manager', $user->ID );
error_log('$genmapper_country_manager:'.var_export($genmapper_country_manager,1));
$disabled = ! $genmapper_country_manager && ! is_super_admin() ? ' disabled':'';
$genmapper_country_select_args = array('echo'=>true, 'multi'=> is_super_admin() );

?>
    <h3>Genmapper settings</h3>
    <table class="form-table">
        <tr>
            <th>
                <label for="genmapper_single_user"><?php _e( 'Country Manager' ); ?></label>
            </th>
            <td>
				<input<?php echo $disabled ?> type="checkbox" name="genmapper_country_manager" value="1" <?php checked( $genmapper_country_manager, 1 ); ?> />
            </td>
        </tr>
        <tr>
            <th>
                <label for="country_code"><?php _e( 'Country' ); ?></label>
            </th>
            <td>
				<?php genmapper_country_select( get_the_author_meta( 'genmapper_country_code', $user->ID ) , $genmapper_country_select_args); ?>
            </td>
        </tr>
    </table>
<?php
	return;
}

function genmapper_load_custom_wp_admin_style($hook) {
        // Load only on ?page=mypluginname
        if(! in_array($hook , array('user-edit.php','profile.php') ) ) {
                return;
        }
        $usedMultiselect = 'dualistbox';
		if ( $usedMultiselect == 'multiselect') {
			wp_register_script( 'multiselect', GENMAPPER_URL . "jquery.multi-select.js" );
			wp_register_style(  'multiselect_css', GENMAPPER_URL . "multi-select.css", array(), time() );
		}
		else if (  $usedMultiselect == 'dualistbox' ) {
		//<script src="https://cdn.jsdelivr.net/npm/dual-listbox/dist/dual-listbox.min.js"></script>
		//<link href="https://cdn.jsdelivr.net/npm/dual-listbox/dist/dual-listbox.css">
			wp_register_script( 'multiselect', "https://cdn.jsdelivr.net/npm/dual-listbox/dist/dual-listbox.min.js" );
			wp_register_style(  'multiselect_css', "https://cdn.jsdelivr.net/npm/dual-listbox/dist/dual-listbox.css" );
		}
		else
		{
			wp_die('selected multiselect not know');
		}

		wp_enqueue_style('multiselect_css');
		wp_enqueue_script('multiselect' );

		add_action( 'admin_print_scripts', function() {
    // I'm using NOWDOC notation to allow line breaks and unescaped quotation marks.
    echo <<<'EOT'
<script type="text/javascript">
jQuery(function($){
    //$('.multiselect').multiSelect({keepOrder:true});
    document.dualListbox = new DualListbox('.multiselect');
});
</script>
EOT;
}, PHP_INT_MAX );	
		

        //wp_enqueue_style( 'custom_wp_admin_css', plugins_url('admin-style.css', __FILE__) );
}
add_action( 'admin_enqueue_scripts', 'genmapper_load_custom_wp_admin_style' );

/**
 * Ha nincs meta akkor megjeleniti az orszagvalaszto overlayt	
 *	
*/
function genmapper_user_country_is_set()
{
	if ( !is_user_logged_in() || is_admin() || is_super_admin() )
	{
		return;
	}
	$meta=get_user_meta(get_current_user_id(), 'genmapper_country_code', true);
	
	if ( ! $meta ||  (is_array($meta) && count($meta)==0 ) )
	{
	?>
	<div id="genmapoverlay">
		<div id="genmapoverlay-country-selector">You must set your country before continue the browsing.
			<form method="post"><?php genmapper_country_select(null,true) ?></form>
		</div>
	</div>
	<style>
	#genmapoverlay {
    position: fixed; /* Sit on top of the page content */
    display: block; /* Hidden by default */
    width: 100%; /* Full width (cover the whole page) */
    height: 100%; /* Full height (cover the whole page) */
    top: 0; 
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.5); /* Black background with opacity */
    z-index: 2; /* Specify a stack order in case you're using a different order for other elements */
    cursor: pointer; /* Add a pointer on hover */
	}
	#genmapoverlay-country-selector
	{text-align: center; color:white;font-size:32px; background-color: red; position: absolute;top:33px; margin-left: 30%;margin-right: 30%; margin-top: 20%;}	


	</style>
	<script>
		var $ = window.jQuery;
		$('#genmapoverlay-country-selector select').change( function() {
			$.post( GenMapperBase.ajaxurl , {
				'action' : 'genmapper_user_country_selected',
				///'nodes': JSON.stringify( nodes )
				'choosed_country': $(this).val()
			}).done(function(data) { 
				console.log('response', data );
				if ( data == 'country_set' ) {
					$('#genmapoverlay').hide();
				}
			});
		});

		
	</script>
	<?php	
	}
}

//moved to shortcode requirements add_action( 'wp_print_footer_scripts', 'genmapper_user_country_is_set' );

function ajax_genmapper_user_country_selected() {
	
	$choosed_country =  isset($_POST['choosed_country']) ? $_POST['choosed_country'] : '';
	
	if ( $choosed_country )
	{
			$meta=get_user_meta(get_current_user_id(), 'genmapper_country_code', true);
			if ( $meta == '' || (is_array($meta) && count($meta)==0 ) )
			{
		    	update_user_meta(get_current_user_id(), 'genmapper_country_code',$choosed_country);
				echo 'country_set';
			}

	}
	else
	{
		
	}
	
	wp_die();
}

add_action( 'wp_ajax_genmapper_user_country_selected', 'ajax_genmapper_user_country_selected' );


function genmapper_footer_scripts () { ?>

	<script language="javascript" type="text/javascript">
		window.jQuery( document ).ready( function( $ ) {
			$(".select2").select2();
			$( document ).ajaxStart(function() {
			  console.log( "Triggered ajaxStart handler." );
			  $('#genmapper_inprogress').show();
			});
			$( document ).ajaxComplete(function() {
			  console.log( "Triggered ajaxComplete handler." );
			  $('#genmapper_inprogress').hide();
			});	
			
			$('#edit-date').datepicker();
		} );
	</script>

<?php } 

add_action( 'wp_print_footer_scripts', 'genmapper_footer_scripts');
