DROP VIEW `wp_genmap_info`; CREATE  VIEW `wp_genmap_info` AS SELECT
    `wp_genmap_nodes`.`user_id` AS `user_id`,
    `wp_users`.`display_name` AS `created_by`,
    `wp_genmap_nodes`.`genmap_id` AS `genmap_id`,
    `gm`.`name` AS `genmap_name`,
    `gm`.`country_code` AS `country_code`,
    COUNT(1) AS `no_OF_md`,
    COUNT(
        IF(
            (
                `wp_genmap_nodes`.`leaderType` = 'fullTimeMissionary'
            ),
            1,
            NULL
        )
    ) AS `no_OF_fulltime_missionaries`,
    COUNT(
        IF(
            (
                `wp_genmap_nodes`.`leaderType` = 'existingLayBeliever'
            ),
            1,
            NULL
        )
    ) AS `no_OF_existing_lay_believer`,
    COUNT(
        IF(
            (
                `wp_genmap_nodes`.`leaderType` = 'leadersDisciple'
            ),
            1,
            NULL
        )
    ) AS `no_OF_disciples_leader`,
    COUNT(
        IF(
            (`wp_genmap_nodes`.`generation` = 0),
            1,
            NULL
        )
    ) AS `no_OF_1st_gen`,
    COUNT(
        IF(
            (`wp_genmap_nodes`.`generation` = 1),
            1,
            NULL
        )
    ) AS `no_OF_2nd_gen`,
    COUNT(
        IF(
            (`wp_genmap_nodes`.`generation` = 2),
            1,
            NULL
        )
    ) AS `no_OF_3th_gen`,
    COUNT(
        IF(
            (`wp_genmap_nodes`.`generation` = 3),
            1,
            NULL
        )
    ) AS `no_OF_4th_gen`,
    COUNT(
        IF(
            (`wp_genmap_nodes`.`generation` = 4),
            1,
            NULL
        )
    ) AS `no_OF_5th_gen`,
    COUNT(
        IF(
            (`wp_genmap_nodes`.`generation` = 5),
            1,
            NULL
        )
    ) AS `no_OF_6th_gen`,
    COUNT(
        IF(
            (`wp_genmap_nodes`.`generation` = 6),
            1,
            NULL
        )
    ) AS `no_OF_7th_gen`,
    COUNT(
        IF(
            (`wp_genmap_nodes`.`generation` = 7),
            1,
            NULL
        )
    ) AS `no_OF_8th_gen`,
    COUNT(
        IF(
            (`wp_genmap_nodes`.`generation` = 8),
            1,
            NULL
        )
    ) AS `no_OF_9th_gen`,
    COUNT(
        IF(
            (
                `wp_genmap_nodes`.`generation` = 9
            ),
            1,
            NULL
        )
    ) AS `no_OF_10th_gen`,
    SUM(`wp_genmap_nodes`.`attenders`) AS `no_OF_attenders`,
    SUM(`wp_genmap_nodes`.`believers`) AS `no_OF_believers`,
    SUM(`wp_genmap_nodes`.`baptized`) AS `no_OF_baptized`,
    SUM(`wp_genmap_nodes`.`church`) AS `no_OF_churches`,
    (
        COUNT(1) - SUM(`wp_genmap_nodes`.`church`)
    ) AS `no_OF_groups`,
    (
        COUNT(1) - SUM(`wp_genmap_nodes`.`active`)
    ) AS `no_OF_non_active_communities`,
    COUNT(
        IF(
            (
                (
                    (
                        (
                            (
                                (
                                    (
                                        (
                                            (
                                                `wp_genmap_nodes`.`elementWord` + `wp_genmap_nodes`.`elementPrayer`
                                            ) + `wp_genmap_nodes`.`elementLove`
                                        ) + `wp_genmap_nodes`.`elementWorship`
                                    ) + `wp_genmap_nodes`.`elementMakeDisciples`
                                ) + `wp_genmap_nodes`.`elementLeaders`
                            ) + `wp_genmap_nodes`.`elementGive`
                        ) + `wp_genmap_nodes`.`elementLordsSupper`
                    ) + `wp_genmap_nodes`.`elementBaptism`
                ) > 6
            ),
            1,
            NULL
        )
    ) AS `morethan6elementscount`,
    COUNT(
        IF(
            (
                (
                    (
                        (
                            (
                                (
                                    (
                                        (
                                            (
                                                `wp_genmap_nodes`.`elementWord` + `wp_genmap_nodes`.`elementPrayer`
                                            ) + `wp_genmap_nodes`.`elementLove`
                                        ) + `wp_genmap_nodes`.`elementWorship`
                                    ) + `wp_genmap_nodes`.`elementMakeDisciples`
                                ) + `wp_genmap_nodes`.`elementLeaders`
                            ) + `wp_genmap_nodes`.`elementGive`
                        ) + `wp_genmap_nodes`.`elementLordsSupper`
                    ) + `wp_genmap_nodes`.`elementBaptism`
                ) < 4
            ),
            1,
            NULL
        )
    ) AS `lessthan4elementscount`,
    FORMAT(
        (
            COUNT(
                IF(
                    (
                        (
                            (
                                (
                                    (
                                        (
                                            (
                                                (
                                                    (
                                                        `wp_genmap_nodes`.`elementWord` + `wp_genmap_nodes`.`elementPrayer`
                                                    ) + `wp_genmap_nodes`.`elementLove`
                                                ) + `wp_genmap_nodes`.`elementWorship`
                                            ) + `wp_genmap_nodes`.`elementMakeDisciples`
                                        ) + `wp_genmap_nodes`.`elementLeaders`
                                    ) + `wp_genmap_nodes`.`elementGive`
                                ) + `wp_genmap_nodes`.`elementLordsSupper`
                            ) + `wp_genmap_nodes`.`elementBaptism`
                        ) > 6
                    ),
                    1,
                    NULL
                )
            ) /(SUM(1) / 100)
        ),
        1
    ) AS `perc_OF_communities_doing_more_6_elements`,
    FORMAT(
        (
            COUNT(
                IF(
                    (
                        (
                            (
                                (
                                    (
                                        (
                                            (
                                                (
                                                    (
                                                        `wp_genmap_nodes`.`elementWord` + `wp_genmap_nodes`.`elementPrayer`
                                                    ) + `wp_genmap_nodes`.`elementLove`
                                                ) + `wp_genmap_nodes`.`elementWorship`
                                            ) + `wp_genmap_nodes`.`elementMakeDisciples`
                                        ) + `wp_genmap_nodes`.`elementLeaders`
                                    ) + `wp_genmap_nodes`.`elementGive`
                                ) + `wp_genmap_nodes`.`elementLordsSupper`
                            ) + `wp_genmap_nodes`.`elementBaptism`
                        ) < 4
                    ),
                    1,
                    NULL
                )
            ) /(SUM(1) / 100)
        ),
        1
    ) AS `perc_OF_communities_doing_less_4_elements`,
    COUNT(
        IF(
            (
                LEFT(TRIM(`wp_genmap_nodes`.`date`),
                4) = '2010'
            ),
            1,
            NULL
        )
    ) AS `2010`,
    COUNT(
        IF(
            (
                LEFT(TRIM(`wp_genmap_nodes`.`date`),
                4) = '2011'
            ),
            1,
            NULL
        )
    ) AS `2011`,
    COUNT(
        IF(
            (
                LEFT(TRIM(`wp_genmap_nodes`.`date`),
                4) = '2012'
            ),
            1,
            NULL
        )
    ) AS `2012`,
    COUNT(
        IF(
            (
                LEFT(TRIM(`wp_genmap_nodes`.`date`),
                4) = '2013'
            ),
            1,
            NULL
        )
    ) AS `2013`,
    COUNT(
        IF(
            (
                LEFT(TRIM(`wp_genmap_nodes`.`date`),
                4) = '2014'
            ),
            1,
            NULL
        )
    ) AS `2014`,
    COUNT(
        IF(
            (
                LEFT(TRIM(`wp_genmap_nodes`.`date`),
                4) = '2015'
            ),
            1,
            NULL
        )
    ) AS `2015`,
    COUNT(
        IF(
            (
                LEFT(TRIM(`wp_genmap_nodes`.`date`),
                4) = '2016'
            ),
            1,
            NULL
        )
    ) AS `2016`,
    COUNT(
        IF(
            (
                LEFT(TRIM(`wp_genmap_nodes`.`date`),
                4) = '2017'
            ),
            1,
            NULL
        )
    ) AS `2017`,
    COUNT(
        IF(
            (
                LEFT(TRIM(`wp_genmap_nodes`.`date`),
                4) = '2018'
            ),
            1,
            NULL
        )
    ) AS `2018`,
    COUNT(
        IF(
            (
                LEFT(TRIM(`wp_genmap_nodes`.`date`),
                4) = '2019'
            ),
            1,
            NULL
        )
    ) AS `2019`,
    COUNT(
        IF(
            (
                LEFT(TRIM(`wp_genmap_nodes`.`date`),
                4) = '2020'
            ),
            1,
            NULL
        )
    ) AS `2020`,
    SUM(`wp_genmap_nodes`.`elementWord`) AS `word`,
    SUM(`wp_genmap_nodes`.`elementPrayer`) AS `prayer`,
    SUM(`wp_genmap_nodes`.`elementLove`) AS `love`,
    SUM(`wp_genmap_nodes`.`elementWorship`) AS `worship`,
    SUM(
        `wp_genmap_nodes`.`elementMakeDisciples`
    ) AS `make_disciples`,
    SUM(`wp_genmap_nodes`.`elementLeaders`) AS `leaders`,
    SUM(`wp_genmap_nodes`.`elementGive`) AS `give`,
    SUM(
        `wp_genmap_nodes`.`elementLordsSupper`
    ) AS `lords_supper`,
    SUM(`wp_genmap_nodes`.`elementBaptism`) AS `baptism`,
    MAX(`wp_genmap_nodes`.`last_mod_date`) AS `last_mod_date`
FROM
    (
        (
            `wp_genmap_nodes`
        JOIN `wp_genmap` `gm` ON
            (
                (
                    `wp_genmap_nodes`.`genmap_id` = `gm`.`id`
                )
            )
        )
    JOIN `wp_users` ON
        (
            (
                `wp_users`.`ID` = `wp_genmap_nodes`.`user_id`
            )
        )
    )
WHERE
    (
        (`wp_genmap_nodes`.`node_type` = 'node') AND ISNULL(`wp_genmap_nodes`.`deleted`) AND ISNULL(`gm`.`deleted`) AND(`wp_genmap_nodes`.`active` = 1)
    )
GROUP BY
    `wp_genmap_nodes`.`genmap_id`
    

