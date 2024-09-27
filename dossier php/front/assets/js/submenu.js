document.addEventListener('DOMContentLoaded', function () {
    var dropdownSubmenus = document.querySelectorAll('.dropdown-submenu');

    dropdownSubmenus.forEach(function (submenu) {
        submenu.addEventListener('mouseover', function () {
            var subMenu = submenu.querySelector('.dropdown-menu');
            if (subMenu) {
                subMenu.classList.add('show');
            }
        });

        submenu.addEventListener('mouseout', function () {
            var subMenu = submenu.querySelector('.dropdown-menu');
            if (subMenu) {
                subMenu.classList.remove('show');
            }
        });
    });
});