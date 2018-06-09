<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/6/18 17:06
 */

class UserInfoTableConfig
{
    const TABLE_NAME = 'user_info';
    const PRIMARY_KEY = 'user_id';

    public static $TABLE_FILED = array(
        'user_id' => 'int',
        'login_id' => 'varchar',
        'password' => 'varchar',
        'nick_name' => 'varchar',
        'school' => 'varchar',
        'email' => 'varchar',
        'account_status' => 'tinyint', // -1 for lock, 1 for need verify by admin, 0 for normal
        'registered_time' => 'datetime',
        'verified_time' => 'datetime',
        'last_login_time' => 'datetime',
        'submitted' => 'int',
        'solved' => 'int',
        'extra_data' => 'text',
    );
}