var today = new Date();
today.setDate(today.getDate()); 
today = today.toISOString().split('T')[0];

document.querySelector('#date').setAttribute('max', today);

function caminho(id, page){

    if(page == "cad"){
        location.href = 'editar.php?id=' + id;
    }
}

