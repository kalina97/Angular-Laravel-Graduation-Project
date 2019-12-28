
//funkcija za back to top dugme
$(document).ready(function(){
$("#dugmence").click(function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: 0
    }, 800);
});
});



    