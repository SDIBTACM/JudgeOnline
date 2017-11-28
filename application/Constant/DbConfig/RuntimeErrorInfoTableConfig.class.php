<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/28/2017 15:25
 */

 namespace Constant\Dbconfig;

 class RuntimeErrorTableInfoConfig 
 {
     const TABLE_NAME = "runtimeinfo";

     public static $TABLE_FILED = array(
         'solution_id' => 'int',
         'error' => 'text'
     );
 }