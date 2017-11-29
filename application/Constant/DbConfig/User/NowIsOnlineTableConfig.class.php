<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/28/2017 17:09
 */

 namespace Constant\DbConfig\User;

 class NowIsOnlineTableConfig 
 {
     const TABLE_NAME = "online";

     public static $TABLE_FILED = array(
        'hash' => 'varchar',
        'ip' => 'varchar',
        'ua' => 'varchar',
        'refer' => 'varchar',
        'lastmove' => 'int',
        'firsttime' => 'int',
        'uri' => 'varchar'
     );
 }