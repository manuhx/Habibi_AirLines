<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 05/01/2018
 * Time: 15:47
 */

include "../templates/template_header.html";

//var_dump($data[0]);
//var_dump($_REQUEST);
//var_dump($data);
$date = DateTime::createFromFormat('Y-m-d', $_REQUEST["date"])->format('d-m-Y');

?>

<div class="row">
<div class="col-md-10 col-md-offset-1">
<br>
    <h1 class="alert-success text-center">Vol <?php echo $_REQUEST["num"]." du ".$date ?></h1>
    <h4 class="alert-info text-center">De : <?php echo $data[0][8]." - ".$data[0][7] ?></h4>
    <h4 class="alert-info text-center">A : <?php echo $data[0][11]." - ".$data[0][10] ?></h4>
    <table class="table table-striped">

        <thead>
        <tr>
            <th class="text-center">Numéro Client</th>
            <th class="text-center">Nom</th>
            <th class="text-center">Prénom</th>
            <th class="text-center">Adresse Mail</th>
            <th class="text-center">Nombre de places</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data as $d) { ?>
        <form class="form-group" method="POST" action="../controller/controller.php?action=pdf" target="_blank">
            <tr>
                <td class="text-center"><?php echo $d[0] ?></td>
                <input type="hidden" name="num_client" value="<?php echo $d[0] ?>">
                <td class="text-center"><?php echo strtoupper($d[1]); ?></td>
                <input type="hidden" name="nom" value="<?php echo $d[1] ?>">
                <td class="text-center"><?php echo $d[2] ?></td>
                <input type="hidden" name="prenom" value="<?php echo $d[2] ?>">
                <td class="text-center"><?php echo $d[3] ?></td>
                <input type="hidden" name="mail" value="<?php echo $d[3] ?>">
                <td class="text-center"><?php echo $d[4] ?></td>
                <input type="hidden" name="nbr" value="<?php echo $d[4] ?>">
                <input type="hidden" name="num_resa" value="<?php echo $d[5] ?>">
                <input type="hidden" name="dateD" value="<?php echo $date ?>">
                <input type="hidden" name="dateA" value="<?php echo $d[14] ?>">
                <input type="hidden" name="num_aeroD" value="<?php echo $d[6] ?>">
                <input type="hidden" name="num_aeroA" value="<?php echo $d[9] ?>">
                <input type="hidden" name="nom_aeroD" value="<?php echo $d[7] ?>">
                <input type="hidden" name="nom_aeroA" value="<?php echo $d[10] ?>">
                <input type="hidden" name="villeD" value="<?php echo $d[8] ?>">
                <input type="hidden" name="villeA" value="<?php echo $d[11] ?>">
                <input type="hidden" name="heureD" value="<?php echo $d[12] ?>">
                <input type="hidden" name="heureA" value="<?php echo $d[13] ?>">
                <td class="text-center"><button type="submit" class="btn btn-link" ><img src="../templates/images/pdf.png" width="20" height="20"></button></td>
            </tr>
        </form>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>




<?php


include "../templates/template_footer.html";