<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 30/12/2017
 * Time: 09:10
 */

//include "../templates/index_old.html";

include "../templates/template_header.html";

echo $_POST["nom"];

?>
    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
            <br>
            <h1>Bienvenu sur l'intranet d'Habibi Airlines</h1>
            <p>Vous pouvez utiliser le menu ci-dessus pour afficher le <b>Catalogue des vols</b>, faire une <b>Réservation</b>, voir les <b>Clients</b> enrigistrés, en ajouter et également avoir des informations sur votre <b>Compte</b>.</p>
        </div>
    </div>



<?php

include "../templates/template_footer.html";

