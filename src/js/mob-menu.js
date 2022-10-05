const menuButton = document.querySelector('.header__menu-button');
const mobMenu = document.querySelector('.header__nav-overlay');
const menuClose = document.querySelector('.header__nav-close');
const body = document.querySelector('body');

if(menuButton && mobMenu) {
    menuButton.addEventListener('click', event => {
        event.preventDefault();
        mobMenu.classList.add('header__nav-overlay--active');
        body.classList.add('mob-menu-active');
    });
    
    menuClose.addEventListener('click', event => {
        event.preventDefault();
        mobMenu.classList.remove('header__nav-overlay--active');
        body.classList.remove('mob-menu-active');
    });
}
 


