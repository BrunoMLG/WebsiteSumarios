function login(){
    let e = document.getElementById("perf");
    let perfil = e.value;
    if(perfil =="aluno") {
        alert("Acabou de Iniciar Sessão!");
        window.location.href = "lista_disc_alunos.php";
    }else if(perfil =="professor") {
        alert("Acabou de Iniciar Sessão!");
        window.location.href = "lista_disc_professores.php";
    }
}

function submitSum(){
    alert("Sumario criado!");
}

function registar(){
    window.location.href ="registar.php";
}