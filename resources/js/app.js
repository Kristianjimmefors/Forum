require('./bootstrap');

require('./components/Example');
require('./components/profile')

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
const content = $('.d-flex');
$(window).resize(()=>{
    if(window.innerWidth <= 768){
        container.removeClass('border-left');
        container.removeClass('border-right');
        container.removeClass('container');
    }else{
        container.addClass('border-left');
        container.addClass('border-right');
        container.addClass('container');
    }

    if(window.innerWidth <=576){
        if(!content.hasClass('flex-wrap')){
            content.addClass('flex-wrap');
        }
    } else{
        content.removeClass('flex-wrap');
    }
})

function openChangePassword(){
    $('#change-password').modal('show');
}

window.commentOpt = commentOpt;
window.postOpt = postOpt;
window.openChangePassword = openChangePassword;