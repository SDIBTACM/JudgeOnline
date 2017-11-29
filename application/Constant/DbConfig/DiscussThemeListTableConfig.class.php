<?php
/**
 * 
 * Create by dream.
 * User: Boxjan
 * Datename: 11/29/2017/ 18:21
 */

 namespace Constant\Dbconfig;

 class DiscussThemeListTableConfig
 {
     const TABLE_NAME = "topic";

     public static $TABLE_FILED = array(
         'tid' => 'int',
         'title' => 'varbinary',
         'status' => 'int',
         'top_level' => 'int',
         'cid' => 'int',
         'pid' => 'int',
         'author_id' => 'varchar'
     );
 }