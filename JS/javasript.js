function login(){
    let e = document.getElementById("perf");
    let perfil = e.value;
    if(perfil =="aluno") {
        alert("Acabou de Iniciar Sessão!");
        window.location.href = "lista_disc.html";
    }else if(perfil =="professor") {
        alert("Acabou de Iniciar Sessão!");
        window.location.href = "lista_disc_professores.html";
    }
}

function submitSum(){
    alert("Sumario criado!");
}