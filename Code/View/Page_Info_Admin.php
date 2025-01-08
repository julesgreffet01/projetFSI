<div class="contenu">
    <div class="mesinfo">
        <div class="block">
            <h1>Mes informations</h1>
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
                <label class="info"><?php echo $utilisateur->getTelUti() ?></label>
            </p>
            <p>
                <label class="intitu">Adresse</label>
                <label class="info"><?php echo $utilisateur->getAdrUti() ?></label>
            </p>
            <p>
                <label class="intitu">Mail</label>
                <label class="info"><?php echo $utilisateur->getMailUti() ?></label>

        </div>
    </div>
    <div class="boutons">
        <a href="ControllerModifInfo_Admin.php" class="btnbleu">Modifier</a>
    </div>
</div>