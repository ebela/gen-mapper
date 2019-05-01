SELECT MONTH(`last_mod_date`) AS month,
 (if( `deleted` is not null and `deleted`<>'0000-00-00 00:00:00', 
     ( SELECT count(1) FROM `wp_genmap_nodes` AS `inner1` WHERE `gn`.`deleted` = `inner1`.`last_mod_date` ),
     'NOTDELETED'
    
    
    ) ) ,
`gn`.* FROM `wp_genmap_nodes` AS `gn` WHERE `genmap_id` = 40

GROUP BY `gn`.`genmap_id`, `gn`.`id`, `gn`.`parentId`, month( `gn`.`last_mod_date`)



;

SELECT 
-- *
 (`uid`),`genmap_id`,`id`,`parentId`,`generation`,`deleted`,`last_mod_date`
 ,
 (if( `deleted` is not null and `deleted`<>'0000-00-00 00:00:00', 
     ( SELECT count(1) FROM `wp_genmap_nodes` AS `inner1` WHERE `wp_genmap_nodes` . `deleted` = `inner1`.`last_mod_date` ),
     'NOTDELETED'
    
    
    ) ) 
FROM `wp_genmap_nodes` 



WHERE 
`genmap_id` = 41

AND `last_mod_date`< date('2018-06-01')

-- GROUP BY ( CONCAT(`genmap_id`, `id`, `parentId` ))

---

az 
SELECT 
*
FROM wp_genmap_nodes AS gn1
 JOIN 
	( SELECT max(uid) as uid FROM wp_genmap_nodes GROUP BY genmap_id, id, parentId WHERE last_mod_date<date('2018-06') ) AS latest_nodes ON ( gn1.uid = latest_nodes.uid )
	

--//
SELECT max(uid) as uid FROM wp_genmap_nodes WHERE last_mod_date < date('2018-06-01') GROUP BY genmap_id, id, parentId


--
SELECT YEAR(`last_mod_date`), MONTH(`last_mod_date`) FROM `wp_genmap_nodes` WHERE 1 GROUP BY YEAR(`last_mod_date`), MONTH(`last_mod_date`) AS `dates`

SELECT DATE_FORMAT(`last_mod_date`, '%Y-%m-01')  AS `dt` FROM `wp_genmap_nodes` WHERE 1 GROUP BY YEAR(`last_mod_date`), MONTH(`last_mod_date`) AS `dates`

--

SELECT DATE_FORMAT(`last_mod_date`, '%Y-%m-01')  AS `dt` FROM `wp_genmap_nodes` WHERE 1 GROUP BY YEAR(`last_mod_date`), MONTH(`last_mod_date`) AS `dates`
 JOIN 
( SELECT 
*
FROM wp_genmap_nodes AS gn1
 JOIN 
	( SELECT max(uid) as uid FROM wp_genmap_nodes WHERE last_mod_date < date(`dt`) GROUP BY genmap_id, id, parentId ) AS latest_nodes ON ( gn1.uid = latest_nodes.uid )
) AS `mq` ON `dates`.`dt` = DATE_FORMAT(`mq`.`last_mod_date`, '%Y-%m-01')

-----




LET @dates = ( SELECT DATE_FORMAT(`last_mod_date`, '%Y-%m-01')  AS `dt` FROM `wp_genmap_nodes` WHERE 1 GROUP BY YEAR(`last_mod_date`), MONTH(`last_mod_date`) AS `dates` )

SELECT @dates
-----


SELECT @dt:= DATE_FORMAT(`dates`.`last_mod_date`, '%Y-%m-01')  AS `dt` 
FROM `wp_genmap_nodes`  AS `dates`
JOIN 
( 
SELECT 
*
FROM wp_genmap_nodes AS gn1
 JOIN 
	( SELECT max(uid) as muid FROM wp_genmap_nodes WHERE last_mod_date < @dt  GROUP BY genmap_id, id, parentId ) AS latest_nodes ON ( gn1.uid = latest_nodes.muid )
		
) AS `mq` ON ( `dates`.`dt` = DATE_FORMAT(`mq`.`last_mod_date`, '%Y-%m-01') )



WHERE 1 GROUP BY YEAR(`dates`.`last_mod_date`), MONTH(`dates`.`last_mod_date`)











