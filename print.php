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
require_once 'etc/conf.php';
?>
<!DOCTYPE html>
<html>
<head>
    <style>

        .fotorama__nav-wrap {

            position: fixed;
            bottom: 0;
            width: 100%;
            height: 70px;
            background-color: #fff;
            opacity: .7;
            color: #fff;
        }

        html, body {

            padding: 0;
            margin: 0;

        }

        .printwrapp {
            position: absolute;
            top: 30%;
            left: 40%;
            height: 150px;
            width: 130px;
            z-index: 250;
            color: #fff;
        }
        .print
        {

            height: 130px;
            width: 130px;
            color: #fff;
            z-index: 300;
            background-image: url('theme/img/print-icon.png');
            background-repeat: no-repeat;
            float:left;


        }

        .printdesc {
            height: 50px;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            font-size: 35px;
            text-align: center;
            color: ;


        }




        img.fotorama__img {
            max-height: 100% !important;
            top: 0 !important;
        }


    </style>


    <title>Druck - <?php echo Constans::getTitle();?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <!-- jQuery -->
    <script src="theme/js/vendor/jquery-1.10.2.min.js"></script>

    <!-- Fotorama -->
    <link href="theme/css/fotorama.css" rel="stylesheet">
    <script src="theme/js/fotorama.js"></script>

    <!-- Just don’t want to repeat this prefix in every img[src] -->

</head>






<body>

<script type="text/javascript">
    function reprint() {

        //call PHP ajax and move file to hot folder!
        $.ajax({
            data: {imageId: $('.fotorama__stage__frame.fotorama__loaded.fotorama__loaded--img.fotorama__active img').attr('src')},
            url: 'copyFile.php',
            type: 'POST',
            success: function (response) {

                alert('Das Foto wird gedruckt! Bitte einen Moment Geduld.');
                console.log(response);
            },
            error: function (xhr, status, error) {

                console.log(xhr.statusText);

            }

        });
    }
</script>

<?php
/**
 * Created by PhpStorm.
 * User: Timo
 * Date: 02.04.2015
 * Time: 23:18
 */


$dir = 'images/original/';
$files = glob($dir."*.{".Constans::getFileTypes()."}", GLOB_BRACE);

?>
<div style="min-height: 100%; max-height: 100%;">
    <!-- Fotorama -->
    <a href="javascript:reprint()"><div class="printwrapp">
            <div class="print"></div>
            <div class="printdesc" style="margin-top: 60%;">Drucken</div>
        </div>
    </a>

    <?php
    function sortDate($a, $b) {return $b['unxmod'] - $a['unxmod'];}
    /*
    echo '<pre>';
    print_r($files);
    echo '</pre>';

    */
    $array = array();
    $array2 = array();
    /*
        echo '<pre>';
        print_r ($_SERVER);
        print_r($files);
        echo '</pre>';*/
    foreach ($files as $file) {
        $array['filepath'] = $file;
        $array['filename'] = substr($file, strlen($dir));
        $array['modtime'] = date("Y-m-d H:i:s",filectime($file));
        $array['unxmod'] = filectime($file);
        array_push($array2, $array);
    }
    usort($array2, "sortDate");
    /*    echo '<pre>';
        print_r($array2);
        echo '</pre>';*/
    ?>

    <div class="fotorama" data-height="100%" data-width="100%" data-ratio="700/467"  data-nav="thumbs"  data-fit="cover">
        <?php
        foreach ($array2 as $image) {
            // echo '<li class="images" id="'.$image['filename'].'"><a href="../images/original/'.$image['filename'].'" class="th"><img src="../images/thumbs/'.$image['filename'].'"></a></li>';
            echo '<img src="'.$image['filepath'].'">';
        }
        ?>
    </div>




</div>
</body>
</html>