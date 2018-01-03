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
    <form class="form-group" method="POST" action="../controller/controller.php?action=client_liste">

        <div class="form-group">
            <label class="control-label">Nom</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </div>
                <input type="text" class="form-control" name="nom" placeholder="Nom Client" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Prénom</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                </div>
                <input type="text" class="form-control" name="prenom" placeholder="Prénom Client" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Email</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-"></span>
                </div>
                <input type="email" class="form-control" name="email" placeholder="Email Client" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-block">Submit</button>

    </form>

</div>
</div>
<?php



include "../templates/template_footer.html";