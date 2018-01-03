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
                <th>Numéro Client</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse Mail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $d) { ?>
            <tr>
                <td><?php echo $d["NUM_CLIENT"] ?></td>
                <td><?php echo $d["NOM"] ?></td>
                <td><?php echo $d["PRENOM"] ?></td>
                <td><?php echo $d["EMAIL"] ?></td>
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