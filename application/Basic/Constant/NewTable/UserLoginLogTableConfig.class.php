<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/6/18 17:19
 */

class UserLoginLogTableConfig
{
    const TABLE_NAME = 'user_login_log';
    const PRIMARY_KEY = 'login_id';

    public static $TABLE_FILED = array(
        'login_id' => 'bigint', // micro UNIX time with 4 bite random number
        'user_id' => 'int',
        'ip' => 'varchar',
    );
}