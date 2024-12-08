<div class="mesinfo">
    <div class="block">
        <h1>Mes informations</h1>
        <p>
            <label class="intitu">Nom</label>
            <label class="info"><?php echo $etu->getNomUti() ?></label>
        </p>
        <p>
            <label class="intitu">Prénom</label>
            <label class="info"><?php echo $etu->getPreUti() ?></label>
        </p>
        <p>
            <label class="intitu">Téléphone</label>
            <label class="info"><?php echo $etu->getTelUti() ?></label>
        </p>
        <p>
            <label class="intitu">Adresse</label>
            <label class="info"><?php echo $etu->getAdrUti() ?></label>
        </p>
        <p>
            <label class="intitu">Mail</label>
            <label class="info"><?php echo $etu->getMailUti() ?></label>
        </p>
        <p>
            <label class="intitu">Classe</label>
            <label class="info"><?php echo $etu->getMaClasse()->getLibCla() ?></label>
        </p>
        <p>
            <label class="intitu">Spécialisation</label>
            <label class="info"><?php echo $etu->getMaSpec()->getNomSpec() ?></label>
        </p>
    </div>
    <p>
    <a href="ControllerBilan1.php?idEtu=<?php echo $etu->getIdUti() ?>" class="btnbilan">Bilan 1</a>
    <a href="ControllerAjoutBilan1?idEtu=<?php echo $etu->getIdUti() ?>" class="infobtnbilan">Ajouter un Bilan 1 de rattrapage</a>
    </p>
    <p>
    <a href="ControllerBilan2.php?idEtu=<?php echo $etu->getIdUti()?>" class="btnbilan">Bilan 2</a>
    <a href="ControllerAjoutBilan2?idEtu=<?php echo $etu->getIdUti() ?>" class="infobtnbilan">Ajouter un Bilan 2 de rattrapage</a>
    </p>