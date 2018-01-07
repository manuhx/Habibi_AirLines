<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 05/01/2018
 * Time: 08:26
 */

include "../templates/template_header.html";

//var_dump($data);

$date = DateTime::createFromFormat('Y-m-d', $_REQUEST["date"])->format('d-m-Y');
$dateQ = DateTime::createFromFormat('Y-m-d', $_REQUEST["date"])->format('Ymd');
?>
<div class="row">
<div class="col-md-10 col-md-offset-1">
    <br>
    <p class="alert-info">
        &nbsp;&nbsp;&nbsp;&nbsp;Réservation en cours pour le vol <b><?php echo $_REQUEST["num"];?></b> <br>
        &nbsp;&nbsp;&nbsp;&nbsp;Au départ de <b><?php echo $data[0][0]." - ".$data[0][1];?></b><br>
        &nbsp;&nbsp;&nbsp;&nbsp;A destination de <b><?php echo $data[0][2]." - ".$data[0][3];?></b><br>
        &nbsp;&nbsp;&nbsp;&nbsp;Pour la date du <b><?php echo $date;?></b>
    </p>
    <form class="form-group" method="POST" action="../controller/controller.php?action=result">

        <div class="form-group">
            <label class="control-label">Email Client</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-"></span>
                </div>
                <input type="email" class="form-control" name="email" placeholder="Saisir l'adresse mail du client" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Nombre de places</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </div>
                <input type="number" class="form-control" name="place" placeholder="Nombre de place(s)" required>
            </div>
        </div>
        <input type="hidden" name="num_vol" value="<?php echo $_REQUEST["num"];?>">
        <input type="hidden" name="date" value="<?php echo $dateQ?>">
        <button type="submit" class="btn btn-success btn-block">Réservation</button>

    </form>


</div>
</div>
    <br>

<?php

include "../templates/template_footer.html";