<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 19.05.2015
 * Time: 11:35
 */

$imageId = $_POST['imageId'];






$currFile = $imageId;


$newFile  = 'C:/Users/Photobooth/Desktop/Photobooth/Bilder/GSW_FINAL/'.date(time()).'_'.str_replace("/", "", $imageId);


if(!copy($currFile, $newFile)) {

    echo 'Kopiervorgange fehlgeschlagen';

}
else {


    echo $currFile.'</br>';
    echo $newFile;
}



?>