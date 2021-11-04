var hidden = document.getElementById('hien');
document.getElementById('chk').onclick = function(e){
    if (this.checked){
        hidden.style.display = 'block';
    }
    else{
        hidden.style.display = 'none';
    }
};

