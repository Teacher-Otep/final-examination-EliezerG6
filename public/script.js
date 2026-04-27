// Function to show/hide sections according to UX design requirements
function showSection(sectionID) {
    // Hide all content and home sections
    document.querySelectorAll('.content, .homecontent').forEach(section => {
        section.style.display = 'none';
    });

    // Show only the selected section
    const activeSection = document.getElementById(sectionID);
    if (activeSection) {
        activeSection.style.display = 'block';
    }
}

// Logo mouse event: hide all 'content' sections when clicked 
document.getElementById('logo').addEventListener('click', function () {
    document.querySelectorAll('.content').forEach(section => {
        section.style.display = 'none';
    });
    // Ensure home is visible if that is the desired behavior
    document.getElementById('home').style.display = 'block';
});

// Function to clear all text and number inputs 
document.getElementById('clrbtn').addEventListener('click', function () {
    document.querySelectorAll('#create input').forEach(input => {
        input.value = '';
    });
});

// Existing logic for insertion success toast
window.onload = function () {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'success') {
        const toast = document.getElementById('success-toast');
        toast.classList.remove('toast-hidden');

        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => toast.classList.add('toast-hidden'), 500);
        }, 3000);

        window.history.replaceState({}, document.title, window.location.pathname);
    }
};
// Add this to the bottom of your script.js file

// Check if the URL has 'update_id' and show the update section automatically
window.addEventListener('DOMContentLoaded', (event) => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('update_id')) {
        showSection('update');
    }
});