<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 05/01/2018
 * Time: 08:26
 */

include "../templates/template_header.html";

//var_dump($data[0]);

?>
<div class="row">
<div class="col-md-10 col-md-offset-1">

    <br>
<?php if(count($data) == 0){
    echo "<p class=\"alert-warning text-center\">Il n'y a pas encore de vols diponibles</p>";
}
else {
    ?> <p class="alert-success text-center">Liste des vols disponibles :</p><br>
    <?php
    foreach($data as $d){
        $dateD = DateTime::createFromFormat('Y-m-d', $d[1])->format('d-m-Y');
        $dateA = DateTime::createFromFormat('Y-m-d', $d[2])->format('d-m-Y');
        $dateQ = DateTime::createFromFormat('Y-m-d', $d[2])->format('Ymd');
        $sql = $conn->prepare('SELECT SUM(NBR_PLACE) FROM RESERVATION WHERE NUM_VOL = "'.$d[0].'" AND DATE_DEPART = '.$dateQ);
        $sql->execute();
        $place = $sql->fetchAll();
        ?>
        <div class="col-md-5 col-md-offset-1 text-info  well">
            <p class="text-center"><b>Vol <?php echo $d[0] ?></b><br></p>
            <p>
                Départ le : <?php echo $dateD; ?><br>
                Départ : <?php echo $d[7]." - ".$d[6]." (".$d[5].")" ?><br>
                Destination : <?php echo $d[10]." - ".$d[9]." (".$d[8].")" ?><br>
                Nombre de places disponible : <?php echo $d[11]-$place[0][0] ?> <br>
            </p>

            <a href=<?php echo "../controller/controller.php?action=reservation&num=".$d[0]."&date=".$d[1]; ?> class="btn btn-success btn-block">Réserver</a>
        </div>
    <?php } } ?>

</div>
</div>

    <br>

<?php

include "../templates/template_footer.html";