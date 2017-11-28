<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datatime: 11/28/2017 16:44
 */

 namespace Constant\DbConfig;

 class SiteMailInfoConfig
 {
     const TABLE_NAME = "mail";
     
     public static $TABLE_FILED = array(
         'mail_id' => 'int',
         'to_user' => 'varchar',
         'from_user' => 'varchar',
         'title' => 'varchar',
         'content' => 'text',
         'new_mail' => 'tinyint',
         'reply' => 'tinyint',
         'in_date' => 'datetime',
         'defunct' => 'char',
     );
 }