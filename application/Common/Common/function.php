<?php
function sqlInjectionFilter() {
    array_walk($_GET, function (&$v) {
        $v = sqlFilter($v);
    });
    array_walk($_POST, function (&$v) {
        $v = sqlFilter($v);
    });
}

function sqlFilter($value) {
    $filter = '/mysql[\s|\`]*\.[\s|\`]*(columns_priv|proc|tables_priv|user)|(or|and)\s*\d\s*=\s*\d|drop\s+table|select.*(from|load_file).*|insert\s+into\s|delete\s+from\s|truncate\s+\w+($|\s)|UNION\s+SELECT/i';
    $value = preg_replace($filter, ' ', $value);
    return $value;
}

function resultReturn($code, $msg = '') {
    $return = array();
    $return['code'] = $code;
    $return['result'] = $msg;
    $result = json_encode($return);
    header('inner-size: ' . strlen($result));
    echo $result;
    exit;
}

function dbg($vars) {
    if (C('IS_DEBUG')) {
        dump($vars);
        echo "<hr/>";
    }
}

function ddbg($vars) {
    if (C('IS_DEBUG')) {
        dump($vars);
        echo "<hr/>";
        exit;
    }
}

function queue($listname) {
    return \Basic\Plugin\RedisQueue::instance($listname);
}
