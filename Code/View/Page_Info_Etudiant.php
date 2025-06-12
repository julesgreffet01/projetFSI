<div class="contenuetu">
    <div class="mesinfo">
        <div class="blockinfor">
            <h1>Mes informations</h1>
            <p>
                <label class="intitu">Nom</label>
                <label class="info"><?php echo $nom ?></label>
            </p>
            <p>
                <label class="intitu">Prénom</label>
                <label class="info"><?php echo $pre ?></label>
            </p>
            <p>
                <label class="intitu">Téléphone</label>
                <label class="info"><?php echo $tel ?></label>
            </p>
            <p>
                <label class="intitu">Adresse</label>
                <label class="info"><?php echo $adr ?></label>
            </p>
            <p>
                <label class="intitu">Mail</label>
                <label class="info"><?php echo $mail ?></label>
            </p>
            <p>
                <label class="intitu">Classe</label>
                <label class="info"><?php echo $cla ?></label>
            </p>
            <p>
                <label class="intitu">Prof Ref</label>
                <label class="info"><?php echo $etu->getMaClasse()->getProf()->getNomprof() .' '. $etu->getMaClasse()->getProf()->getPreprof() ?></label>
            </p>
            <p>
                <label class="intitu">Spécialisation</label>
                <label class="info"><?php echo $spec ?></label>
            </p>
            <div class="gauche">
            <div class="boutons">
                <a href="ControllerMesBilans.php" class="btnbilan">Mes Bilans</a>
            </div>

            <div class="boutons">
                <a href="ControllerModifInfo_Etu.php" class="btnbleu">Modifier</a>
            </div>
            </div>
        </div>

    </div>
    <div class="infoentreprise">
        <div class="blockinfor">
            <h1>Informations de l'entreprise</h1>
            <p>
                <label class="intitu">Nom de l'entreprise</label>
                <label class="info"><?php echo $ent ?></label>
            </p>
            <p>
                <label class="intitu">Adresse</label>
                <label class="info"><?php echo $adrEnt ?></label>
            </p>
            <p>
                <label class="intitu">Nom du maître d'apprentissage</label>
                <label class="info"><?php echo $nomMai ?></label>
            </p>
            <p>
                <label class="intitu">Prénom du maître d'apprentissage</label>
                <label class="info"><?php echo $preMai ?></label>
            </p>
            <p>
                <label class="intitu">Téléphone</label>
                <label class="info"><?php echo $telMai ?></label>
            </p>
            <p>
                <label class="intitu">Mail</label>
                <label class="info"><?php echo $mailMai ?></label>
            </p>
            <p>
                <label class="intitu">Siret</label>
                <label class="info"><?php echo $siret ?></label>
            </p>

        </div>

    </div>
</div>

