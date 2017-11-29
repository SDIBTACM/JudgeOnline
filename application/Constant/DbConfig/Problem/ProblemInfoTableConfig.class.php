<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/28/2017 17:17
 */

 namespace Constant\DbConfig\Problem;

 class ProblemInfoTableConfig 
 {
     const TABLE_NAME = "problem";

     public static $TABLE_FILED = array(
        'problem_id' => 'int',
        'title' => 'varchar',
        'description' => 'text',
        'input' => 'text',
        'output' => 'text',
        'input_path' => 'varchar',
        'output_path' => 'varchar',
        'sample_input' => 'varchar',
        'sample_output' => 'varchar',
        'hint' => 'text',
        'source' => 'varchar',
        'in_date' => 'datatime',
        'time_limit' => 'int',
        'memory_limit' => 'int',
        'defunct' => 'char',
        'contest_id' => 'int',
        'accepted' => 'int',
        'submit' => 'int',
        'solve' => 'int',
        'spj' => 'tinyint',
        'author' => 'varchar'
     );
 }