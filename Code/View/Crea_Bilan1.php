<div class="centreinf">
    <div class="block">
        <form action="" method="post">
            <p>
                <label class="intitu">Libellé du bilan</label>
                <input type="text" name="libBil" class="info" value="">
            </p>
            <p>
                <label class="intitu">Date de la visite en entreprise</label>
                <input type="date" name="datVisEnt" class="info" value="">
            </p>
            <p>
                <label class="intitu">Note fixée par l'entreprise</label>
                <input type="text" name="notEnt" class="info" value="">
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
                <label class="intitu">Remarque éventuelles</label>
                <textarea class="info" name="remBil"></textarea>
            </p>
            <div class="btnbila">
                <input type="submit" class="btnbleu" value="Créer" name="btnValid">
                <input type="submit" class="btnrouge" value="Annuler" name="btnCancel">
            </div>
        </form>
        <?php echo $Message ?>
    </div>
</div>
