<?php
/**
 * 
 * Create by dream.
 * User: Boxjan
 * Datetime: 11/28/2017 20:18
 */

 namespace Constant\Dbconfig;

 class SolutionInfoTableConfig
 {
     const TABLE_NAME = "solution";

     public static $TABLE_FILED = array(
         'solution_id' => 'int',
         'problem_id' => 'int',
         'user_id' => 'char',
         'time' => 'int',
         'memory' => 'int',
         'in_date' => 'datetime',
         'result' => 'smallint',
         'language' => 'tinyint',
         'ip' => 'chat',
         'contest_id' => 'int',
         'valid' => 'tinyint',
         'num' => 'tinyint',
         'code_length' => 'int',
         'judge_time' => 'datetime',
     );
 }