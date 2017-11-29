<?php
/**
 * 
 * Create by dream.
 * User: Boxjan
 * Datetime: 11/29/2017 18:28
 */

 namespace Constant\Dbconfig;

 class UserInfoTableConfig
 {
     const TABLE_NAME = "users";

     public static $TABLE_FILED = array(
         'user_id' => 'varchar',
         'email' => 'varchar',
         'submit' => 'int',
         'defunct' => 'char',
         'ip' => 'varchar',
         'accesstime' => 'datetime',
         'volume' => 'int',
         'language' => 'int',
         'password' => 'int',
         'reg_time' => 'datetime',
         'nick' => 'varchar',
         'school' => 'varchar' 
     );
 }