<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/28/2017 17:04
 */

 namespace Constant\DbConfig;

 class SiteNewsTableConfig
 {
     const TABLE_NAME = "news";

     public static $TABLE_FILED = array(
         'news_id' => 'int',
         'user_id' => 'int',
         'title' => 'varchar',
         'content' => 'text',
         'time' => 'datetime',
         'importance' => 'tinyint',
         'defunct' => 'char'
     );
 }