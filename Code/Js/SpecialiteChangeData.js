document.addEventListener('DOMContentLoaded', ()=>{
    const dropD = document.getElementById('dropDown');
    const name = document.getElementById('libSpe');

    dropD.addEventListener('change', ()=>{
        const selected = dropD.value ;
        if (!selected){
            name.value = '';
        }
        fetch('../GetData/GetDataSpecialite.php?idSpec='+ selected)
            .then(response => response.json())
            .then(data => {
                name.value = data.nom || '';
            })
    })
})