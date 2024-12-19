document.addEventListener('DOMContentLoaded', ()=>{
    const selectCla = document.querySelector('#classe-select');
    const selectEtu = document.querySelector('#etu-select');
    const selectTut = document.querySelector('#tut-select');

    selectCla.addEventListener('change', ()=>{
        const selected = selectCla.value;
        if(!selected){
            selectEtu.innerHTML = "";
            selectTut.innerHTML = "";

            const emptyOptionEtu = document.createElement("option");
            emptyOptionEtu.value = "";
            emptyOptionEtu.textContent = "Selectionner une classe";
            selectEtu.appendChild(emptyOptionEtu);

            fetch('../GetData/GetDataAffectation.php?reset=1')
                .then(response => response.json())
                .then(data => {

                    if((data.tuts).length){

                        const emptyOption = document.createElement("option");
                        emptyOption.value = '';
                        emptyOption.textContent = '';
                        selectTut.appendChild(emptyOption);

                        data.tuts.forEach(tut =>{
                            const option = document.createElement("option");
                            option.value = tut.idTut;
                            option.textContent = tut.nomTut + " " + tut.preTut;
                            selectTut.appendChild(option);
                        })
                    } else {
                        const emptyOption = document.createElement("option");
                        emptyOption.value = '';
                        emptyOption.textContent = "Aucun tuteur valide";
                        selectTut.appendChild(emptyOption);
                    }
                })
        } else {
            selectEtu.innerHTML = "";
            selectTut.innerHTML = "";

            fetch('../GetData/GetDataAffectation.php?idCla='+selected)
                .then(response => response.json())
                .then(data => {

                    if(data.tuts.length){
                        const emptyOptionTut = document.createElement("option");
                        emptyOptionTut.value = '';
                        emptyOptionTut.textContent = '';
                        selectTut.appendChild(emptyOptionTut);

                        data.tuts.forEach(tut =>{
                            const option = document.createElement("option");
                            option.value = tut.idTut; // Utiliser l'identifiant de la classe
                            option.textContent = tut.nomTut + " " + tut.preTut; // Utiliser le nom de la classe
                            selectTut.appendChild(option);
                        })

                    } else {
                        const emptyOptionTut = document.createElement("option");
                        emptyOptionTut.value = '';
                        emptyOptionTut.textContent = 'Pas de tuteur valide pour cette classe';
                        selectTut.appendChild(emptyOptionTut);
                    }


                    if(data.etus.length){
                        const emptyOptionEtu = document.createElement("option");
                        emptyOptionEtu.value = '';
                        emptyOptionEtu.textContent = '';
                        selectEtu.appendChild(emptyOptionEtu);

                        data.etus.forEach(etu => {
                            const option = document.createElement("option");
                            option.value = etu.idEtu; // Utiliser l'identifiant de la classe
                            option.textContent = etu.nomEtu + " " + etu.preEtu; // Utiliser le nom de la classe
                            selectEtu.appendChild(option);
                        })

                    } else {
                        const emptyOptionEtu = document.createElement("option");
                        emptyOptionEtu.value = '';
                        emptyOptionEtu.textContent = "Pas d'etudiant sans tuteur";
                        selectEtu.appendChild(emptyOptionEtu);
                    }
                })
        }
    })
})