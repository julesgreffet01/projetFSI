<?php echo $Message ?>
<?php foreach($bil2 as $bil): ?>
<div class="centreinf">
<div class="block">

    <?php if($bil->getLibBil() == null): ?>
        <label class="info"></label>
    <?php else : ?>
        <label class="info"><?php echo $bil->getLibBil() ?></label>
    <?php endif; ?>


    <p>
    <label class="intitu">Date du Bilan</label>
    <?php if(!$bil->getDatBil2()): ?>
        <label class="info">Pas encore réaliser</label>
    <?php else : ?>
        <label class="info"><?php echo $bil->getDatBil2()->format('d/m/Y') ?></label>
    <?php endif; ?>
    </p>
    <p>
        <label class="intitu">Note d'oral</label>
        <?php if(!$bil->getNotBil()): ?>
        <label class="info"></label>
    <?php else : ?>
        <label class="info"><?php echo $bil->getNotBil() ?></label>
    <?php endif; ?>
    </p>
    <p>
        <label class="intitu">Note d'oral</label>
        <?php if(!$bil->getNotOra()): ?>
        <label class="info"></label>
    <?php else : ?>
        <label class="info"><?php echo $bil->getNotOra() ?></label>
    <?php endif; ?>
    </p>
    <p>
        <label class="intitu">Sujet du bilan</label>
        <?php if(!$bil->getSujBil()): ?>
        <label class="info"></label>
        <?php else : ?>
        <label class="info"><?php echo $bil->getSujBil() ?></label>
    <?php endif; ?>
    </p>

    </p>
    <?php if($uti instanceof BO\Administrateur || $uti instanceof BO\Tuteur): ?>
        <div class="btnbila">
            <form action="ControllerModif_Bilan2.php?id=<?php echo $bil->getIdBil() ?>" method="post">
                <input type="submit" class="btnbleu" value="Modifier" name="btnUpdate">
            </form>
            <?php if($compteur>0): ?>
                <form action="ControllerBilan2.php?id=<?php echo $bil->getIdBil() ?>&idEtu=<?php echo $id ?>" method="post">
                    <input type="submit" class="btnrouge" value="Supprimer" name="btnDelete">
                </form>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
</div>

    <?php $compteur++ ?>
<?php endforeach; ?>