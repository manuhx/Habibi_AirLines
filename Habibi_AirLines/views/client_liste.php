<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 03/01/2018
 * Time: 15:01
 */

include "../templates/template_header.html";


?>
<div class="row">
<div class="col-md-10 col-md-offset-1">
    <br>
    <table class="table table-striped">

        <thead>
            <tr>
                <th class="text-center">Numéro Client</th>
                <th class="text-center">Nom</th>
                <th class="text-center">Prénom</th>
                <th class="text-center">Adresse Mail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $d) { ?>
            <tr>
                <td class="text-center"><?php echo $d["NUM_CLIENT"] ?></td>
                <td class="text-center"><?php echo strtoupper($d["NOM"]) ?></td>
                <td class="text-center"><?php echo $d["PRENOM"] ?></td>
                <td class="text-center"><?php echo $d["EMAIL"] ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
<?php

//var_dump($data);

//echo "<br><br><br>".$data['NOM'];

include "../templates/template_footer.html";