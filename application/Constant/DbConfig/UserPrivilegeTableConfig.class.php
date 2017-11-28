<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/28/2017 14:40
 */

 namespace Constant\DbConfig;

 class UserPrivilegeTableConfig 
 {
     const TABLE_NAME = "privilege";

     public static $TABLE_FILED = array(
         'user_id' => 'char',
         'rightstr' => 'char',
         'defunct' => 'char'
     );
 }