<div class="contenubil">
    <div class="cadre">
        <div class="bilan">
            <div class="titre">
                <h1>Bilan 1</h1>
            </div>
            <div class="datemodiflib">
                <h2>Date du dernier bilan 1 </h2>
            </div>
            <p><?php echo $moyenne1 ?></p>
            <div class="datmodiflib">
                <p><?php echo $lastBil1 ?></p>
            </div>
            <a href="ControllerBilan1.php?idEtu=<?php echo $uti->getIdUti() ?>" class="btnbilan">Accéder à mon Bilan</a>
        </div>
        <div class="bilan">
            <div class="titre">
                <h1>Bilan 2</h1>
            </div>
            <div class="datemodiflib">
                <h2>Date du dernier bilan 2</h2>
            </div>
            <p><?php echo $moyenne2 ?></p>
            <div class="datmodiflib">
                <p><?php echo $lastBil2 ?></p>
            </div>
            <a href="ControllerBilan2.php?idEtu=<?php echo $uti->getIdUti() ?>" class="btnbilan">Accéder à mon Bilan</a>
        </div>
    </div>
</div>
