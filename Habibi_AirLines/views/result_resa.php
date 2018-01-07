<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 05/01/2018
 * Time: 15:47
 */

include "../templates/template_header.html";

$date = DateTime::createFromFormat('Ymd', $_REQUEST["date"])->format('Y-m-d');

?>

<div class="row">
<div class="col-md-10 col-md-offset-1">
<br>
    <?php

    if($res == "ENOK")
    {?>
        <h4 class="alert-warning text-center">L'email que vous avez entré n'est pas valide.</h4>
        <a class="btn btn-danger btn-block" href="<?php echo "../controller/controller.php?action=reservation&num=".$_REQUEST["num_vol"]."&date=".$date; ?>">Revenir en arrière</a>
        <br>

    <?php
    }elseif($res == "NOK")
    {?>
        <h4 class="alert-warning text-center">Un problème est survenu lors de la réservation.</h4>
        <p>Merci de contacter votre administrateur si le problème persiste</p>

    <?php
    }
    else{?>

        <h4 class="alert-success text-center">Votre réservation a bien été enregistré.</h4>
    <?php
    }
    ?>


</div>
</div>




<?php

include "../templates/template_footer.html";