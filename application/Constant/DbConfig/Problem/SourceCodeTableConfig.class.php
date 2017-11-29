<?php
/**
 * 
 * Create by dream.
 * User: Boxjan
 * Datetime: 11/29/2017 18:14
 */

 namespace Constant\DbConfig\Problem;

 class SourceCodeTableConfig
 {
     const TABLE_NAME = "source_code";

     public static $TABLE_FILED = array(
         'solution_id' => 'int',
         'source' => 'text'
     );
 }