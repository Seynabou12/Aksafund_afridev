
$(function () {
    $('.navbar').css("box-shadow","none");

    $(window).scroll(function(){
        var wScroll = $(this).scrollTop();
        if (wScroll > 0)
        { 
            $('.navbar').css("box-shadow","0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12)");
            $('.navbar').css("background-color","#eee");
            $('.logo-ds').css("height","40");
        }else{
            $('.navbar').css("box-shadow","none");
            $('.logo-ds').css("height","60");
            $('.navbar').css("background-color","transparent");
        }
    });
});