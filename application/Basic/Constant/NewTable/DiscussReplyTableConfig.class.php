<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/9/18 18:54
 */

class DiscussReplyTableConfig
{
    const TABLE_NAME = 'oj_discuss_reply';
    const PRIMARY_KEY = 'discuss_rid';

    public static $TABLE_FIELD = array(
        'discuss_rid' => 'int',
        'discuss_id' => 'int',
        'create_time' => 'datetime',
        'context' => 'text',
        'author' => 'int',
        'reply_to' => 'int',
        'status' => 'tinyint', // -2 for delete, -1 for not show, 0 for normal, 1 for top
    );
}