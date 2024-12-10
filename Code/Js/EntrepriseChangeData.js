document.addEventListener('DOMContentLoaded', () => {
    const dropD = document.getElementById('dropDown');
    const name = document.getElementById('nameEnt');
    const adr = document.getElementById('adrEnt');
    const vil = document.getElementById('vilEnt');
    const cp = document.getElementById('cpEnt');
    const tel = document.getElementById('telEnt');
    const mail = document.getElementById('mailEnt');

    dropD.addEventListener('change', ()=>{
        const selected = dropD.value;
        if (!selected){
            name.value = '';
            adr.value = '';
            vil.value = '';
            cp.value = '';
            tel.value = '';
            mail.value = '';
        }

        fetch('../GetData/GetDataEntreprise.php?idEnt='+ selected)
            .then(response => response.json())
            .then(data => {
                name.value = data.nom || '';
                adr.value = data.adr || '';
                vil.value = data.vil || '';
                cp.value = data.cp || '';
                tel.value = data.tel || '';
                mail.value = data.mail || '';
            })
    })
});