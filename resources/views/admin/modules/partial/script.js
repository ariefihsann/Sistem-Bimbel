function navigateTo(id) {
    window.location.href = "{{ url('/modul') }}/" + id + "/materi";
}



// Add keyboard accessibility
document.querySelectorAll('.course-card').forEach(card => {
    card.addEventListener('keypress', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
            this.click();
        }
    });

    card.setAttribute('tabindex', '0');
    card.setAttribute('role', 'button');
});