$(document).ready(function () {    
    $(".slide-right").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active-right");
    });
    
    $(".chat-panel").click(function(e) {
        e.preventDefault();
        $("#chat-wrapper").addClass("open-chat");
    });
    
    $(".close-chat").click(function(e) {
        e.preventDefault();
        $("#chat-wrapper").removeClass("open-chat");
    });
    
});