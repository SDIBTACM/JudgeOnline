<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/28/2017 15:20
 */

 namespace Constant\DbConfig\Problem;

 class CompileErrorInfoTableConfig 
 {
     const TABLE_NAME = "compileinfo";

     public static $TABLE_FILED = array(
         'solution_id' => 'int',
         'error' => 'text'
     );
 }