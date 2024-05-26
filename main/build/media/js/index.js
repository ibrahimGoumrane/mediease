document.addEventListener('DOMContentLoaded', () => {
    const links = document.querySelectorAll('ul li a');

    links.forEach(link => {
        link.addEventListener('click', (event) => {
            // Prevent default action
            event.preventDefault();

            // Remove activeLink class from all links
            links.forEach(l => l.classList.remove('activeLink'));

            // Add activeLink class to the clicked link
            event.currentTarget.classList.add('activeLink');

            // Update the URL hash
            const targetId = event.currentTarget.getAttribute('href');
            history.pushState(null, '', targetId);
        });
    });

    // On page load, check if there's an active link based on URL hash
    const currentHash = window.location.hash;
    if (currentHash) {
        const activeLink = document.querySelector(`a[href="${currentHash}"]`);
        if (activeLink) {
            activeLink.classList.add('activeLink');
        }
    }
});