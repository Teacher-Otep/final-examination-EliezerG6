
function showSection(sectionID) {
   
    document.querySelectorAll('.content, .homecontent').forEach(section => {
        section.style.display = 'none';
    });

   
    const activeSection = document.getElementById(sectionID);
    if (activeSection) {
        activeSection.style.display = 'block';
    }
}


document.getElementById('logo').addEventListener('click', function () {
    document.querySelectorAll('.content').forEach(section => {
        section.style.display = 'none';
    });
    // Ensure home is visible if that is the desired behavior
    document.getElementById('home').style.display = 'block';
});


document.getElementById('clrbtn').addEventListener('click', function () {
    document.querySelectorAll('#create input').forEach(input => {
        input.value = '';
    });
});


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


window.addEventListener('DOMContentLoaded', (event) => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('update_id')) {
        showSection('update');
    }
});
