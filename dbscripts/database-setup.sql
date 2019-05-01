-- genmapponkent ## wp_genmap_info
CREATE OR REPLACE
 VIEW `wp_genmap_info`
 AS
SELECT genmap_id
, `gm`.`country_code`
, count(1) as `# of MD`
, count( if(`leaderType` = 'fullTimeMissionary',1,null)) AS `# of fulltime Missionaries`
, count( if(`leaderType` = 'existingLayBeliever',1,null)) AS `# of existing Lay Believer`
, count( if(`leaderType` = 'leadersDisciple',1,null)) AS `# of Disciples leader`

, count(if(`generation` = 0,1,null) ) AS `# of 1st gen`
, count(if(`generation` = 1,1,null) ) AS `# of 2nd gen`
, count(if(`generation` = 2,1,null) ) AS `# of 3th gen`
, count(if(`generation` = 3,1,null) ) AS `# of 4th gen`
, count(if(`generation` = 4,1,null) ) AS `# of 5th gen`
, count(if(`generation` = 5,1,null) ) AS `# of 6th gen`
, count(if(`generation` = 6,1,null) ) AS `# of 7th gen`
, count(if(`generation` = 7,1,null) ) AS `# of 8th gen`
, count(if(`generation` = 8,1,null) ) AS `# of 9th gen`
, count(if(`generation` = 9,1,null) ) AS `# of 10th gen`

, sum(`attenders`) AS `# of attenders`
, sum(`believers`) AS `# of believers`
, sum(`baptized`) AS `# of baptized`

, sum(`church`) AS `# of churches` 
, count(1) - sum(`church`) AS `# of groups`
, count(1)-sum(`active`) AS `# of non active communities`
, count( if ( (elementWord + elementPrayer + elementLove+ elementWorship+ elementMakeDisciples+ elementLeaders+ elementGive+ elementLordsSupper+ elementBaptism) > 6, 1, null) )  AS `morethan6ElementsCount` 
, count( if ( (elementWord + elementPrayer + elementLove+ elementWorship+ elementMakeDisciples+ elementLeaders+ elementGive+ elementLordsSupper+ elementBaptism) < 4, 1, null) )  AS `lessthan4ElementsCount`
, count( if ( (elementWord + elementPrayer + elementLove+ elementWorship+ elementMakeDisciples+ elementLeaders+ elementGive+ elementLordsSupper+ elementBaptism) > 6, 1, null) ) 
/ ( sum(1) / 100 ) AS `% of communities doing > 6 elements`	
, count( if ( (elementWord + elementPrayer + elementLove+ elementWorship+ elementMakeDisciples+ elementLeaders+ elementGive+ elementLordsSupper+ elementBaptism) < 4, 1, null) ) 
/ ( sum(1) / 100 )  `% of communities doing < 4 elements`

, count( IF( LEFT(TRIM(`date`),4) = '2010',1,null ) ) AS `2010`
, count( IF( LEFT(TRIM(`date`),4) = '2011',1,null ) ) AS `2011`
, count( IF( LEFT(TRIM(`date`),4) = '2012',1,null ) ) AS `2012`
, count( IF( LEFT(TRIM(`date`),4) = '2013',1,null ) ) AS `2013`
, count( IF( LEFT(TRIM(`date`),4) = '2014',1,null ) ) AS `2014`
, count( IF( LEFT(TRIM(`date`),4) = '2015',1,null ) ) AS `2015`
, count( IF( LEFT(TRIM(`date`),4) = '2016',1,null ) ) AS `2016`
, count( IF( LEFT(TRIM(`date`),4) = '2017',1,null ) ) AS `2017`
, count( IF( LEFT(TRIM(`date`),4) = '2018',1,null ) ) AS `2018`
, count( IF( LEFT(TRIM(`date`),4) = '2019',1,null ) ) AS `2019`
, count( IF( LEFT(TRIM(`date`),4) = '2020',1,null ) ) AS `2020`

