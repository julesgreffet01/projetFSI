document.addEventListener('DOMContentLoaded',()=>{
    const dropD = document.getElementById('dropDown');
    const pre = document.getElementById('preMA');
    const nom = document.getElementById('nomMa');
    const tel = document.getElementById('telMA');
    const mail = document.getElementById('mailMA');
    const ent = document.getElementById('ent-select');

    dropD.addEventListener('change', ()=>{
        const selected = dropD.value;
        if(!selected){
            pre.value = '';
            nom.value = '';
            tel.value = '';
            mail.value = '';
            ent.value = '';
        }

        fetch('../GetData/GetDataMaitreApp.php?idMA=' +selected)
            .then(response => response.json())
            .then(data => {
                pre.value = data.pre || '';
                nom.value = data.nom || '';
                tel.value = data.tel || '';
                mail.value = data.mail || '';
                ent.value = data.ent || '';
            })
    })

})