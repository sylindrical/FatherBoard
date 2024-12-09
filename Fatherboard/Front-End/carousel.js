document.addEventListener("DOMContentLoaded", () => {
    const carouselContainer = document.querySelector(".carousel-container");
    const slides = document.querySelectorAll(".carousel-slide");
    const prevButton = document.querySelector(".carousel-btn.prev");
    const nextButton = document.querySelector(".carousel-btn.next");

    let currentIndex = 0;

    function updateCarousel() {
        const slideWidth = slides[0].clientWidth;
        carouselContainer.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    }

    prevButton.addEventListener("click", () => {
        currentIndex = (currentIndex === 0) ? slides.length - 1 : currentIndex - 1;
        updateCarousel();
    });

    nextButton.addEventListener("click", () => {
        currentIndex = (currentIndex === slides.length - 1) ? 0 : currentIndex + 1;
        updateCarousel();
    });

    // Auto-slide every 5 seconds
    setInterval(() => {
        nextButton.click();
    }, 5000);
});
