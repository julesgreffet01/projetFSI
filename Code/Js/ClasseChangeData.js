document.addEventListener('DOMContentLoaded', ()=>{
    const dropD = document.getElementById('dropDown');
    const nom = document.getElementById('nom');
    const nb  = document.getElementById('nb');

    dropD.addEventListener('change', ()=>{
        const selected = dropD.value;
        if(!selected){
            nom.value = '';
            nb.value = '';
        }

        fetch('../GetData/GetDataClasse.php?idCla=' + selected)
            .then(response => response.json())
            .then(data => {
                nom.value = data.nom || '';
                nb.value = data.nbMax || '';
            })
    })
})