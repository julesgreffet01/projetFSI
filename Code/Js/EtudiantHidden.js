document.addEventListener('DOMContentLoaded', ()=>{
    const hidden = document.getElementById('hidden')
    const checkBox = document.getElementById('altEtu');

    checkBox.addEventListener('change', ()=>{
        if(checkBox.checked) {
            hidden.style.display = "block";
        } else {
            hidden.style.display = "none";
        }
    })
})