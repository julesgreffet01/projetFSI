<div class="contenudetail">
<div class="mesinfo">
    <div class="block">
        <h1>Mes informations</h1>
        <p>
            <label class="intitu">Nom</label>
            <label class="info"><?php echo $etu->getNomUti() ?></label>
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
            <label class="intitu">Spécialisation</label>
            <label class="info"><?php echo $spec ?></label>
        </p>
    </div>
    <p>
    <a href="ControllerBilan1.php?idEtu=<?php echo $etu->getIdUti() ?>" class="btnbilan">Bilan 1</a>
    <a href="ControllerAjoutBilan1?idEtu=<?php echo $etu->getIdUti() ?>" class="infobtnbilan">Ajouter un Bilan 1 de rattrapage</a>
        <br>
        <br>
    </p>
    <p>
        <br>
    <a href="ControllerBilan2.php?idEtu=<?php echo $etu->getIdUti()?>" class="btnbilan">Bilan 2</a>
    <a href="ControllerAjoutBilan2?idEtu=<?php echo $etu->getIdUti() ?>" class="infobtnbilan">Ajouter un Bilan 2 de rattrapage</a>
    </p>
</div>
</div>
