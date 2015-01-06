$(document).ready(function() {

    //Menu Open   
    $('.menu-link').click(function() {
        $('#site-menu').toggle();
    });

    //Hide site-nav content.    
    $('#site-menu').hide();
});
// $(window).resize(function() {
//   if ($(window).width() > 480) {
//       $('.menu-link').css('display','none');
//       $('.#site-menu ul').show();
//   }
//   else {
//       $('.menu-link').css('display','block');
//       $('.#site-menu ul').hide();
//   }
// });