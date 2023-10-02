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

    // Verificar se estamos no topo da página
    if (scrollY === 0) {
        document.querySelector(".barraSuperior").style.opacity = 1;
    } else {
        document.querySelector(".barraSuperior").style.opacity = 0;
    }

    // Verificar se estamos no final da página
    if (scrollY + windowHeight >= documentHeight) {
        document.querySelector(".barraInferior").style.opacity = 1;
    } else {
        document.querySelector(".barraInferior").style.opacity = 0;
    }
});