<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/9/18 18:13
 */

class MessageTableConfig
{
    const TABLE_NAME = 'oj_message';
    const PRIMARY_KEY = 'message_is';

    public static $TABLE_FILED = array(
        'message_id' => 'int',
        'context' => 'text',
        'link' => 'text',
        'author' => 'int',
        'status' => 'tinyint', // 0 is normal, 1 is not disable
        'type' => 'tinyint',  // 0 is information , 1 is announcement,
        'create_time' => 'datetime',
        'last_change_data' => 'datetime',
        'deleted' => 'tinyint' // 0 is normal, 1 is deleted
    );
}