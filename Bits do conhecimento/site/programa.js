var corpo; // Variável global para a div corpo
var alturaBarraSuperior; // Variável global para a altura da barra superior

document.addEventListener("DOMContentLoaded", function() {
    // Pega a altura da barra superior
    var barraSuperior = document.querySelector(".barraSuperior");
    alturaBarraSuperior = barraSuperior.clientHeight;
    // Define a margem superior da div corpo
    corpo = document.querySelector(".corpo");
    corpo.style.marginTop = (alturaBarraSuperior + 10) + "px";
});

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
        document.querySelector(".barraInferior").style.opacity = 0;
        corpo.style.marginTop = (alturaBarraSuperior + 10) + "px";
    } else {
        document.querySelector(".barraSuperior").style.opacity = 0;
        corpo.style.marginTop = "10px";
    }

    // Verificar se estamos no final da página
    if (scrollY + windowHeight >= documentHeight) {
        document.querySelector(".barraInferior").style.opacity = 1;
    } else {
        document.querySelector(".barraInferior").style.opacity = 0;
    }
});

var i, n;
var gaveta1 = document.getElementsByClassName("gavetan");
var cumpri = gaveta1.length;

for(i = 0; i < cumpri; i++){
    var seleselemento = gaveta1[i].getElementsByTagName("select")[0];
    var cumpricum = seleselemento.length;
    var divA = document.createElement("DIV");
    divA.setAttribute("class", "gavetanick");
    divA.innerHTML = seleselemento.options[seleselemento.selectedIndex].innerHTML;
    gaveta1[i].appendChild(divA);
    var divB = document.createElement("DIV");
    divB.setAttribute("class", "itensseleci gaveta-fechada");
    for(n = 0; n < cumpricum; n++){
        var divC = document.createElement("DIV");
        divC.innerHTML = seleselemento.options[n].innerHTML;
        divC.addEventListener("click", function(e){
            var a, b;
            var escolheElento = this.parentNode.parentNode.getElementsByTagName("select")[0];
            var cumpri2 = escolheElento.length;
            var noAnterior = this.parentNode.previousSibling;
            for(a = 0; a < cumpri2; a++){
                if (escolheElento.options[a].innerHTML == this.innerHTML){
                    escolheElento.selectedIndex = i;
                    noAnterior.innerHTML = this.innerHTML;
                    var gaveta2 = this.parentNode.getElementsByClassName("mesmaseles");
                    var cumpri3 = gaveta2.length;
                    for (b = 0; b < cumpri3; b++){
                        gaveta2[b].removeAttribute("class");
                    }
                    this.setAttribute("class", "mesmaseles");
                    break;
                }
            }
            noAnterior.click();
        });
        divB.appendChild(divC);
    }
    gaveta1[i].appendChild(divB);
    divA.addEventListener("click", function(e) {
        e.stopPropagation();
        fechaSelect(this);
        this.nextSibling.classList.toggle("gaveta-fechada");
        this.classList.toggle("select-arrow-active");
    });

}
function fechaSelect(elmnt){
    var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("itensseleci");
  y = document.getElementsByClassName("gavetanick");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("gaveta-fechada");
    }
  }
}
document.addEventListener("click", fechaSelect);