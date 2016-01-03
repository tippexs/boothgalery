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

<?php require_once 'etc/conf.php'; ?>
<!DOCTYPE html>
<html>
<head lang="de">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="theme/css/foundation.css">
    <link rel="stylesheet" href="theme/css/app.css">
    <link rel="stylesheet" href="theme/css/jquery-ui.css">
    <script src="theme/js/vendor/jquery.js"></script>
    <script src="theme/js/vendor/jquery-1.8.2.js"></script>
    <script src="theme/js/foundation/foundation.js"></script>
    <script src="theme/js/vendor/modernizr.js"></script>
    <script src="theme/js/vendor/jquery-ui.js"></script>
    <script src="theme/js/foundation/foundation.clearing.js"></script>
    <script src="theme/js/foundation/foundation.tooltip.js"></script>
    <meta charset="utf-8">
    <title><?php echo Constans::getTitle(); ?> - Download</title>
</head>
<body>

<script type="text/javascript">

    function print(iid) {

        //call PHP ajax and move file to hot folder!
        $.ajax({
            data: {imageId: iid},
            url: 'copyFile.php',
            type: 'POST',
            success: function (response) {


                console.log(response);
            },
            error: function (xhr, status, error) {

                console.log(xhr.statusText);

            }

        });
    }

    function viewDialog(dialog) {
        $.ajax({
            type: "POST",
            url: "modules/dialog/help.php",
            success: function (data) {
                console.log(data);
                $("#dialog-message").html(data);


            },
            error: function (xhr) {

            }
        });
        $(function () {
            $("#dialog-message").dialog({
                modal: true,
                draggable: false,
                resizable: false,
                width: 900,
                height: 900,

                buttons: {
                    close: function () {
                        $(this).dialog("close");
                    }
                }


            });
        });

    }

    function Popup(id) {
        $.ajax({
            type: "POST",
            url: "modules/print/handle.php",
            data: {id: id},
            success: function (data) {
                console.log(data);
                $("#dialog-message").html(data);


            },
            error: function (xhr) {

            }
        });
        $(function () {
            $("#dialog-message").dialog({
                modal: true,
                draggable: false,
                resizable: false,
                width: 900,
                height: 900,

                buttons: {
                    close: function () {
                        $(this).dialog("close");
                    }
                }


            });
        });


    }
</script>
<div id="header">
    <div class="logo_left"><img src="theme/img/logo_links.jpg" alt="logo_links"></div>
    <div class="logo_right"><img src="theme/img/logo_rechts.jpg" alt="logo_rechts"></div>
</div>
<?php
if (file_exists(Constans::getUniqueConfFile()) == true) {
    require_once 'modules/uniqueID/index.php';
    die();
} ?>

<div id="dialog-message" title="Ihr Bild" style="display: none; width: 900px;">


</div>

<a href="index.php" class="button expand" style="height: 140px!important; text-align: center!important; font-size: 2.0em!important;"<br><span style="color: #d8d8d8; font-size: 2.4em;">Zurück</span></a>

<ul class="clearing-thumbs" data-clearing>
    <?php
    function sortDate($a, $b)
    {
        return $b['unxmod'] - $a['unxmod'];
    }

    $dir = 'images/original/';
    $files = glob($dir . "*.{" . Constans::getFileTypes() . "}", GLOB_BRACE);
    $array = array();
    $array2 = array();
    foreach ($files as $file) {
        $array['filepath'] = $file;
        $array['filename'] = substr($file, strlen($dir));
        $array['modtime'] = date("Y-m-d H:i:s", filectime($file));
        $array['unxmod'] = filectime($file);
        array_push($array2, $array);
    }
    usort($array2, "sortDate");

    /*
    echo '<pre>';
    print_r($array2);
    echo '</pre>';
    */

    foreach ($array2 as $image) : ?>


        <li>
            <a href="images/original/<?php echo $image['filename']; ?>" class="th">

                <img src="images/thumbs/<?php echo $image['filename']; ?>">
            </a>

       
        </li>
    <?php endforeach; ?>

    <?php /* echo '<pre>'.print_r($array2).'</pre>' */ ?>
</ul>
<script>
    $(document).foundation();
</script>

</body>
</html>