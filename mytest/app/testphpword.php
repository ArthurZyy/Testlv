<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 2017/7/20
 * Time: 17:18
 */




require_once 'PhpOffice/PhpWord/PhpWord.php'; // 包含头文件
use PhpOffice\PhpWord\TemplateProcessor;


















/*require_once 'PhpOffice/PhpWord/PhpWord.php'; // 包含头文件
use PhpOffice\PhpWord\Autoloader;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\IOFactory;

require_once __DIR__.'/PhpOffice/PhpWord/Autoloader.php';
Autoloader::register();
Settings::loadConfig();

//新建一个新的PHPWord文档
$PHPWord=new \PhpOffice\PhpWord\PhpWord();
$PHPWordHelper=new \PhpOffice\PhpWord\Shared\Font();

//设置全局字体字号
$PHPWord->setDefaultFontName('仿宋');
$PHPWord->setDefaultFontSize(16);

//设置文档属性
$properties = $PHPWord->getDocumentProperties();
$properties->setCreator('张三');   // 创建者
$properties->setCompany('某公司'); // 公司
$properties->setTitle('某某文档'); // 标题
$properties->setDescription('http://wangye.org'); // 描述
$properties->setLastModifiedBy('李四'); // 最后修改
$properties->setCreated( time() );      // 创建时间
$properties->setModified( time() );     // 修改时间

// 添加需要的字体到'MSYH11pt'留着下面使用
$PHPWord->addFontStyle('MSYH11pt', array('name'=>'微软雅黑', 'size'=>11));

// 添加段落样式到'Normal'以备下面使用
$PHPWord->addParagraphStyle(
    'Normal',array(
        'align'=>'both',
        'spaceBefore' => 0,
        'spaceAfter' => 0,
        'spacing'=>$PHPWordHelper->pointSizeToTwips(2.8),
        'lineHeight' => 1.19,  // 行间距
        'indentation' => array( // 首行缩进
            'firstLine' => $PHPWordHelper->pointSizeToTwips(32)
        )
    )
);*/