document.addEventListener('DOMContentLoaded', () => {
    console.log("Electricians page loaded!");
    
    // Example: Add a simple animation when scrolling
    const services = document.querySelectorAll('.service');
    
    const handleScrollAnimation = () => {
      services.forEach((service, index) => {
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
  