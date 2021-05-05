function login(){
    alert("Acabou de Iniciar Sessão!");
    window.location.href = "painel_administracao.html";
}

function submitSum(){
    alert("Sumario criado!");
    
}

function random(){
let nRandom = Math.floor(Math.random() * 10001);  
document.getElementById("inputID").value = nRandom;

}