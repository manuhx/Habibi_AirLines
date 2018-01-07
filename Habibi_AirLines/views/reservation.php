<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 05/01/2018
 * Time: 15:47
 */

include "../templates/template_header.html";

//var_dump($data[0]);

?>

<div class="row">
<div class="col-md-10 col-md-offset-1">
<br>
    <?php foreach($data as $d){
        $dateD = DateTime::createFromFormat('Y-m-d', $d[1])->format('d-m-Y');
    ?>


    <div class="col-md-5 col-md-offset-1 text-info  well">
        <p class="text-center"><b>Vol <?php echo $d[0] ?></b><br></p>
        <p>
            Départ le : <b><?php echo $dateD; ?></b><br>
            Départ : <b><?php echo $d[3]." - ".$d[2]." (".$d[4].")" ?></b><br>
            Destination : <b><?php echo $d[6]." - ".$d[5]." (".$d[7].")" ?></b><br>
        </p>

        <a href="<?php echo "../controller/controller.php?action=reservation_detail&num=".$d[0]."&date=".$d[1]; ?>" class="btn btn-success btn-block">Voir les réservations</a>
    </div>
   <?php } ?>
</div>
</div>




<?php


include "../templates/template_footer.html";