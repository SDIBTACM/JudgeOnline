<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/28/2017
 */

 namespace Constant\DbConfig;

 class LoginLogConfig 
 {
     const TABLE_NAME = "loginlog";

     public static $TABLE_FILED = array(
        'user_id' => 'varchar',
        'password' => 'blob',
        'ip' => 'varchar',
        'time' => 'datetime',
     );
 }