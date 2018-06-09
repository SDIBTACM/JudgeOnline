<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 6/6/18 17:26
 */

class UserPrivilegeTableInfo
{
    const TABLE_NAME = 'user_privilege';
    const PRIMARY_KEY = 'up_id';

    public static $TABLE_FILED = array(
        'up_id' => 'int',
        'user_id' => 'int',
        'right_str' => 'varchar', // 'C+id' for allowed contest, 'E+id' for allowed exam, 'CM+id' for allowed manager contest
                                  // 'teacher' allow to manager own problem(info, code), contest(include 'CM+id'), exam
                                  // 'administrator' allow to manager everything
        'random_num' => 'int', // for exam question rand
        'extra_info' => 'varchar',
        'status' => 'tinyint' // 0 for normal, 1 for fail
    );

}