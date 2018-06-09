<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/7/18 08:46
 */

class ContestProblemTableConfig
{
    const TABLE_NAME = 'oj_contest_problem';
    const PRIMARY_KEY = 'cp_id' ;

    public static $TABLE_FILED = array(
        'cp_id' => 'int',
        'contest_id' => 'int',
        'problem_id' => 'int',
        'title' => 'varchar',
        'num' => 'tinyint'
    );
}