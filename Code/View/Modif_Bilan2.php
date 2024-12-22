<div class="centreinf">
<div class="block">
    <form action="" method="post">

        <p>
            <label class="intitu">Libellé du bilan</label>
            <input type="text" name="libBil" class="info" value="<?php echo $bil2->getLibBil() ? $bil2->getLibBil() : '' ?>">
        </p>
    <p>
        <label class="intitu">Date du Bilan</label>
        <input type="date" name="datBil" class="info" value="<?php echo $bil2->getDatBil2() ? $bil2->getDatBil2()->format('Y-m-d') : '' ?>">
    </p>
        <p>
            <label class="intitu">Note d'oral</label>
            <input type="text" name="notOra" class="info" value="<?php echo $bil2->getNotOra() ? $bil2->getNotOra() : '' ?>">
        </p>
        <p>
            <label class="intitu">Note du dossier</label>
            <input type="text" name="notDos" class="info" value="<?php echo $bil2->getNotBil() ? $bil2->getNotBil() : '' ?>">
        </p>
        <p>
            <label for="sujBil">Sujet du bilan</label>
            <input type="text" name="sujBil" class="info" value="<?php echo $bil2->getSujBil() ?>">
        </p>
        <div class="btnbila">
            <input type="submit" class="btnbleu" value="Valider" name="btnValid">
            <input type="submit" class="btnrouge" value="Annuler" name="btnCancel">
        </div>
    </form>
    <?php echo $Message ?>
</div>
</div>