<?php echo $Message ?>
<?php foreach ($bil1 as $bil): ?>
<div class="centreinf">
<div class="block">

    <?php if($bil->getLibBil() == null): ?>
        <label class="info"></label>
    <?php else : ?>
        <label class="titreinfo"><?php echo $bil->getLibBil() ?></label>
    <?php endif; ?>

<p>
    <label class="intitu">Date de la visite en entreprise</label>
    <?php if($bil->getDatVisEnt() == null): ?>
    <label class="info">Pas encore réaliser</label>
    <?php else : ?>
    <label class="info"><?php echo $bil->getDatVisEnt()->format('d/m/Y') ?></label>
    <?php endif; ?>
</p>
<p>
    <label class="intitu">Note fixée par l'entreprise</label>
    <?php if($bil->getDatVisEnt() == null): ?>
        <label class="info"></label>
    <?php else : ?>
        <label class="info"><?php echo $bil->getNotEnt() ?></label>
    <?php endif; ?>
</p>
<p>
    <label class="intitu">Note d'oral</label>
    <?php if($bil->getDatVisEnt() == null): ?>
        <label class="info"></label>
    <?php else : ?>
        <label class="info"><?php echo $bil->getNotOra() ?></label>
    <?php endif; ?>
</p>
<p>
    <label class="intitu">Note du dossier</label>
    <?php if($bil->getDatVisEnt() == null): ?>
        <label class="info"></label>
    <?php else : ?>
        <label class="info"><?php echo $bil->getNotBil() ?></label>
    <?php endif; ?>
</p>
<p>
    <label class="intitu">Remarque éventuelles</label>
    <?php if($bil->getDatVisEnt() == null): ?>
        <label class="info"></label>
    <?php else : ?>
        <label class="info"><?php echo $bil->getRemBil() ?></label>
    <?php endif; ?>
</p>
    <?php if($uti instanceof BO\Administrateur || $uti instanceof BO\Tuteur): ?>
    <div class="btnbila">
        <form action="ControllerModif_Bilan1.php?id=<?php echo $bil->getIdBil() ?>" method="post">
    <input type="submit" class="btnbleu" value="Modifier" name="btnUpdate">
    </form>
        <?php if($compteur>0): ?>
        <form action="ControllerBilan1.php?id=<?php echo $bil->getIdBil() ?>&idEtu=<?php echo $id ?>" method="post">
    <input type="submit" class="btnrouge" value="Supprimer" name="btnDelete">
    </form>
    <?php endif; ?>
    </div>
    <?php endif; ?>

</div>
</div>
<?php $compteur++ ?>
<?php endforeach; ?>
