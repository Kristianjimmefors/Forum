/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');


function commentOpt(id) {
    let popup = id.parentElement.nextElementSibling;

    if (popup.style.display != 'block') {
        popup.style.display = 'block';
    }
    else{
        popup.style.display = 'none';
    }
}

function postOpt(id) {
    let popup = id.nextElementSibling;

    if (popup.style.display != 'block') {
        popup.style.display = 'block';
    }
    else {
        popup.style.display = 'none';
    }
}
const container = $('#content-container');
$(window).resize(()=>{
    if(window.innerWidth <= 768){
        container.removeClass('border-left');
        container.removeClass('border-right');
    }else{
        container.addClass('border-left');
        container.addClass('border-right');
    }
})

function openChangePassword(){
    $('#change-password').modal('show');
}

window.commentOpt = commentOpt;
window.postOpt = postOpt;
window.openChangePassword = openChangePassword;