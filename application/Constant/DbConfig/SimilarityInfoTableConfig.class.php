<?php
/**
 * 
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/28/2017 20:12
 */

 namespace Constant\DbConfig;

 class SimilarityInfoTableConfig
 {
     const TABLE_NAME = "sim";

     public static $TABLE_FILED = array(
         's_id' => 'int',
         'sim_s_id' => 'int',
         'sim' => 'int'
     );
 }