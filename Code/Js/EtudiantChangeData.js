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

    function updateTutByCla(){
        const selected = selectCla.value;
        if (!selected){
            fetch("../GetData/GetDataEtudiant?resetTut=1")
                .then(response => response.json())
                .then(data => {
                    selectTut.innerHTML = "";

                    const emptyOptionTut = document.createElement("option");
                    emptyOptionTut.value = "";
                    emptyOptionTut.textContent = ""; // Texte de l'option vide
                    selectTut.appendChild(emptyOptionTut);


                    data.tuts.forEach(tut => {
                        const option = document.createElement("option");
                        option.value = tut.idTut;
                        option.textContent = tut.nomTut + " " + tut.preTut;
                        selectTut.appendChild(option);
                    })
                })
        } else {
            fetch('../GetData/GetDataEtudiant?idCla=' + selected)
                .then(response => response.json())
                .then(data =>{
                    selectTut.innerHTML = "";

                    if((data.tuts).length){
                        const emptyOptionTut = document.createElement("option");
                        emptyOptionTut.value = "";
                        emptyOptionTut.textContent = ""; // Texte de l'option vide
                        selectTut.appendChild(emptyOptionTut);

                        data.tuts.forEach(tut => {
                            const option = document.createElement("option");
                            option.value = tut.idTut;
                            option.textContent = tut.nomTut + " " + tut.preTut;
                            selectTut.appendChild(option);
                        })
                    } else {
                        const option = document.createElement('option');
                        option.value="";
                        option.textContent = "Pas de tuteur valide";
                        selectTut.appendChild(option);
                    }

                })
        }
    }

    function updateMA(){
        const selected = selectEnt.value;
        if (!selected){
            fetch('../GetData/GetDataEtudiant?resetMA=1')
                .then(response => response.json())
                .then(data => {
                    selectMA.innerHTML = "";

                    const emptyOptionMA = document.createElement("option");
                    emptyOptionMA.value = "";
                    emptyOptionMA.textContent = ""; // Texte de l'option vide
                    selectMA.appendChild(emptyOptionMA);


                    data.MAs.forEach(ma => {
                        const option = document.createElement("option");
                        option.value = ma.idMA;
                        option.textContent = ma.nomMA;
                        selectMA.appendChild(option);
                    })
                })
        } else {
            fetch('../GetData/GetDataEtudiant?idEnt='+ selected)
                .then(response => response.json())
                .then(data => {

                    console.log('ca passe');
                    selectMA.innerHTML = "";

                    if((data.MAs).length){
                        const emptyOptionMA = document.createElement("option");
                        emptyOptionMA.value = "";
                        emptyOptionMA.textContent = ""; // Texte de l'option vide
                        selectMA.appendChild(emptyOptionMA);


                        data.MAs.forEach(ma => {
                            const option = document.createElement("option");
                            option.value = ma.idMA;
                            option.textContent = ma.nomMA;
                            selectMA.appendChild(option);
                        })
                    } else {
                        const emptyOptionMA = document.createElement("option");
                        emptyOptionMA.value = "";
                        emptyOptionMA.textContent = "Pas de Maitre a dans cette entreprise";
                        selectMA.appendChild(emptyOptionMA);
                    }
                })
        }

    }

    // Vérifier l'état initial de la case à cocher
    updateHiddenSection();

    // Gérer l'événement de changement sur la case à cocher
    checkBox.addEventListener('change', updateHiddenSection);

    selectCla.addEventListener('change', updateTutByCla);

    selectEnt.addEventListener('change', updateMA);


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


                    if(data.idMaCla){
                        const maCla = document.createElement('option');
                        maCla.value = data.idMaCla; // Utiliser l'identifiant de la classe
                        maCla.textContent = data.libMaCla; // Utiliser le nom de la classe
                        selectCla.appendChild(maCla);

                        data.clas.forEach(cla => {
                            if (cla.idCla != data.idMaCla) {
                                const option = document.createElement("option");
                                option.value = cla.idCla; // Utiliser l'identifiant de la classe
                                option.textContent = cla.libCla; // Utiliser le nom de la classe
                                selectCla.appendChild(option);
                            }
                        })

                        const emptyOptionCla = document.createElement("option");
                        emptyOptionCla.value = "";
                        emptyOptionCla.textContent = "Enlever la classe"; // Texte de l'option vide
                        selectCla.appendChild(emptyOptionCla);

                    } else {
                        const emptyCla = document.createElement('option');
                        emptyCla.value='';
                        emptyCla.textContent = '';
                        selectCla.appendChild(emptyCla);

                        data.clas.forEach(cla => {
                            if (cla.idCla != data.idMaCla) {
                                const option = document.createElement("option");
                                option.value = cla.idCla; // Utiliser l'identifiant de la classe
                                option.textContent = cla.libCla; // Utiliser le nom de la classe
                                selectCla.appendChild(option);
                            }
                        })
                    }




                    if(data.idMonTut){
                        const monTut = document.createElement('option');
                        monTut.value = data.idMonTut; // Utiliser l'identifiant de la classe
                        monTut.textContent = data.nomMonTu + " " + data.preMonTut; // Utiliser le nom de la classe
                        selectTut.appendChild(monTut);

                        data.tuts.forEach(tut => {
                            if (tut.idTut != data.idMonTut) {
                                const option = document.createElement("option");
                                option.value = tut.idTut; // Utiliser l'identifiant de la classe
                                option.textContent = tut.nomTut + " " + tut.preTut; // Utiliser le nom de la classe
                                selectTut.appendChild(option);
                            }
                        })

                        const emptyOptionTut = document.createElement("option");
                        emptyOptionTut.value = "";
                        emptyOptionTut.textContent = "Enlever le tuteur"; // Texte de l'option vide
                        selectTut.appendChild(emptyOptionTut);

                    } else {
                        const emptyTut = document.createElement('option');
                        emptyTut.value = ""; // Utiliser l'identifiant de la classe
                        emptyTut.textContent = ""; // Utiliser le nom de la classe
                        selectTut.appendChild(emptyTut);

                        data.tuts.forEach(tut => {
                            if (tut.idTut != data.idMonTut) {
                                const option = document.createElement("option");
                                option.value = tut.idTut; // Utiliser l'identifiant de la classe
                                option.textContent = tut.nomTut + " " + tut.preTut; // Utiliser le nom de la classe
                                selectTut.appendChild(option);
                            }
                        })
                    }

                })
            selectCla.addEventListener('change', updateTutByCla);
            selectEnt.addEventListener('change', updateMA);
        }


    })
})
