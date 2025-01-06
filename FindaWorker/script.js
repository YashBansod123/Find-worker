// Select the search button and input field
const searchButton = document.querySelector('.hero button');
const searchInput = document.querySelector('.hero input');
const categories = document.querySelectorAll('.category');

// Mock worker database
const workers = [
  { id: 1, name: 'John Doe' },
  { id: 2, name: 'Jane Smith' },
  { id: 3, name: 'Alex Johnson' },
  { id: 4, name: 'Michael Brown' },
];

// Show spinner function
const showSpinner = () => {
  document.getElementById('loadingSpinner').style.display = 'flex';
};

const hideSpinner = () => {
  document.getElementById('loadingSpinner').style.display = 'none';
};

// Search logic with debounce and spinner visibility
let debounceTimer;
searchButton.addEventListener('click', () => {
  showSpinner();
  setTimeout(() => {
    const query = searchInput.value.trim().toLowerCase();

    if (query) {
      const strictMatchWorker = workers.find(worker => worker.name.toLowerCase() === query);
      if (strictMatchWorker) {
        window.location.href = `worker-details.html?id=${strictMatchWorker.id}`;
        return;
      }

      const partialMatchWorkers = workers.filter(worker => worker.name.toLowerCase().includes(query));
      if (partialMatchWorkers.length === 1) {
        window.location.href = `worker-details.html?id=${partialMatchWorkers[0].id}`;
      } else if (partialMatchWorkers.length > 1) {
        alert(`Multiple workers match your search: ${partialMatchWorkers.map(w => w.name).join(', ')}`);
      } else {
        let foundCategory = false;
        categories.forEach(category => {
          const title = category.querySelector('h4').textContent.toLowerCase();
          category.style.display = title.includes(query) ? 'block' : 'none';
          if (title.includes(query)) foundCategory = true;
        });

        if (!foundCategory) alert(`No categories or workers match your search: "${query}"`);
      }
    } else {
      alert('Please enter a search query!');
    }

    hideSpinner();
  }, 500); // Simulate delay for visual effect
});

// Real-time filtering logic
searchInput.addEventListener('keyup', () => {
  clearTimeout(debounceTimer);
  debounceTimer = setTimeout(() => {
    const query = searchInput.value.trim().toLowerCase();
    categories.forEach(category => {
      const title = category.querySelector('h4').textContent.toLowerCase();
      category.style.display = title.includes(query) ? 'block' : 'none';
    });
  }, 300); // Debounce time in milliseconds
});

// Add animation to features section
const featureItems = document.querySelectorAll('.features li');
window.addEventListener('scroll', () => {
  const triggerPoint = window.innerHeight * 0.8;
  featureItems.forEach(item => {
    const itemTop = item.getBoundingClientRect().top;
    if (itemTop < triggerPoint) {
      item.classList.add('show');
    }
  });
});

// Smooth Scrolling for Navigation Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();
    document.querySelector(this.getAttribute('href')).scrollIntoView({
      behavior: 'smooth',
    });
  });
});

// Modal Functionality with Fade Animation
const modal = document.getElementById('loginModal');
const loginLink = document.querySelector('a[href="#login"]');
const closeModalButton = document.querySelector('.close');

const openModal = () => {
  modal.style.opacity = '0';
  modal.style.display = 'flex';
  setTimeout(() => {
    modal.style.opacity = '1';
    modal.style.transition = 'opacity 0.5s ease-in-out';
  }, 0);
};

const closeModal = () => {
  modal.style.opacity = '0';
  setTimeout(() => {
    modal.style.display = 'none';
  }, 500); // Match the duration of the fade-out animation
};

loginLink.addEventListener('click', (e) => {
  e.preventDefault();
  openModal();
});

closeModalButton.addEventListener('click', closeModal);
window.addEventListener('click', (e) => {
  if (e.target === modal) {
    closeModal();
  }
});
window.addEventListener('keydown', (e) => {
  if (e.key === 'Escape' && modal.style.display === 'flex') {
    closeModal();
  }
});

// Profile Modal functionality
document.addEventListener('DOMContentLoaded', () => {
  const profileIcon = document.getElementById('profileIcon');
  const profileModal = document.getElementById('profileModal');
  const closeModal = profileModal.querySelector('.close');

  profileIcon.addEventListener('click', () => {
    profileModal.style.display = 'flex';
  });

  closeModal.addEventListener('click', () => {
    profileModal.style.display = 'none';
  });

  window.addEventListener('click', (e) => {
    if (e.target === profileModal) {
      profileModal.style.display = 'none';
    }
  });
});

// Hamburger menu functionality
document.addEventListener('DOMContentLoaded', () => {
  const hamburger = document.querySelector('.hamburger');
  const navLinks = document.querySelector('.nav-links');

  hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    hamburger.classList.toggle('toggle');
  });
});

const profileIcon = document.querySelector('.profile-icon');
const dropdownMenu = document.querySelector('#dropdown');

profileIcon.addEventListener('mouseenter', () => {
  dropdownMenu.classList.add('show');
});

profileIcon.addEventListener('mouseleave', () => {
  dropdownMenu.classList.remove('show');
});


        