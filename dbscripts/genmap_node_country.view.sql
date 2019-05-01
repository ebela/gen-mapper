DROP VIEW IF EXISTS
    `wp_genmap_node_country`;
CREATE VIEW `wp_genmap_node_country` AS SELECT
    `n`.`uid` AS `uid`,
    `n`.`genmap_id` AS `genmap_id`,
    `n`.`id` AS `id`,
    `n`.`parentId` AS `parentId`,
    `n`.`generation` AS `generation`,
    `n`.`deleted` AS `deleted`,
    `n`.`name` AS `name`,
    `n`.`leaderType` AS `leaderType`,
    `n`.`place` AS `place`,
    `n`.`date` AS `date`,
    `n`.`attenders` AS `attenders`,
    `n`.`believers` AS `believers`,
    `n`.`baptized` AS `baptized`,
    `n`.`church` AS `church`,
    `n`.`elementWord` AS `elementWord`,
    `n`.`elementPrayer` AS `elementPrayer`,
    `n`.`elementLove` AS `elementLove`,
    `n`.`elementWorship` AS `elementWorship`,
    `n`.`elementMakeDisciples` AS `elementMakeDisciples`,
    `n`.`elementLeaders` AS `elementLeaders`,
    `n`.`elementGive` AS `elementGive`,
    `n`.`elementLordsSupper` AS `elementLordsSupper`,
    `n`.`elementBaptism` AS `elementBaptism`,
    `n`.`threeThirds` AS `threeThirds`,
    `n`.`trainingUsed` AS `trainingUsed`,
    `n`.`trainingPhase` AS `trainingPhase`,
    `n`.`active` AS `active`,
    `n`.`actionSteps` AS `actionSteps`,
    `n`.`contact` AS `contact`,
    `n`.`user_id` AS `user_id`,
    `n`.`last_mod_user_id` AS `last_mod_user_id`,
    `n`.`last_mod_date` AS `last_mod_date`,
    `c`.`name` AS `country`,
    `c`.`alpha3_code` AS `alpha3_code`
FROM
    (
        (
            `wp_genmap_nodes` `n`
        JOIN `wp_genmap` `g` ON
            ((`n`.`genmap_id` = `g`.`id`))
        )
    JOIN `wp_genmap_countries` `c` ON
        (
            (`c`.`alpha3_code` = `g`.`country_code`)
        )
    )
WHERE
    (
        ISNULL(`g`.`deleted`) AND ISNULL(`n`.`deleted`) AND(`n`.`active` = 1)
    )

