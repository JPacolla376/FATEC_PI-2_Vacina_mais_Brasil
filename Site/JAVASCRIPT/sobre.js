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

            // Rola suavemente até o elemento alvo
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: "smooth" });
            }

            // Impede o comportamento padrão do link
            event.preventDefault();
        });
    });
});


// animação de rolagem
document.addEventListener('DOMContentLoaded', function() {
    const scrollLink = document.getElementById('scroll-link');
    const headerHeight = document.querySelector('header').offsetHeight; // Obtém a altura do cabeçalho

    scrollLink.addEventListener('click', function(e) {
        e.preventDefault();

        // Obtém o destino da rolagem (a seção com o ID 'featured-section')
        const targetSection = document.getElementById('acessar');

        // Adiciona uma classe ao botão para manter a cor branca durante a animação
        scrollLink.classList.add('button-active');

        // Usa o método scrollIntoView para rolar suavemente até o destino com um deslocamento
        targetSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start', // Alinha o topo do elemento de destino ao topo do bloco de contêiner pai (body ou elemento de contêiner)
            inline: 'nearest', // O elemento rolará para o início ou o final do contêiner mais próximo, se necessário
            offset: -headerHeight // Deslocamento negativo para compensar a altura do cabeçalho
        });

        // Aguarda até que a animação de rolagem seja concluída e, em seguida, remove a classe
        targetSection.addEventListener('scrollend', function() {
            scrollLink.classList.remove('button-active');
        });
    });
});
