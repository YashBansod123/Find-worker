document.addEventListener('DOMContentLoaded', () => {
    console.log("Plumbers page loaded!");
    
    const services = document.querySelectorAll('.service');
    
    const handleScrollAnimation = () => {
        services.forEach((service) => {
            const serviceTop = service.getBoundingClientRect().top;

            if (serviceTop < window.innerHeight - 50) {
                service.style.transition = 'transform 0.5s ease-in-out';
                service.style.transform = `translateY(0px)`;
            } else {
                service.style.transform = 'translateY(20px)';
            }
        });
    };

    window.addEventListener('scroll', handleScrollAnimation);
    handleScrollAnimation(); // Run on load as well
});
