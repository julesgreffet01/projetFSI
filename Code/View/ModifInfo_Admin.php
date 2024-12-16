<div class="contenu">
    <div class="mesinfo">
        <div class="block">
            <h1>Mes informations</h1>
            <form method="post" action="Page_Info_Admin.php">
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
                <input type="button" class="btnvert" value="Valider">
                <input type="button" class="btnrouge" value="Annuler">
                </div>
            </form>
        </div>
    </div>
</div>