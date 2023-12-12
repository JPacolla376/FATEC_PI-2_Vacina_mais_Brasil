document.addEventListener('DOMContentLoaded', function () {
    var intervalo = 10000; // 10 segundos
    var currentIndex = 0;
    var slidesContainer = document.querySelector('.slider-principal');
    var slides = slidesContainer.querySelectorAll('div');

    function mostrarSlide(index) {
        slides.forEach(function (slide, i) {
            slide.style.display = i === index ? 'block' : 'none';
        });
    }

    function avancarSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        mostrarSlide(currentIndex);
    }

    // Adiciona uma classe 'visible' após o carregamento completo da página
    document.body.classList.add('visible');

    // Espera um pequeno intervalo antes de mostrar o slider
    setTimeout(function () {
        slidesContainer.classList.remove('hidden');
        mostrarSlide(currentIndex); // Garante que apenas o primeiro slide seja exibido inicialmente
        setInterval(avancarSlide, intervalo);

        // Volta para o topo após um pequeno atraso
        setTimeout(function () {
            window.scrollTo(0, 0);
        }, 100);
    }, 10); // Ajuste conforme necessário
});

document.addEventListener('DOMContentLoaded', function () {
    const scrollLink = document.getElementById('scroll-link');
    const headerHeight = document.querySelector('header').offsetHeight; // Obtém a altura do cabeçalho

    scrollLink.addEventListener('click', function (e) {
        e.preventDefault();

        // Obtém o destino da rolagem (a seção com o ID 'featured-section')
        const targetSection = document.getElementById('acessar');

        // Adiciona uma classe ao link para manter a cor branca durante a animação
        scrollLink.classList.add('button-active');

        // Usa o método scrollIntoView para rolar suavemente até o destino com um deslocamento
        targetSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start', // Alinha o topo do elemento de destino ao topo do bloco de contêiner pai (body ou elemento de contêiner)
            inline: 'nearest', // O elemento rolará para o início ou o final do contêiner mais próximo, se necessário
            offset: -headerHeight // Deslocamento negativo para compensar a altura do cabeçalho
        });

        // Aguarda até que a animação de rolagem seja concluída e, em seguida, remove a classe
        window.addEventListener('scroll', function () {
            if (window.scrollY >= targetSection.offsetTop - headerHeight) {
                scrollLink.classList.remove('button-active');
            }
        });
    });
});
