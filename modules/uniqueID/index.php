<?php require_once 'C:/bind/websrv/htdocs/fotokiste/etc/conf.php'; ?>
<script type="text/javascript">

//darf nur Zahlen und Buchstaben / keine Sonderzeichen und min. 8 Zeichen
    // auch nochal auf der PHP Seite vor der Bildersuche abfragen.
$( document ).ready(function() {
    $("input")
        .keyup(function () {
            var value = $(this).val();
          if (value.length < 8 ){
              $(".idinput").css('color', 'red');
              $(".button").css('visibility', 'hidden');
           } else {
              $(".idinput").css('color', 'green');
              $(".button").css('visibility', 'visible');

           }
        })

});
function submitform() {



    $.ajax({
            type: "POST",
            url: "/modules/uniqueID/search.php",
            data: $("#FotoPin").serializeArray(),
            success: function(data) {
				var jdat = JSON.parse(data)
               console.log(jdat);
			   console.log(jdat.data.msg);
			   
			   $("#image").html();
			   $("#imageMessage").html();
			   $("#image").html(jdat.data.img);
			   $("#imageMessage").html(jdat.data.msg);
             },
            error: function(xhr) {

            }
   });

}


</script>
<div class="row">
<div class="large-12 columns">
<span style="font-size: 1.4em;">Bitte geben Sie den <?php echo Constans::getUniqueCnt() ?>-stelligen Code ein. Diesen finden Sie auf Ihrem Ausdruck links oben.</span>
</div>
</div>
<form id="FotoPin">

<div class="row" style="margin-top: 65px!important;">
    <div class="large-12 columns">
        <div class="row collapse prefix-radius">
            <div class="small-12 columns">
                <input class="idinput" type="text" style="text-align: center; text-transform:uppercase;" maxlength="8" id="fotopin" name="fotopin" placeholder="_ _ _ _ _ _ _ _">
            </div>

        </div>
    </div>
<p></p>

</div>
</form>

<div class="row">
    <div class="small-12 columns">
        <a href="javascript:submitform()" class="button large-11"  style="visibility: hidden; width: 100%; height=25%; ">Foto suchen</a>
    </div>
</div>

<div class="row">
<div id="image"></div>
<div id="imageMessage"></div>
</div>