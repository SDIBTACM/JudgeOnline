<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/6/18 20:15
 */

class ContestRegisterTableConfig
{
    const TABLE_NAME = 'oj_contest_register';
    const PRIMARY_KEY = null;

    public static $TABLE_FILED = array(
        'contest_id' => 'int',
        'user_id' => 'int',
        'stu_real_name' => 'varchar',
        'stu_school' => 'varchar',
        'stu_college' => 'varchar',
        'stu_discipline' => 'varchar',
        'stu_sex' => 'char',
        'stu_email' => 'varchar',
        'registered_time' => 'datetime',
        'status' => 'tinyint', // -1 for pending, 0 for pass, 1 for waiting change, 2 for reject
        'seat_num' => 'int',
    );
}