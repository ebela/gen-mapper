<?php
/*
Plugin Name: wordpress plugin for genmapper  
//https://github.com/ebela/gen-mapper

stilusok
church-circles/
church-circles-czech/style.css template.js

*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


define( 'GENMAPPER_VERSION',       '1.0.0' ); // Current plugin version
define( 'GENMAPPER_URL',           plugin_dir_url( __FILE__ ) );
define( 'GENMAPPER_DIR',           plugin_dir_path( __FILE__ ) );

//define('GENMAPPER_THEME','church-circles-czech');
define('GENMAPPER_THEME','movementeer');


function genmapper_init()
{
	
	wp_register_style(  'genmapper_base_css', GENMAPPER_URL . 			"style-base.css" );

	wp_register_script( 'genmapper_main_script', GENMAPPER_URL . 	"genmapper.js" , array('d3','i18next', 'loadsh','genmapper_translations','FileSaver','xlsx', 'genmapper_template_js','jquery'));
	wp_register_style(  'genmapper_template_css', GENMAPPER_URL . 			GENMAPPER_THEME."/style.css" );
	wp_register_script( 'genmapper_template_js', GENMAPPER_URL . 	GENMAPPER_THEME."/template.js" , array('d3','i18next', 'loadsh','FileSaver','xlsx'),1);
	
	wp_register_script( 'd3', GENMAPPER_URL . "d3.min.js" );
	wp_register_script( 'i18next', GENMAPPER_URL . "i18next.min.js" , array('i18next-languagedetector'));
	wp_register_script( 'i18next-languagedetector', GENMAPPER_URL . "i18nextBrowserLanguageDetector.min.js" );
	wp_register_script( 'loadsh', GENMAPPER_URL . "lodash.min.js" );
	wp_register_script( 'genmapper_translations', GENMAPPER_URL . "translations.js" );
	wp_register_script( 'FileSaver', GENMAPPER_URL . "FileSaver.min.js" );
	wp_register_script( 'xlsx', GENMAPPER_URL . "xlsx.core.min.js" );

	wp_localize_script( 'genmapper_template_js', 'GenMapperBase', array( 'ajaxurl' => admin_url( 'admin-ajax.php'), 'baseurl' => GENMAPPER_URL, 'themeurl' => GENMAPPER_URL.''.GENMAPPER_THEME.'/'  ) );


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

	global $wpdb;
	$charset_collate = $wpdb->get_charset_collate();
	$table_name = $wpdb->prefix . 'genmap';

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

  upload_group_id INT(11), 
  
  
  UNIQUE KEY `genmap_uid` (`uid`)
) $charset_collate";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
}

register_activation_hook( __FILE__, 'genmapper_create_db' );


function genmapper_register_shortcode_requirements()
{
	wp_enqueue_style('genmapper_base_css');
	wp_enqueue_style('genmapper_template_css');
	wp_enqueue_script('genmapper_main_script' );
}


function genmapper_sc($atts, $content)
{
	genmapper_register_shortcode_requirements();
    //run actual function for rendering
    //$content = shortcode_person_slider($atts);
    
    $content = '';
    
    //$content.= '<h1>GEN MAPPER</h1>';
    $content.='<aside id="left-menu"></aside>

  <section id="intro">
    <div id="intro-content"></div>
  </section>

  <section id="alert-message">
  </section>

  <section id="edit-group">
  </section>

  <section id="genmap-main">
    <svg id="genmap-main-svg" width="100%"></svg>
  </section>
';
    $content.= PHP_EOL;
    
    return $content;
}

add_shortcode("genmapper", 'genmapper_sc');


function ajax_genmapper_nodes2db()
{
//	echo('called '.__FUNCTION__);
//	error_log(__FUNCTION__.' start');
//	error_log(var_export($_POST,1));
//	error_log(var_export($_POST['nodes'],1));
//	$nodes = isset($_POST['nodes']) ? json_decode($_POST['nodes'],1):null;
	$nodes = isset($_POST['nodes']) && is_array($_POST['nodes']) ? $_POST['nodes']:null;
//	error_log(var_export($nodes,1));
	
	if ( is_array($nodes) )
	{
		global $wpdb;
		$table_name = $wpdb->prefix . 'genmap';
		
		$upload_group_id = null;

		foreach ($nodes as $i=>$n )
		{
			error_log('n'.$i.'  '.var_export($n,1));
			$data = $n;
			if ( $upload_group_id ) $data['upload_group_id'] = $upload_group_id;
			$data['user_id']=get_current_user_id();
			$data['last_mod_user_id']=get_current_user_id();
			$data['last_mod_date']=date('Y.m.d H:i:s');
			$wpdb->insert(
				$table_name,
				$data
			);
			if ( ! $upload_group_id ) $upload_group_id  = $wpdb->insert_id; 
		}
	}
	error_log(__FUNCTION__.' end');
	
}

add_action( 'wp_ajax_genmapper_nodes2db', 'ajax_genmapper_nodes2db' );
