<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/28/2017 15:10
 */

 namespace Constant\Dbconfig;

 class ContestInfoConfig
 {
     const TABLE_NAME = "contest";

     public static $TABLE_FILED = array(
         'contest_id' => 'int',
         'title' => 'varchar',
         'start_time' => 'datetime',
         'end_time' => 'datetime',
         'dafunct' => 'char',
         'description' => 'text',
         'private' => 'tinyint',
         'langmask' => 'tinyint',
         'reg_start_time' => 'datetime',
         'reg_end_time' => 'datetime',
     )
 }