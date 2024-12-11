document.addEventListener('DOMContentLoaded', ()=>{
    const dropD = document.getElementById('dropDown');
    const pre = document.getElementById('preEtu');
    const nom = document.getElementById('nomEtu');
    const tel = document.getElementById('telEtu');
    const adr = document.getElementById('adrEtu');
    const vil = document.getElementById('vilEtu');
    const cp = document.getElementById('cpEtu');
    const mail = document.getElementById('mailEtu');
    const log = document.getElementById('logEtu');
    const mdp = document.getElementById('mdpEtu');
    const alt = document.getElementById('altEtu');
    //----- hidden -----
    const hidden = document.getElementById('hidden')
    const checkBox = document.getElementById('altEtu');

    //--- hidden ---
    checkBox.addEventListener('change', ()=>{
        if(checkBox.checked) {
            hidden.style.display = "block";
        } else {
            hidden.style.display = "none";
        }
    })
    dropD.addEventListener('change', ()=>{
        const selected = dropD.value;
        if(!selected){
            pre.value = '';
            nom.value = '';
            tel.value = '';
            adr.value = '';
            vil.value = '';
            cp.value = '';
            mail.value = '';
            log.value = '';
            mdp.value = '';
            alt.value = '';
        }

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
                mdp.value = data.mdp || '';
                alt.value = data.alter || '';
            })
    })
})

