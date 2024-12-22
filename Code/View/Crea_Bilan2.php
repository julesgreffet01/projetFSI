<div class="centreinf">
    <div class="block">
        <form action="" method="post">

            <p>
                <label class="intitu">Libellé du bilan</label>
                <input type="text" name="libBil" class="info" value="">
            </p>
            <p>
                <label class="intitu">Date du Bilan</label>
                <input type="date" name="datBil" class="info" value="">
            </p>
            <p>
                <label class="intitu">Note d'oral</label>
                <input type="text" name="notOra" class="info" value="">
            </p>
            <p>
                <label class="intitu">Note du dossier</label>
                <input type="text" name="notDos" class="info" value="">
            </p>
            <p>
                <label for="sujBil">Sujet du bilan</label>
                <input type="text" name="sujBil" class="info" value="">
            </p>
            <div class="btnbila">
                <input type="submit" class="btnbleu" value="Créer" name="btnCrea">
                <input type="submit" class="btnrouge" value="Annuler" name="btnCancel">
            </div>
        </form>
        <?php echo $Message ?>
    </div>
</div>
