<?php
/**
 *
 * Created by dream.
 * User: Boxjan
 * Datetime: 11/30/17 20:25
 */

namespace Basic\Controller;

use Think\Controller;

class EmptyController extends Controller
{
    function _empty() {
        header("HTTP/1.1 404 Not Found");
        $this -> display();
    }

    function index() {
        header("HTTP/1.1 404 Not Found");
        $this -> display();
    }
}