$(document).ready(function(){
    $('.bxslider').bxSlider({
        auto: true,
        touchEnabled: false,
        mode: 'fade'
    });
    $('#popup').modal('show');
    setTimeout(function() {$('#popup').modal('hide');}, 15000);

    // With JQuery
    // $("#ex15").slider({
    //     min: 0,
    //     max: 15,
    //     step: 3,
    //     value:0
	// });
    
    $('.scroll').click(function() {
        $('body').animate({
            scrollTop: eval($('#' + $(this).attr('href')).offset().top - 150)
        }, 1000);
    });
    $("#name").keypress(function(event){
        var inputValue = event.charCode;
        if(!(inputValue >= 65 && inputValue <= 122) && (inputValue != 32 && inputValue != 0)){
            event.preventDefault();
        }
    });
    $("#Mobile").keyup(function(){
        var value = $(this).val();
        value = value.replace(/^(0*)/,"");
        $(this).val(value);
    });
    $('#name').bind("cut copy paste",function(e) {
        e.preventDefault();
    });
    $('#Mobile').bind("cut copy paste",function(e) {
        e.preventDefault();
    });
    
    // $("#toggle").click(function() {
    //     var elem = $("#toggle").html();
    //     if (elem == 'Read More <span class="plus">+</span>') {
    //       //Stuff to do when btn is in the read more state
    //       $("#toggle").html('Show Less <span class="plus">-</span>');
    //       $("#text").slideDown();
    //     } else {
    //       //Stuff to do when btn is in the read less state
    //       $("#toggle").html('Read More <span class="plus">+</span>');
    //       $("#text").slideUp();
    //     }
    //   });
//       $('a[href*=#]').bind('click', function(e) {
//         e.preventDefault(); // prevent hard jump, the default behavior

//         var target = $(this).attr("href"); // Set the target as variable

//         // perform animated scrolling by getting top-position of target-element and set it as scroll target
//         $('html, body').stop().animate({
//                 scrollTop: $(target).offset().top
//         }, 600, function() {
//                 location.hash = target; //attach the hash (#jumptarget) to the pageurl
//         });

//         return false;
// });
	
	window.addEventListener("scroll",function(){
  /*   var target = document.getElementsByClassName('applyBtn');
    //var val = document.getElementsByClassName('pageoff');
    if(window.pageYOffset > 320){
    target[0].style.display = "block"; 
    }
    else if(window.pageYOffset < 320){
        target[0].style.display = "none";
    } */
  //val[0].innerHTML = 'PageYOffset = ' + window.pageYOffset;
},false);
	
});
