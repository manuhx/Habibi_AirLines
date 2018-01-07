<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 05/01/2018
 * Time: 08:26
 */

include "../templates/template_header.html";

$jour = array(
    1 => "Lundi",
    2 => "Mardi",
    3 => "Mercredi",
    4 => "Jeudi",
    5 => "Vendredi",
    6 => "Samedi",
    7 => "Dimanche"
);

//var_dump($data);
?>
<div class="row">
<div class="col-md-10 col-md-offset-1">

    <br>
    <table class="table table-striped">




        <thead>
        <tr>
            <th>Numéro de Vol</th>
            <th>Aéroport départ</th>
            <th>Aéroport arrivée</th>
            <th>Jour</th>
            <th>Heure de départ</th>
            <th>Heure d'arrivée</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data as $d) { ?>
            <tr>
                <td><b><?php echo $d[0] ?></b></td>
                <td><?php echo $d[1] ?></td>
                <td><?php echo $d[2] ?></td>
                <td><?php echo $jour[$d[3]] ?></td>
                <td><?php echo $d[4] ?></td>
                <td><?php echo $d[5] ?></td>
                <td><a href="<?php echo "../controller/controller.php?action=dispo&num=".$d[0]; ?>" >Date disponibilité</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>


</div>
</div>


<?php

include "../templates/template_footer.html";