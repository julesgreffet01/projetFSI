<div class="centreinf">
<div class="block">
    <form action="" method="post">
        <p>
            <label class="intitu">Libellé du bilan</label>
            <input type="text" name="libBil" class="info" value="<?php echo $bil1->getLibBil() ? $bil1->getLibBil() : '' ?>">
        </p>
        <p>
        <label class="intitu">Date de la visite en entreprise</label>
        <input type="date" name="datVisEnt" class="info" value="<?php echo $bil1->getDatVisEnt() ? $bil1->getDatVisEnt()->format('Y-m-d') : ''; ?>">
    </p>
    <p>
        <label class="intitu">Note fixée par l'entreprise</label>
        <input type="text" name="notEnt" class="info" value="<?php echo $bil1->getNotEnt() ? $bil1->getNotEnt() : '' ?>">
    </p>
    <p>
        <label class="intitu">Note d'oral</label>
        <input type="text" name="notOra" class="info" value="<?php echo $bil1->getNotOra() ? $bil1->getNotOra() : '' ?>">
    </p>
    <p>
        <label class="intitu">Note du dossier</label>
        <input type="text" name="notDos" class="info" value="<?php echo $bil1->getNotBil() ? $bil1->getNotBil() : '' ?>">
    </p>
    <p>
        <label class="intitu">Remarque éventuelles</label>
        <textarea class="info" name="remBil"><?php echo $bil1->getRemBil() ? $bil1->getRemBil() : '' ?></textarea>
    </p>
        <div class="btnbila">
    <input type="submit" class="btnbleu" value="Valider" name="btnValid">
    <input type="submit" class="btnrouge" value="Annuler" name="btnCancel">
        </div>
    </form>
</div>
</div>