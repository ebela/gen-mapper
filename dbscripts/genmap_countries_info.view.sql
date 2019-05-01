DROP VIEW IF EXISTS `wp_genmap_countries_info`;
CREATE VIEW `wp_genmap_countries_info` AS SELECT
    `wp_genmap_info`.`country_code` AS `country_code`,
    SUM(`wp_genmap_info`.`no_OF_md`) AS `MD`,
    SUM(
        `wp_genmap_info`.`no_OF_fulltime_missionaries`
    ) AS `fulltime_Missionaries`,
    SUM(
        `wp_genmap_info`.`no_OF_existing_lay_believer`
    ) AS `existing_lay_believer`,
    SUM(
        `wp_genmap_info`.`no_OF_disciples_leader`
    ) AS `Disciples_leader`,
    SUM(`wp_genmap_info`.`no_OF_1st_gen`) AS `1st_gen`,
    SUM(`wp_genmap_info`.`no_OF_2nd_gen`) AS `2nd_gen`,
    SUM(`wp_genmap_info`.`no_OF_3th_gen`) AS `3rd_gen`,
    SUM(`wp_genmap_info`.`no_OF_4th_gen`) AS `4th_gen`,
    SUM(`wp_genmap_info`.`no_OF_5th_gen`) AS `5th_gen`,
    SUM(`wp_genmap_info`.`no_OF_6th_gen`) AS `6th_gen`,
    SUM(`wp_genmap_info`.`no_OF_7th_gen`) AS `7th_gen`,
    SUM(`wp_genmap_info`.`no_OF_8th_gen`) AS `8th_gen`,
    SUM(`wp_genmap_info`.`no_OF_9th_gen`) AS `9th_gen`,
    SUM(`wp_genmap_info`.`no_OF_10th_gen`) AS `10th_gen`,
    SUM(`wp_genmap_info`.`no_OF_attenders`) AS `attenders`,
    SUM(`wp_genmap_info`.`no_OF_believers`) AS `believers`,
    SUM(`wp_genmap_info`.`no_OF_baptized`) AS `baptized`,
    SUM(`wp_genmap_info`.`no_OF_churches`) AS `churches`,
    (
        SUM(`wp_genmap_info`.`no_OF_md`) - SUM(`wp_genmap_info`.`no_OF_churches`)
    ) AS `groups`,
    SUM(
        `wp_genmap_info`.`no_OF_non_active_communities`
    ) AS `non_active_communities`,
    SUM(
        `wp_genmap_info`.`morethan6elementscount`
    ) AS `morethan6ElementsCount`,
    SUM(
        `wp_genmap_info`.`lessthan4elementscount`
    ) AS `lessthan4ElementsCount`,
    FORMAT(
        (
            SUM(
                `wp_genmap_info`.`morethan6elementscount`
            ) /(
                SUM(`wp_genmap_info`.`no_OF_md`) / 100
            )
        ),
        1
    ) AS `communities_doing_more_6_elements`,
    FORMAT(
        (
            SUM(
                `wp_genmap_info`.`lessthan4elementscount`
            ) /(
                SUM(`wp_genmap_info`.`no_OF_md`) / 100
            )
        ),
        1
    ) AS `communities_doing_less_4_elements`,
    SUM(`wp_genmap_info`.`2010`) AS `2010`,
    SUM(`wp_genmap_info`.`2011`) AS `2011`,
    SUM(`wp_genmap_info`.`2012`) AS `2012`,
    SUM(`wp_genmap_info`.`2013`) AS `2013`,
    SUM(`wp_genmap_info`.`2014`) AS `2014`,
    SUM(`wp_genmap_info`.`2015`) AS `2015`,
    SUM(`wp_genmap_info`.`2016`) AS `2016`,
    SUM(`wp_genmap_info`.`2017`) AS `2017`,
    SUM(`wp_genmap_info`.`2018`) AS `2018`,
    SUM(`wp_genmap_info`.`2019`) AS `2019`,
    SUM(`wp_genmap_info`.`2020`) AS `2020`,
    (
        SUM(`wp_genmap_info`.`word`) /(
            SUM(`wp_genmap_info`.`no_OF_md`) / 100
        )
    ) AS `Word`,
    (
        SUM(`wp_genmap_info`.`prayer`) /(
            SUM(`wp_genmap_info`.`no_OF_md`) / 100
        )
    ) AS `Prayer`,
    (
        SUM(`wp_genmap_info`.`love`) /(
            SUM(`wp_genmap_info`.`no_OF_md`) / 100
        )
    ) AS `Love`,
    (
        SUM(`wp_genmap_info`.`worship`) /(
            SUM(`wp_genmap_info`.`no_OF_md`) / 100
        )
    ) AS `Worship`,
    (
        SUM(`wp_genmap_info`.`make_disciples`) /(
            SUM(`wp_genmap_info`.`no_OF_md`) / 100
        )
    ) AS `Make_disciples`,
    (
        SUM(`wp_genmap_info`.`leaders`) /(
            SUM(`wp_genmap_info`.`no_OF_md`) / 100
        )
    ) AS `Leaders`,
    (
        SUM(`wp_genmap_info`.`give`) /(
            SUM(`wp_genmap_info`.`no_OF_md`) / 100
        )
    ) AS `Give`,
    (
        SUM(`wp_genmap_info`.`lords_supper`) /(
            SUM(`wp_genmap_info`.`no_OF_md`) / 100
        )
    ) AS `Lord_supper`,
    (
        SUM(`wp_genmap_info`.`baptism`) /(
            SUM(`wp_genmap_info`.`no_OF_md`) / 100
        )
    ) AS `Baptism`,
    MAX(`wp_genmap_info`.`last_mod_date`) AS `last_mod_date`
FROM
    `wp_genmap_info`
GROUP BY
    `wp_genmap_info`.`country_code`

