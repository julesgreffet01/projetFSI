<div class="contenuetu">
    <div class="mesinfo">
        <div class="blockinfor">
            <h1>Mes informations</h1>
            <form method="post" action="Page_Info_Etudiant.php">
            <p>
                <label class="intitu">Nom</label>
                <label class="info"><?php echo $utilisateur->getNomUti() ?></label>
            </p>
            <p>
                <label class="intitu">Prénom</label>
                <label class="info"><?php echo $utilisateur->getPreUti()?></label>
            </p>
            <p>
                <label class="intitu">Téléphone</label>
                <input class="info" name="telephone_etu" value="<?php echo $utilisateur->getTelUti() ?>">
            </p>
            <p>
                <label class="intitu">Adresse</label>
                <input class="info" name="adresse_etu" value="<?php echo $utilisateur->getAdrUti() ?>">
            </p>
            <p>
                <label class="intitu">Mail</label>
                <input class="info" name="mail_etu" value="<?php echo $utilisateur->getMailUti() ?>">
            </p>
            <p>
                <label class="intitu">Classe</label>
                <label class="info"><?php echo $utilisateur->getMaClasse()->getLibCla() ?></label>
            </p>
            <p>
                <label class="intitu">Spécialisation</label>
                <label class="info"><?php echo $utilisateur->getMaSpec()->getNomSpec() ?></label>
            </p>
        </div>

    </div>
    <div class="infoentreprise">
        <div class="blockinfor">
            <h1>Informations de l'entreprise</h1>
            <p>
                <label class="intitu">Nom de l'entreprise</label>
                <label class="info"><?php echo $utilisateur->getMonEnt()->getNomEnt() ?></label>
            </p>
            <p>
                <label class="intitu">Adresse</label>
                <label class="info"><?php echo $utilisateur->getMonEnt()->getAdrEnt() ?></label>
            </p>
            <p>
                <label class="intitu">Nom du maître d'apprentissage</label>
                <label class="info"><?php echo $utilisateur->getMonMaitreAp()->getNomMai() ?></label>
            </p>
            <p>
                <label class="intitu">Prénom du maître d'apprentissage</label>
                <label class="info"><?php echo $utilisateur->getMonMaitreAp()->getPreMai() ?></label>
            </p>
            <p>
                <label class="intitu">Téléphone</label>
                <label class="info"><?php echo $utilisateur->getMonMaitreAp()->getTelMai() ?></label>
            </p>
            <p>
                <label class="intitu">Mail</label>
                <label class="info"><?php echo $utilisateur->getMonMaitreAp()->getMailMai() ?></label>
            </p>
        </div>

    </div>
</div>
<div class="boutons">
    <input type="button" class="btnvert" value="Valider">
    <input type="button" class="btnrouge" value="Annuler">
</div>
</form>