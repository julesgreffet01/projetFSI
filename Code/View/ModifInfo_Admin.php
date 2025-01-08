<div class="contenusolotoutseul">
    <div class="mesinfo">
        <div class="block">
            <h1>Mes informations</h1>
            <form method="post" action="ControllerModifInfo_Admin.php">
                <p>
                    <label class="intitu">Nom</label>
                    <label class="info"><?php echo $utilisateur->getNomUti() ?></label>
                </p>
                <p>
                    <label class="intitu">Prénom</label>
                    <label class="info"><?php echo $utilisateur->getPreUti() ?></label>
                </p>
                <p>
                    <label class="intitu">Téléphone</label>
                    <input class="info" name="telephone_admin" value="<?php echo $utilisateur->getTelUti() ?>">
                </p>
                <p>
                    <label class="intitu">Adresse</label>
                    <input class="info" name="adresse_admin" value="<?php echo $utilisateur->getAdrUti() ?>">
                </p>
                <p>
                    <label class="intitu">Mail</label>
                    <input class="info" name="mail_admin" value="<?php echo $utilisateur->getMailUti() ?>">
                </p>
                <div class="boutons">
                    <input type="submit" class="btnvert" value="Valider" name="btnValid">
                    <input type="submit" class="btnrouge" value="Annuler" name="btnCancel">
                </div>
            </form>
        </div>
    </div>
</div>