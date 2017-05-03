;(function($){

 /* var movementStrength = 50;
  var height = movementStrength / $(window).height();
  var width = movementStrength / $(window).width();
  $(".layer").mousemove(function(e){
            //var pageX = e.pageX - ($(window).width() / 2);
            var pageY = e.pageY - ($(window).height() / 2);
           // var newvalueX = width * pageX * -1 - 25;
            var newvalueX = 0;
            var newvalueY = height * pageY * -1 - 50;
            $(this).css("background-position", newvalueX+"px     "+newvalueY+"px");
  });*/
  var isMobile = {
          Android: function() {
              return navigator.userAgent.match(/Android/i);
          },
          BlackBerry: function() {
              return navigator.userAgent.match(/BlackBerry/i);
          },
          iOS: function() {
              return navigator.userAgent.match(/iPhone|iPad|iPod/i);
          },
          Opera: function() {
              return navigator.userAgent.match(/Opera Mini/i);
          },
          Windows: function() {
              return navigator.userAgent.match(/IEMobile/i);
          },
          any: function() {
              return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
          }
      };

  $(".date").flatpickr({
      minDate: "today",
      onChange: function(selectedDates, dateStr, instance) {
           //$('.filters').find('form').submit();
        },
    });

  $(".time").flatpickr({
       enableTime: true,
       noCalendar: true,

       enableSeconds: false, // disabled by default

       time_24hr: true,
    });

  $('#transfer-popup').find('select[name="type"]').on('change', function (e) {
      console.log($(this).val());
      if($(this).val() == 'Round Trip')
      {
        $('.roundtrip-fields').show();
      }else{
        $('.roundtrip-fields').hide();
      }
  })

  /*$('.lazy').Lazy({
        // your configuration goes here
        scrollDirection: 'vertical',
        effect: 'fadeIn',
        effectTime: 500,
        threshold : 200,
        //visibleOnly: true,
        onError: function(element) {
            console.log('error loading ' + element.data('src'));
        },
        afterLoad: function(element) {
            
            if( ! isMobile.any() ) {
        
               element.interactive_bg({
                 strength: 25,
                 scale: 1.05,
                 animationSpeed: "100ms",
                 contain: true,
                 wrapContent: false
               });         
            }
      
            
        },
        onFinishedAll: function() {
            
            /*$(".layer").interactive_bg({
             strength: 25,
             scale: 1.05,
             animationSpeed: "100ms",
             contain: true,
             wrapContent: false
           });

        }
    });*/

  // Pretty simple huh?
   

  var $btnMenu = $('#btn-menu'),
      $btnMenuFooter = $('#btn-menu-footer'),
      $menu = $('.nav-container');
      $menuFooter = $('.footer-nav');
      $body = $('body');

 
  
  //new WOW().init();

  $btnMenu.on('click', function (e) {
    
      //$body.toggleClass('nav-is-open');
      $menu.toggle();

  });
  $btnMenuFooter.on('click', function (e) {
    
      //$body.toggleClass('nav-is-open');
      $menuFooter.toggle();

  });

 $menu.find(".menu-item").hoverIntent({
      over: function() {
            $itemMenu = $(this);
            $itemMenu.find(".menu-description").addClass('show');
            /*$itemMenu.find(".menu-description").addClass('animated fadeInUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                 
            });*/
            
          },
      out:  function() {
            $itemMenu = $(this);
            $itemMenu.find(".menu-description").removeClass('show');
            /*$itemMenu.find(".menu-description").removeClass('animated fadeInUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                  $itemMenu.find(".menu-description").addClass('animated fadeOutDown');
            });*/


          },
      timeout: 10

       });

$menu.find(".menu-item-has-children").hoverIntent({
      over: function() {
            $(this).find(">.sub-menu").slideDown(200 );
          },
      out:  function() {
            $(this).find(">.sub-menu").slideUp(200);
          },
      timeout: 200

       });

var itemsContainer = $(".items-container");
itemsContainer.mousewheel(function(event, delta) {

      this.scrollLeft -= (delta * 90);
    
      event.preventDefault();

   });

var scrollHandle = 0,
        scrollStep = 5;

    //Start the scrolling process
    $(".items-arrow").on("mouseenter", function () {
        var data = $(this).data('scrollModifier'),
            direction = parseInt(data, 10);

        $(this).addClass('active');

        startScrolling(direction, scrollStep);
    });

    //Kill the scrolling
    $(".items-arrow").on("mouseleave", function () {
        stopScrolling();
        $(this).removeClass('active');
    });

    //Actual handling of the scrolling
    function startScrolling(modifier, step) {
        if (scrollHandle === 0) {
            scrollHandle = setInterval(function () {
                var newOffset = itemsContainer.scrollLeft() + (scrollStep * modifier);

                itemsContainer.scrollLeft(newOffset);
            }, 10);
        }
    }

    function stopScrolling() {
        clearInterval(scrollHandle);
        scrollHandle = 0;
    }

  $('.transfer-popup-link').magnificPopup({
        type: 'inline',
        midClick: true,
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function() {

                this.st.mainClass = 'mfp-zoom-out';
                $('body').addClass('mfp-open');
            },
            beforeClose: function() {

               
                $('body').removeClass('mfp-open');
            }

        }

       
    });
/*
$(".items-arrow").click(function() {
  if ($(this).hasClass("items-arrow-right")) {
    x = ((itemsContainer.width() / 2)) + itemsContainer.scrollLeft();
    itemsContainer.animate({
      scrollLeft: x,
    })
  } else {
    x = ((itemsContainer.width() / 2)) - itemsContainer.scrollLeft();
    itemsContainer.animate({
      scrollLeft: -x,
    })
  }
})*/


 /*$(".items-container").owlCarousel({
          //center:true,
          mouseDrag:false,
          items : 5,
          autoplay : false,
          loop : false,
          nav : true,
          navText : ['<i class="icon-angle-left"></i>','<i class="icon-angle-right"></i>'],
          margin: 20,
          responsiveClass:true,
          responsive:{
              0:{
                  items:1,
                  nav:true
              },
              /*480:{
                  items:2,
                  nav:true
              },*/
           /*   640:{
                  items:2,
                  nav:true
              },
              1024:{
                  items:3,
                  nav:true
              },
              1368:{
                  items:5,
                  nav:true,
                  
              },
              1680:{
                  items:5,
                  nav:true,
              }
          }
          
     });*/

 /*$(".owl-carousel").owlCarousel({
      animateOut: 'fadeOut',
      items : 1,
      autoplay : true,
      loop : true,
      nav : true,
      navText : ['','']
      /*onChange : function (e) {
        console.log(e.target);
        $('.owl-item.active span').addClass('animated');
        $('.owl-item.active h1').addClass('animated');
      }*/
      /*slideSpeed : 300,
      paginationSpeed : 400,*/
      /*singleItem:true*/
 /* });*/

 // SMOOTH ANCHOR SCROLLING
    var $root = jQuery('html, body');
    jQuery('a.anchor').click(function(e) {
        var href = jQuery.attr(this, 'href');

        if (typeof(jQuery(href)) != 'undefined' && jQuery(href).length > 0) {
            var anchor = '';

            if (href.indexOf("#") != -1) {
                anchor = href.substring(href.lastIndexOf("#"));
            }
           
            if (anchor.length > 0) {
                /*console.log(jQuery(anchor).offset().top);
                console.log(anchor);*/


                $root.animate({
                    scrollTop: jQuery(anchor).offset().top-75
                }, 500, function() {
                    window.location.hash = anchor;
                });
                e.preventDefault();
            }
        }else{ // si no esta la seccion se va al home
           window.location.replace('/' + href);
        }
    });

     //SCROLL WINDOW FUNCTIONALITY

    $('.items-container, .section').scroll(function () {
          if ($(this).scrollTop() > 50) {
              $('.shadow').addClass("scroll");
              
          } else {
              $('.shadow').removeClass("scroll");
              
          }
          /*if ($(this).scrollTop() > 300) {
              
              $('.scroll-top').addClass("on");
          } else {
             
              $('.scroll-top').removeClass("on");
          }*/
      });

 $(window).load(function() {
     
      // Preloader
    $('.home').css('opacity', '0');
    $('.preloader').addClass('animated fadeOut').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $('.preloader').hide();
      $('.home').addClass('animated fadeIn').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        //$('.intro-tables').addClass('animated fadeInUp').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend');
      });
    });
     
      resizes();
      setDescriptionMenus();

    });

    $(window).resize(resizes);

    function setDescriptionMenus() {
        $menu.find(".menu-item").each(function () {

           var description = $(this).find("a").attr('title');
            $(this).append('<div class="menu-description">'+description +'</div>')
         
        });
    }
    function resizes()
     {
      
      
        

          $('.tours-img').height($(".tours").height());

          if(getWindowWidth() > 1350)
            $('.home-video video').height('auto').width($("body").width() + 90);
          else
            $('.home-video video').height($("body").height() + 90).width('auto');
        
        
       
      

     }
  

    
})(jQuery);

function getWindowHeight() {
  var windowHeight=0;
  if (typeof(window.innerHeight)=='number') {
    windowHeight=window.innerHeight;
  } else {
    if (document.documentElement && document.documentElement.clientHeight) {
      windowHeight = document.documentElement.clientHeight;
    } else {
      if (document.body && document.body.clientHeight) {
        windowHeight=document.body.clientHeight;
      }
    }
  }
  return windowHeight;
}

function getWindowWidth() {
  var windowWidth=0;
  if (typeof(window.innerWidth)=='number') {
    windowWidth=window.innerWidth;
  } else {
    if (document.documentElement && document.documentElement.clientWidth) {
      windowWidth = document.documentElement.clientWidth;
    } else {
      if (document.body && document.body.clientWidth) {
        windowWidth=document.body.clientWidth;
      }
    }
  }
  return windowWidth;
}


