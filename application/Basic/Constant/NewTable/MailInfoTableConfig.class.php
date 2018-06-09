<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/7/18 09:06
 */

class MailInfoTableConfig
{
    const TABLE_NAME = 'oj_mail';
    const PRIMARY_KEY = 'mail_id';

    public static $TABLE_FILED  = array(
        'mail_id' => 'int',
        'from_user' => 'int',
        'to_user' => 'int',
        'topic' => 'varchar',
        'context' => 'text',
        'status' => 'tinyint', // 0 for new mail, 1 for has read
        'time' => 'datetime',
        'reply_for' => 'int',
    );
}