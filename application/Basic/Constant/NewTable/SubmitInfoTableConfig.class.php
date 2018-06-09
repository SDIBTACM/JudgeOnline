<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/7/18 13:55
 */

class SubmitInfoTableConfig
{
    const TABLE_NAME = 'oj_submit' ;
    const PRIMARY_KEY = 'submit_id';

    public static $TABLE_FILED = array(
        'submit_id' => 'int',
        'problem_id' => 'int',
        'user_id' => 'int',
        'language' => 'int', // see mask in Common/Conf/lang.php
        'res_mask' => 'tinyint', // see mask in Common/Conf/res.php
        'res_full' => 'text', // will include every sample status(is AC, RE info, used time, memory) and CE ERROR
        'used_memory' => 'int',
        'used_time' => 'int',
        'submit_time' => 'datetime',
        'code_length' => 'int',

        'judge_time' => 'datetime',
        'SHA1' => 'char(64)',
        'MD5' => 'char(64)',
        'contest_id' => 'int',
        'status' => 'tinyint', // 0 is normal, 1 is hint
    );
}