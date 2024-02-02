/**!
 * @package   Applicants
 * @filename  app.js
 * @version   1.0
 * @author    Díaz Urbaneja Víctor Eduardo Diex <diazvictor@tutamail.com>
 * @date      18.01.2024 00:58:31 -04
 */

const navbarToggle = document.getElementById('navbar-bars');
const navbarBars = navbarToggle.querySelector('.icon i');
const navbarMenu = document.getElementById('navbar-menu');

navbarToggle.addEventListener('click', () => {
	navbarToggle.classList.toggle('is-active');
	navbarMenu.classList.toggle('is-active');
});
