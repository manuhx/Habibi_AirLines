<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 05/01/2018
 * Time: 08:26
 */

include "../templates/template_header.html";

?>
<div class="row">
<div class="col-md-10 col-md-offset-1">

    <br>
    <table class="table table-striped">

        <thead>
        <tr>
            <th>Aéroport Départ</th>
            <th>Aéroport Arrivée</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($data as $d) { ?>
            <tr>
                <td><?php echo $d[0]." --- ".$d[1]." - ".$d[2] ?></td>
                <td><?php echo $d[3]." --- ".$d[4]." - ".$d[5] ?></td>
                <td><a href=<?php echo "../controller/controller.php?action=detail&d=".$d[0]."&a=".$d[3]; ?>>Détail</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>
</div>


<?php

include "../templates/template_footer.html";