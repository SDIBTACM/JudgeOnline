<?php
/**
 * 
 * Create by dream
 * User: Boxjan
 * Datetime: 11/28/19:57
 */

 namespace Constant\DbConfig\Discuss;

 class DiscussReplyTableConfig 
 {
    const TABLE_NAME = "reply";

    public static $TABLE_FILED = array(
        'rid' => 'int',
        'author_id' => 'varchar',
        'time' => 'datetime',
        'content' => 'text',
        'topic_id' => 'int',
        'status' => 'int',
        'ip' => 'varchar'
    );
 }