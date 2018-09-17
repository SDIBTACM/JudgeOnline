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

/**
 *
 * @return string
 */
function curIp() {
    if (C('REVERSE_PROXY')) {
        if (C('PROXY_REAL_IP_HEAD')) {
            return $_SERVER[C('PROXY_REAL_IP_HEAD')];
        } else {
            return $_SERVER['HTTP_CLIENT_IP'];
        }
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

/**
 * 用于比较ip 是否属于某个IP的子网
 *
 * @param string $src 待比较IP
 * @param string $beCompare
 * @param int $mask 掩码位数
 *
 * @return bool
 */
function compareIpWithSubnetMask($src, $beCompare, $mask = 0) {
    if (filter_var($src, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) &&
        filter_var($beCompare, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) && $mask <= 32) { // ipv4

        $srcBin = sprintf("%032s",base_convert(bin2hex(inet_pton($src)), 16, 2));
        $beCompareBin = sprintf("%032s",base_convert(bin2hex(inet_pton($beCompare)), 16, 2));

        return (strncmp($srcBin, $beCompareBin, $mask) == 0);

    } else if (filter_var($src, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) &&
        filter_var($beCompare, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) && $mask <= 128) { // ipv6

        $srcBin = sprintf("%0128s",base_convert(bin2hex(inet_pton($src)), 16, 2));
        $beCompareBin = sprintf("%0128s",base_convert(bin2hex(inet_pton($beCompare)), 16, 2));

        return (strncmp($srcBin, $beCompareBin, $mask) == 0);

    } else { // ?
        return false;
    }
}
