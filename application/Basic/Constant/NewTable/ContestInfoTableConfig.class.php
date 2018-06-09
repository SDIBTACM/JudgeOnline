<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/6/18 17:18
 */

class ContestInfoTableConfig
{
    const TABLE_NAME = 'oj_contest';
    const PRIMARY_KEY = 'contest_id';

    public static $TABLE_FILED = array(
        'contest_id' => 'int',
        'title' => 'int',
        'start_at' => 'datetime',
        'end_before' => 'datetime',
        'create_by' => 'int',
        'privilege' => 'tinyint', // 0 for public, 1 for private, 2 for protected, 3 for need register
        'password' => 'varchar',
        'description' => 'text',
        'announcement' => 'text',
        'register_start_at' => 'datetime',
        'register_end_before' => 'datetime',
        'allowed_language_mask' => 'int', // see in Common/Conf/lang.php for mask
        'deny_ip_mask' => 'text', // CIDR
        'allowed_ip_mask' => 'text', // CIDR
        'close_list' => 'tinyint' // 0 for no, 20 for at last 20% time;
    );
}