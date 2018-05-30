<?php
namespace Home\Controller;

use Basic\Model\Exam\ExamModel;

class IndexController extends TemplateController {
    public function index(){
        ExamModel::instance()->test();
        echo queue('list')->push('asd');
        echo queue('list')->push('123bsd');
        echo queue('list')->getLen();
        echo queue('list')->pop();
        echo queue('list')->getLen();
        echo queue('list')->clear();
        echo queue('list')->getLen();
    }
}