window.addEventListener("load", () => {
    const windowHeight = window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;

    // Verificar se há uma barra de rolagem (conteúdo maior que a janela)
    if (documentHeight > windowHeight) {
        document.querySelector(".barraInferior").style.opacity = 0;
    } else {
        document.querySelector(".barraInferior").style.opacity = 1;
    }
});

window.addEventListener("scroll", () => {
    const scrollY = window.scrollY;
    const windowHeight = window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;
    var barraSuperior = document.querySelector(".barraSuperior");
    var alturaBarraSuperior = barraSuperior.clientHeight;

    // Verificar se estamos no topo da página
    if (scrollY === 0) {
        document.querySelector(".barraSuperior").style.opacity = 1;
        var corpo = document.querySelector(".corpo");
        corpo.style.marginTop = (alturaBarraSuperior + 10) + "px";
    } else {
        document.querySelector(".barraSuperior").style.opacity = 0;
        var corpo = document.querySelector(".corpo");
        corpo.style.marginTop = 10 + "px";
    }

    // Verificar se estamos no final da página
    if (scrollY + windowHeight >= documentHeight) {
        document.querySelector(".barraInferior").style.opacity = 1;
    } else {
        document.querySelector(".barraInferior").style.opacity = 0;
    }
});

document.addEventListener("DOMContentLoaded", function() {
    // Pega a altura da barra superior
    var barraSuperior = document.querySelector(".barraSuperior");
    var alturaBarraSuperior = barraSuperior.clientHeight;
    // Define a margem superior da div corpo
    var corpo = document.querySelector(".corpo");
    corpo.style.marginTop = (alturaBarraSuperior + 10) + "px";
});