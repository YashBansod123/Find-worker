document.addEventListener('DOMContentLoaded', () => {
    const workerId = new URLSearchParams(window.location.search).get('id');
    const workerDetailsContainer = document.querySelector('.worker-details');

    console.log("Worker ID from URL:", workerId); // Debugging

    fetch('worker-detailed.json')
    .then(response => response.json())
    .then(workers => {
        const worker = workers.find(w => w.id == workerId);
        if (worker) {
            renderWorkerDetails(worker);
        } else {
            workerDetailsContainer.innerHTML = '<p>Worker not found!</p>';
        }
    })
    .catch(error => {
        console.error("Error loading worker data:", error);
        workerDetailsContainer.innerHTML = `<p>Error loading worker details. Please try again later.</p>`;
    });


    function renderWorkerDetails(worker) {
        workerDetailsContainer.innerHTML = `
            <div class="worker-header">
                <img src="images/worker-placeholder.jpg" alt="Worker Photo">
                <h2>${worker.name}</h2>
                <p>Expert ${worker.category} with ${worker.experience}</p>
                <button>Contact Now</button>
            </div>
            <div class="worker-info">
                <h3>Details</h3>
                <p><strong>Skills:</strong> ${worker.skills.join(', ')}</p>
                <p><strong>Experience:</strong> ${worker.experience}</p>
                <p><strong>Rating:</strong> ⭐⭐⭐⭐⭐ (${worker.rating}/5)</p>
                <p><strong>Location:</strong> ${worker.location}</p>
                <p><strong>Availability:</strong> ${worker.availability}</p>
            </div>
        `;
    }
});
