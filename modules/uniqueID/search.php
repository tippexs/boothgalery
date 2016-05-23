<?php
/*
  *
  * Freeware PHP / JS Gallery for Photobooth - Systems. Version 1.0
  *
  * This program comes with ABSOLUTELY NO WARRANTY;
  *
Copyright (C) 2016  Lenny Linux

        This program is free software: you can redistribute it and/or modify
        it under the terms of the GNU General Public License as published by
        the Free Software Foundation, either version 3 of the License, or
        (at your option) any later version.

        This program is distributed in the hope that it will be useful,
        but WITHOUT ANY WARRANTY; without even the implied warranty of
        MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
        GNU General Public License for more details.

        You should have received a copy of the GNU General Public License
        along with this program.  If not, see <http://www.gnu.org/licenses/>.


*/ ?>
<?php require_once '../../etc/conf.php'; ?>
<?php


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
