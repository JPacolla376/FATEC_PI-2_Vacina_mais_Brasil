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

