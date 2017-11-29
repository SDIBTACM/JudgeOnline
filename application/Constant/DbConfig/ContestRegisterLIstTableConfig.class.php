<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/29/2017 19:20
 */

 namespace Constant\Dbconfig;

 class ConstestRegisterListTableConfig 
 {
     const TABLE_NAME = "contestreg";

     public static $TABLE_FILED = array(
         'user_id' => 'varchar',
         'contest_id' => 'int',
         'sturealname' => 'varchar',
         'stuid' => 'varchar',
         'stusex' => 'char',
         'stuphone' => 'varchar',
         'stuschoolname' => 'varchar',
         'studepartment' => 'varchar',
         'stumajor' => 'varchar',
         'ispengding' => 'tinyint',
         'registertime' => 'datetime',
         'seatnum' => 'int'
     );
 }