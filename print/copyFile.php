<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 19.05.2015
 * Time: 11:35
 */

$dir = 'C:/Users/Photobooth/Desktop/Photobooth/Bilder/prints/reprint';

$imageId = $_POST['imageId'];



$imageIdSub = substr($imageId, -17, 17);

echo $imageIdSub;
$currFile = 'C:/Users/Photobooth/Desktop/Photobooth/Bilder/prints/'.$imageIdSub;
$newFile  = 'C:/Users/Photobooth/Desktop/Photobooth/Bilder/prints/reprint/'.date(time()).'_'.$imageIdSub;


if(!copy($currFile, $newFile)) {

    echo 'Kopiervorgange fehlgeschlagen';

}
else {


    echo $currFile;
    echo $newFile;
}



?>