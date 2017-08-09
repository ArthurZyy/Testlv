<?php

namespace App\Http\Controllers;


use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;

class PhpworkController extends Controller
{

    //输出word文档测试
    public function index(){
        //新建一个模板Word
        $newreport = new TemplateProcessor(public_path().'/docs/test.docx');

        $newreport->cloneBlock('tag',3);

        //保存填入数据的模板
        $newreport->saveAs(public_path().'/docs/newreport.docx');


        return '成功';
    }



    /*
     * 2017-07-18 冯要强-胶质瘤-组织86-PIK3CA-exon20
     * 生成报告名
     * */
}