, sum( elementWord ) AS `Word`
, sum( elementPrayer ) AS `Prayer`
, sum( elementLove ) AS `Love`
, sum( elementWorship ) AS `Worship`
, sum( elementMakeDisciples ) AS `Make disciples`
, sum( elementLeaders ) AS `Leaders`
, sum( elementGive ) AS `Give`
, sum( elementLordsSupper ) AS `Lord's supper`
, sum( elementBaptism ) AS `Baptism`
, max( `wp_genmap_nodes`.last_mod_date ) AS `last_mod_date`

FROM `wp_genmap_nodes` 

JOIN `wp_genmap` AS `gm` ON ( `wp_genmap_nodes`.`genmap_id` = `gm`.`id`  ) 

WHERE `wp_genmap_nodes`.`deleted` is null AND `gm`.`deleted` is null

GROUP BY genmap_id

---------------------------------------------
-- Orszagonkent ## wp_genmap_countries_info

CREATE OR REPLACE
 VIEW `wp_genmap_countries_info`
 AS
SELECT 
  `country_code`
, sum( `# of MD` ) AS `# of MD`
, sum( `# of fulltime Missionaries` ) AS `# of fulltime Missionaries`
, sum( `# of existing Lay Believer` ) AS `# of existing Lay Believer`
, sum( `# of Disciples leader` ) AS `# of Disciples leader`

, sum( `# of 1st gen` ) AS `# of 1st gen`
, sum( `# of 2nd gen` ) AS `# of 2nd gen`
, sum( `# of 3th gen` ) AS `# of 3th gen`
, sum( `# of 4th gen` ) AS `# of 4th gen`
, sum( `# of 5th gen` ) AS `# of 5th gen`
, sum( `# of 6th gen` ) AS `# of 6th gen`
, sum( `# of 7th gen` ) AS `# of 7th gen`
, sum( `# of 8th gen` ) AS `# of 8th gen`
, sum( `# of 9th gen` ) AS `# of 9th gen`
, sum( `# of 10th gen` ) AS `# of 10th gen`

, sum( `# of attenders` ) AS `# of attenders`
, sum( `# of believers` ) AS `# of believers`
, sum( `# of baptized` ) AS `# of baptized`

, sum( `# of churches` ) AS `# of churches` 
, sum( `# of MD` ) - sum( `# of churches` ) AS `# of groups`
, sum( `# of non active communities` ) AS `# of non active communities`
, sum( `morethan6ElementsCount` ) AS `morethan6ElementsCount`
, sum( `lessthan4ElementsCount` ) AS `lessthan4ElementsCount`
, sum( `morethan6ElementsCount` ) / ( sum(`# of MD`) / 100 ) AS `% of communities doing > 6 elements`	
, sum( `lessthan4ElementsCount` ) / ( sum(`# of MD`) / 100 ) AS `% of communities doing < 4 elements`

, sum( `2010` ) AS `2010`
, sum( `2011` ) AS `2011`
, sum( `2012` ) AS `2012`
, sum( `2013` ) AS `2013`
, sum( `2014` ) AS `2014`
, sum( `2015` ) AS `2015`
, sum( `2016` ) AS `2016`
, sum( `2017` ) AS `2017`
, sum( `2018` ) AS `2018`
, sum( `2019` )  AS `2019`
, sum( `2020` )  AS `2020`

, sum( `Word` )/ ( sum(`# of MD`) / 100 ) AS `Word`
, sum( `Prayer` )/ ( sum(`# of MD`) / 100 ) AS `Prayer`
, sum( `Love` )/ ( sum(`# of MD`) / 100 ) AS `Love`
, sum( `Worship` )/ ( sum(`# of MD`) / 100 ) AS `Worship`
, sum( `Make disciples` ) / ( sum(`# of MD`) / 100 ) AS  `Make disciples`
, sum( `Leaders` )/ ( sum(`# of MD`) / 100 ) AS `Leaders`
, sum( `Give` )/ ( sum(`# of MD`) / 100 ) AS `Give`
, sum( `Lord's supper` )/ ( sum(`# of MD`) / 100 ) AS  `Lord's supper`
, sum( `Baptism` )/ ( sum(`# of MD`) / 100 ) AS `Baptism`
, max( `last_mod_date` ) AS `last_mod_date`


FROM `wp_genmap_info` 

GROUP BY `country_code`

---------------------------------------------


ALTER TABLE `wp_genmap_nodes` ADD INDEX(`last_mod_date`);

