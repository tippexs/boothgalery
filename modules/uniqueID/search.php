<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 16.07.2015
 * Time: 21:38
 */
require_once 'C:/bind/websrv/htdocs/fotokiste/etc/conf.php';

$server_documentroot = Constans::getDocRoot();

$dir = Constans::getUniqueImgDir();

$fotopin = strtoupper($_POST['fotopin']);

if (strlen($fotopin) != Constans::getUniqueCnt() ) {

    $res = array('data' => array('code' => '400', 'msg' => 'pin not match - to short' ));
    print_r(json_encode($res));
    die;
} elseif (!preg_match("#^[a-zA-Z0-9]+$#", $fotopin)) {
    $res = array('data' => array('code' => '400', 'msg' => 'pin not match - mix int and char' ));
    print_r(json_encode($res));
    die;
}

$files = glob($dir."*".$fotopin."*.{".Constans::getFileTypes()."}", GLOB_BRACE);

if (empty ($files)) {
    $imgsrc = 'notFound.png';
    $res = array('data' => array('code' => '400', 'img' => '<img src="/images/system/'.$imgsrc.'">', 'msg' => 'Bild zum Code '.$fotopin.' existiert nicht' ));
    print_r(json_encode($res));
    die;
}

$imgsrc = substr($files[0], strlen(Constans::getUniqueImgDir()));

$res = array('data' => array('code' => '200', 'msg' => '<img src="/images/original/'.$imgsrc.'">' ));
print_r(json_encode($res));

?>