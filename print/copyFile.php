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