document.addEventListener('DOMContentLoaded', ()=> {
    const dropD = document.getElementById('dropDown');
    const pre = document.getElementById('preEtu');
    const nom = document.getElementById('nomEtu');
    const tel = document.getElementById('telEtu');
    const adr = document.getElementById('adrEtu');
    const vil = document.getElementById('vilEtu');
    const cp = document.getElementById('cpEtu');
    const mail = document.getElementById('mailEtu');
    const log = document.getElementById('logEtu');
    const alt = document.getElementById('altEtu');
    const selectEnt = document.getElementById('ent-select');
    const selectMA = document.getElementById('maitre-select');
    const selectSpe = document.getElementById('spec-select');

    const selectCla = document.getElementById('class-select');
    const selectTut = document.getElementById('tut-select');


    //----- hidden -----
    const hidden = document.getElementById('hidden')
    const checkBox = document.getElementById('altEtu');

    function updateHiddenSection() {
        if (checkBox.checked) {
            hidden.style.display = "block";
        } else {
            hidden.style.display = "none";
        }
    }

    // Vérifier l'état initial de la case à cocher
    updateHiddenSection();

    // Gérer l'événement de changement sur la case à cocher
    checkBox.addEventListener('change', updateHiddenSection);


    dropD.addEventListener('change', () => {
        const selected = dropD.value;
        if (!selected) {
            pre.value = '';
            nom.value = '';
            tel.value = '';
            adr.value = '';
            vil.value = '';
            cp.value = '';
            mail.value = '';
            log.value = '';
            alt.checked = false;
            updateHiddenSection();
            selectEnt.value = '';
            selectMA.value = '';
            selectSpe.value = '';
            fetch('../GetData/GetDataEtudiant?reset=1')
                .then(response => response.json())
                .then(data => {
                    // Réinitialiser le menu déroulant selectCla
                    selectCla.innerHTML = ""; // Supprime toutes les options
                    selectTut.innerHTML = "";

                    // Ajouter une option vide au début
                    // Ajouter une option vide au début des deux sélecteurs
                    const emptyOptionCla = document.createElement("option");
                    emptyOptionCla.value = "";
                    emptyOptionCla.textContent = ""; // Texte de l'option vide
                    selectCla.appendChild(emptyOptionCla);

                    const emptyOptionTut = document.createElement("option");
                    emptyOptionTut.value = "";
                    emptyOptionTut.textContent = ""; // Texte de l'option vide
                    selectTut.appendChild(emptyOptionTut);

                    // Ajouter les nouvelles options à partir de `data.clas`
                    data.clas.forEach(cla => {
                        const option = document.createElement("option");
                        option.value = cla.idCla; // Utiliser l'identifiant de la classe
                        option.textContent = cla.libCla; // Utiliser le nom de la classe
                        selectCla.appendChild(option);
                    });

                    data.tuts.forEach(tut => {
                        const option = document.createElement("option");
                        option.value = tut.idTut;
                        option.textContent = tut.nomTut + " " + tut.preTut;
                        selectTut.appendChild(option);
                    })
                })
        } else {
            fetch('../GetData/GetDataEtudiant?idEtu=' + selected)
                .then(response => response.json())
                .then(data => {
                    pre.value = data.pre || '';
                    nom.value = data.nom || '';
                    tel.value = data.tel || '';
                    adr.value = data.adr || '';
                    vil.value = data.vil || '';
                    cp.value = data.cp || '';
                    mail.value = data.mail || '';
                    log.value = data.login || '';
                    alt.checked = data.alter || false;
                    updateHiddenSection();
                    selectEnt.value = data.ent || '';
                    selectMA.value = data.MA || '';
                    selectSpe.value = data.Spe || '';

                    selectCla.innerHTML = "";
                    selectTut.innerHTML = "";

                    const maCla = document.createElement('option');
                    maCla.value = data.idMaCla; // Utiliser l'identifiant de la classe
                    maCla.textContent = data.libMaCla; // Utiliser le nom de la classe
                    selectCla.appendChild(maCla);

                    const monTut = document.createElement('option');
                    monTut.value = data.idMonTut; // Utiliser l'identifiant de la classe
                    monTut.textContent = data.nomMonTu + " " + data.preMonTut; // Utiliser le nom de la classe
                    selectTut.appendChild(monTut);

                    data.clas.forEach(cla => {
                        if (cla.idCla != data.idMaCla) {
                            const option = document.createElement("option");
                            option.value = cla.idCla; // Utiliser l'identifiant de la classe
                            option.textContent = cla.libCla; // Utiliser le nom de la classe
                            selectCla.appendChild(option);
                        }
                    })

                    data.tuts.forEach(tut => {
                        if (tut.idTut != data.idMonTut) {
                            const option = document.createElement("option");
                            option.value = tut.idTut; // Utiliser l'identifiant de la classe
                            option.textContent = tut.nomTut + " " + tut.preTut; // Utiliser le nom de la classe
                            selectTut.appendChild(option);
                        }
                    })

                    //TODO a finir si on change de classe
                })
        }


    })
})
