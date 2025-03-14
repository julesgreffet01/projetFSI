document.addEventListener('DOMContentLoaded', () => {
    const dropD = document.getElementById('dropDown');
    const pre = document.getElementById('preTut');
    const nom = document.getElementById('nomTut');
    const tel = document.getElementById('telTut');
    const adr = document.getElementById('adrTut');
    const mail = document.getElementById('mailTut');
    const nbEtu3 = document.getElementById('nbMaxEtu3');
    const nbEtu4 = document.getElementById("nbMaxEtu4");
    const nbEtu5 = document.getElementById('nbMaxEtu5');
    const vil = document.getElementById('vilTut');
    const cp = document.getElementById('cpTut');
    const log = document.getElementById('logTut');
    dropD.addEventListener('change', ()=>{
        const selected = dropD.value;
        if (!selected){
            pre.value = '';
            nom.value = '';
            tel.value = '';
            adr.value = '';
            mail.value = '';
            nbEtu3.value = '';
            nbEtu4.value = '';
            nbEtu5.value = '';
            vil.value = '';
            cp.value = '';
            log.value = '';
        }

        fetch('../GetData/GetDataTuteur.php?idTut='+ selected)
            .then(response =>response.json())
            .then(data => {
                pre.value = data.pre || '';
                nom.value = data.nom || '';
                tel.value = data.tel || '';
                adr.value = data.adr || '';
                mail.value = data.mail || '';
                nbEtu3.value = data.nbMax3 || 0;
                nbEtu4.value = data.nbMax4 || 0;
                nbEtu5.value = data.nbMax5 || 0;
                vil.value = data.ville || '';
                cp.value = data.cp || null;
                log.value = data.login || '';
            })
    })
});