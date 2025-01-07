<div class="contenuetu">
    <div class="mesinfo">
        <div class="blockinfor">
            <h1>Mes informations</h1>
            <form method="post" action="ControllerModifInfo_Etu.php?idEtu=<?php echo $_GET['idEtu'] ?>">
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
                <?php if ($utilisateur->getMaClasse()): ?>
                <label class="info"><?php echo $utilisateur->getMaClasse()->getLibCla() ?></label>
                <?php else: ?>
                <label class="info">Pas assigné(e)</label>
                <?php endif; ?>
            </p>
            <p>
                <label class="intitu">Spécialisation</label>
                <?php if($utilisateur->getMaSpec()): ?>
                <label class="info"><?php echo $utilisateur->getMaSpec()->getNomSpec() ?></label>
                <?php else: ?>
                <label class="info">Pas assigné(e)</label>
                <?php endif; ?>
            </p>
            <div class="gauche">
            <div class="boutons">
                <input type="submit" class="btnvert" value="Valider" name="btnValide">
                <input type="submit" class="btnrouge" value="Annuler" name="btnCancel">
            </div>
            </div>
        </div>

    </div>
    <div class="infoentreprise">
        <div class="blockinfor">
            <h1>Informations de l'entreprise</h1>
            <?php if($utilisateur->getMonEnt()): ?>
            <p>
                <label class="intitu">Nom de l'entreprise</label>
                <label class="info"><?php echo $utilisateur->getMonEnt()->getNomEnt() ?></label>
            </p>
            <p>
                <label class="intitu">Adresse</label>
                <label class="info"><?php echo $utilisateur->getMonEnt()->getAdrEnt() ?></label>
            </p>
            <?php else: ?>
            <p>
                <label class="intitu">Nom de l'entreprise</label>
                <label class="info">Pas assigné(e)</label>
            </p>
            <p>
                <label class="intitu">Adresse</label>
                <label class="info"></label>
            </p>
            <?php endif; ?>

            <?php if($utilisateur->getMonMaitreAp()): ?>
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
            <?php else: ?>
            <p>
                <label class="intitu">Nom du maître d'apprentissage</label>
                <label class="info">Pas assigné(e)</label>
            </p>
                <p>
                    <label class="intitu">Prénom du maître d'apprentissage</label>
                    <label class="info"></label>
                </p>
                <p>
                    <label class="intitu">Téléphone</label>
                    <label class="info"></label>
                </p>
                <p>
                    <label class="intitu">Mail</label>
                    <label class="info"></label>
                </p>
            <?php endif; ?>
        </div>

    </div>
</div>
</form>