document.addEventListener("DOMContentLoaded", function () {
    // Captura todos os links com a classe "Resumonlink"
    var resumeLinks = document.querySelectorAll(".Resumonlink");

    // Adiciona um ouvinte de evento de clique a cada link
    resumeLinks.forEach(function (link) {
        link.addEventListener("click", function (event) {
            // Obtém o valor do atributo href
            var targetId = this.getAttribute("href").substring(1);

            // Obtém o elemento alvo pelo ID
            var targetElement = document.getElementById(targetId);

            // Rola suavemente até o elemento alvo com animação de rotação
            if (targetElement) {
                anime({
                    targets: document.documentElement,
                    scrollTop: targetElement.offsetTop,
                    duration: 800,
                    easing: 'easeInOutQuad'
                });
            }
            // Impede a propagação do evento
            event.stopPropagation();

            // Impede o comportamento padrão do link
            event.preventDefault();
        });
    });
});