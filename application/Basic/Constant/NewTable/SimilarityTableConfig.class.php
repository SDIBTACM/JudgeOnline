<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/9/18 19:23
 */

class SimilarityTableConfig
{
    const TABLE_NAME = 'oj_sim';
    const PRIMARY_KEY = 'submit_id';

    public static $TABLE_FILED = array(
        'submit_id' => 'int',
        'percent' => 'int',
        'similar_id' => 'int'
    );

}