<?php
/**
 * 框架基础信息配置
 *
 * drunk , fix later
 * Created by Magic.
 * User: jiaying
 * Datetime: 01/12/2017 19:58
 */

return array(
    //'配置项'=>'配置值'
    'URL_HTML_SUFFIX' => '', //伪静态后缀名设置

    'TMPL_VAR_IDENTIFY' => 'array', // 点语法的解析

    'URL_MODEL' => 2,

    'URL_CASE_INSENSITIVE' => false,

    'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR',

    'LOAD_EXT_CONFIG' => 'database,module,log,redis', // 扩展配置文件名称

    'MODULE_ALLOW_LIST' => array('Home', 'Zadmin', 'Exam', 'Teacher')
);