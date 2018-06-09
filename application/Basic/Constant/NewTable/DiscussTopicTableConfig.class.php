<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/9/18 18:24
 */

class DiscussTopicTableConfig
{
    const TABLE_NAME = 'oj_discuss_topic';
    const PRIMARY_KEY = 'discuss_tid';

    public static $TABLE_FILED = array(
        'discuss_tid' => 'int',
        'problem_id' => 'int',
        'context' => 'text',
        'author' => 'int',
        'issue_time' => 'datetime',
        'last_update_time' => 'datetime',
        'status' => 'tinyint', // -1 is deleted, 0 is normal, 1 is TOP,  2 is locked
    );
}