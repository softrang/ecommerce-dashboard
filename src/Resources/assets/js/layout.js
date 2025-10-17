
    // Toggle submenu open/close
    document.querySelectorAll('.has-submenu').forEach(item => {
        item.addEventListener('click', function(e) {
            // Prevent redirect if has submenu
            if (this.querySelector('.submenu')) {
                e.preventDefault();
                this.classList.toggle('open');
            }
        });
    });
