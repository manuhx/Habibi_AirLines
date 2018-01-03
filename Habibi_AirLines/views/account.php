<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 03/01/2018
 * Time: 10:06
 */

include "../templates/template_header.html";

?>
<div class="row">
    <div class="col-md-6 col-md-offset-3 services">
        <p></p>
        <span class="icon text-center">
            <i class="icon-settings"></i>
        </span>
    </div>
    <div class="col-md-10 col-md-offset-1 desc">
        <h2><?php echo $user->getLogin(); ?></h2>
        <p><b><?php echo $user->getPrenom()." ".$user->getNom(); ?></b></p>
        <p>Vous êtes enregistré pour : <b><?php echo $user->getAgence(); ?></b></p>
        <p>Votre adresse mail est : <b><?php echo $user->getMail()?></b></p>
    </div>
</div>

<?php

include "../templates/template_footer.html";