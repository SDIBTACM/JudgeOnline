<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/7/18 13:50
 */

class ProblemInfoTableConfig
{
    const TABLE_NAME = 'oj_problem';
    const PRIMARY_KEY = 'problem_id';

    public static $TABLE_FILED = array(
        'problem_id' => 'int',
        'description' => 'text',
        'input' => 'text',
        'output' => 'text',
        'sample_input' => 'text',
        'sample_output' => 'text',
        'hint' => 'text',
        'source' => 'text',
        'time_limit' => 'int',
        'memory_limit' => 'int',
        'special_judge' => 'tinyint',
        'submitted' => 'int',
        'solved' => 'int',
        'author' => 'int',
        'status' => 'tinyint', // 0 is normal, 1 is invisible(private, in contest)
        'add_time' => 'datetime',
        'last_change_time' => 'date_time',
    );
}