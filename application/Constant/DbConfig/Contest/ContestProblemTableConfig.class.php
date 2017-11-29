<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/28/2017 15:29
 */

 namespace Constant\DbConfig\Contest;
 
 class ContestProblemTableConfig 
 {
     const TABLE_NAME = "contest_problem";

     public static $TABLE_FILED = array(
         'problem_id' => 'int',
         'contest_id' => 'int',
         'title' => 'char',
         'num' => 'int'
     );
 }