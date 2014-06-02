var functions =
{
	init: function()
	{
		
	},
	flipSlider: function()
	{
		$('#main-slider .flexslider').flexslider(
		{
		    animation: "slide",
		    animationLoop: true,
		    itemWidth: 875,
            controlNav: true
		});
		$(".flipster").flipster();
	},
    respMenu: function()
    {
        var flag = true;
        $('#fixed-menu span.btn').click(function()
        {
            if (flag)
            {
                $('#fixed-menu').animate({left: '0px'},'linear');
                $('.pull-aside , .notify').animate({left: '100px'},'linear');
            }
            else if (!flag)
            {
                $('.pull-aside , .notify').animate({left: '0px'},'linear');
                $('#fixed-menu').animate({left: '-100px'},'linear');   
            }
            flag = !flag;

        });
    },
	tabs: function()
    {
        
        $('#tabs_container > div').fadeOut(0.85);
        $('.loader').fadeIn(1).delay(4500).fadeOut(1); 
        $('#tabs_container > div:first-child').delay(5000).fadeIn('slow');

        $('#tabs a').click(function()
        {
            var item = $(this).data('item');
            $('#tabs_container').animate({ opacity: 'hide' }, "slow",function()
            {
                $('#tabs_container > div').fadeOut(1);
               
                $(item).fadeIn(1);
                $('#tabs_container').animate({ opacity: 'show' }, "slow");
            });

        });
    },
    productsTab: function()
    {
        $('.tabs-wrapper').height($('#tab-1').height());
        $('#tab-1').css({'opacity':'1','z-index':'10'});
        $('#tabs-nav a').click(function()
        {
            
            var item = $(this).attr('href');
            console.log(item);
            $('.loader').fadeIn(1).delay(2000).fadeOut('slow');
            $('.tabs-wrapper').delay(2500).animate({height: 0},300,function()
            {   
                
                $('.tabs-wrapper > section').css({'opacity':'0','z-index':'0'});
                $(item).css({'opacity':'1','z-index':'10'});
                $('.tabs-wrapper').animate({height: $(item).height()});
            });
            return false;
        });
    },
	scrollHandler: function()
    {
        if ($(window).width() > 768)
        {
            var flag = true;
            var h = [];
            h[0] = 0;;
            console.log(h);
            var count = 0;
            $('body,html').mousewheel(function(event,delta)
            {
                
                if (flag)
                {
                    console.log('delta : ' + delta);
                    event.preventDefault();
                    if (delta > 0)
                    {
                    	count--;
                    	if (count < 0)
                    	{
                    		count = 0;
                    	}
                    }
                    else if(delta < 0)
                    {
                        count++;
                    	if (count > 3)
                    	{
                    		count = 3;
                    	}
                    }
                    flag = false;
                    temp = 
                    console.log('flag locked');
                    console.log(h[count] + ':' +count);
                    $('body,html').animate({'scrollTop' : h[count]},700,'easeOutExpo',function()
                    {
                        flag = true;
                        console.log('flag released');
                    });
                }//if scrollFlag
                else
                {
                    event.preventDefault();
                    return false;
                }
            });//on scroll callback
        }//wider than 768
    },
    ponitAnim: function()
    {
        $('#key .key-points ul li').click(function()
        {

            var item = $(this);
            $('#key .key-points li').removeClass('active');
            $('#key .key-points img').fadeOut().attr('src',item.data('img'));
            setTimeout(function()
            {
                item.addClass('active');
                $('#key .key-points img').fadeIn();

            },300);
        });
        $('#key .news ul li').click(function()
        {
            var item = $(this);
            $('#key .news li').removeClass('active');
            $('#key .news img').fadeOut().attr('src',item.data('img'));
            setTimeout(function()
            {
                item.addClass('active');
                $('#key .news img').fadeIn();

            },300);
        });
    },
	clouds: function()
	{
		$('#tabs_container').parallax();

	},
	checkponit: function()
	{
		if($(window).scrollTop() > 205)
		{
			$('#fixed-menu .notify , #fixed-menu .phone, #fixed-menu #basket' ).css('top','40px');


		}
		if($(window).scrollTop() < 205)
		{
			$('#fixed-menu .notify , #fixed-menu .phone , #fixed-menu #basket').css('top', 245-$(window).scrollTop());
		}

        functions.navAnim();
	},
    menuToggleAnim: function()
    {
        if($(window).scrollTop() > 100)
        {
            $('#fixed-menu span.btn').css('margin-top','15px');

        }
        if($(window).scrollTop() < 100)
        {
            $('#fixed-menu span.btn').css('margin-top', 107-$(window).scrollTop());
        }
    },
    navAnim: function()
    {
        if ($(window).width() > 768)
        {
            if($(window).scrollTop() > 115)
            {
                $('#fixed-menu > ul').fadeIn(50);
                $('#fixed-menu').css('background','rgb(56, 54, 54)');

            }
            if($(window).scrollTop() < 115)
            {
                $('#fixed-menu > ul').fadeOut(50);
                $('#fixed-menu').css('background','transparent');
            }
        }
    },
	slidetop: function()
	{
		$(".js-hashtpa-slider-three").each(
            function () {

                var slider = $(this);
                var index = 1;
                var showWidth = $(".js-hashtpa-slider-three-show", slider).width();
                var percentage = parseInt(slider.attr("data-percentage"));
                var slideWidth = (percentage / 100) * showWidth;
                var firstRight = ((1 - (percentage / 100)) / 2) * showWidth;
                var move = slideWidth;
                var totalSlides = $(".js-hashtpa-slider-three-slide", slider).length;
                var trainWidth = totalSlides * slideWidth;

                $('.js-hashtpa-slider-three-show', slider).css({ "position": "relative", "overflow": "hidden" });
                $(".js-hashtpa-slider-three-train", slider).css({ "position": "absolute", "width": trainWidth + "px", "right": firstRight + "px" });
                $('.js-hashtpa-slider-three-slide', slider).css({ "width": slideWidth + "px", "float": "right" });

                for (var i = 0; i < totalSlides; i++) {
                    $("<div class='js-hashtpa-slider-three-page'></div>").appendTo($(".js-hashtpa-slider-three-pages", slider));
                }
                var pages = $(".js-hashtpa-slider-three-page", slider);

                Load();

                function Load() {
                    pages.removeClass("active");
                    $(pages.get(index)).addClass("active");
                    $(".js-hashtpa-slider-three-train", slider).animate(
                        {
                            "right": (-index * move) + firstRight + "px"
                        }
                        );
                }

                $(".next", slider).click(
                    function () {
                        if (index < totalSlides - 1)
                            index++;
                        else
                            index = 0;
                        Load();
                    }
                    );

                $(".previous", slider).click(
                    function () {
                        if (index > 0)
                            index--;
                        else
                            index = totalSlides - 1;
                        Load();
                    }
                    );

                $(".js-hashtpa-slider-three-page").click(
                        function () {
                            index = pages.index($(this));
                            Load();
                        }
                    );
            }
            );
	},
    productMenu: function()
    {
        var $container = $('.wrapper');
        $container.isotope({
          // options
          itemSelector : 'article',
          layoutMode : 'fitRows',
          animationEngine : 'best-available'
        });
        $('#expanding-menu .hor a').click(function(){

            if ($(this).closest('li').hasClass('active')) {
                return false;
            }
            else{

                    $('#expanding-menu li, #expanding-menu .ver').removeClass('active');
                    $(this).closest('li').addClass('active');
                    var selector = $(this).attr('data-filter');
                    console.log(selector);
                    $container.isotope({ filter: selector });
                    if($(this).attr("data-filter") != "*")
                        $('#expanding-menu '+ $(this).attr("data-filter")).addClass('active');
                    
                    return false;
            }
        });

         $('#expanding-menu .ver li a').click(function(){

                   // $('#expanding-menu .hor li, #expanding-menu .ver').removeClass('active');
                    $(this).parent('li').addClass('active');
                    var selector = $(this).attr('data-type');
                    $container.isotope({ filter: selector });

                    
                    return false;
            
        });

         
       
}

    

};

$( document ).ready(function() {
    setInterval(function(){
        jQuery('section#main-slider img.previous').trigger('click');
    },5000);

  $('#tabs li a').click(function(){

        $('#tabs li a').removeClass('active-tabs');
        $(this).addClass('active-tabs');

        });
    

   $('.close-window').click(function(){
            $('#basket').animate({"opacity": "0"}, 500);
            $('#basket').css({"display":"none"});
     });
   $('.notify').click(function(){
    
            $('#basket').animate({opacity: "0.8"}, 500);
            $('#basket').css({"display":"block"});
    });

/*   $('.hide-error').click(function(){
            $('.hide-error').animate({opacity: "0"}, 500);
            $('.back-page').css({"z-index":"1"});
    });
  */
    $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) { // ESC
         $('.error').css({"opacity": "0","display": "none"}, 500);
         $('.back-page').css({"opacity": "0","z-index":"0","display": "none"}, 500);
    }

     });/*.error hide press Esc*/

    $('.active-error-box').click(function(){
            $('.error').css({"opacity": "1","z-index":"1040","display": "block"}, 500);
            $('.back-page').css({"opacity": "1","z-index":"1000","display": "block"}, 500);
     });/*.error show*/

     $('.hide-error').click(function(){
         $('.error').css({"opacity": "0","z-index":"0","display": "none"}, 500);
         $('.back-page').css({"opacity": "0","z-index":"0","display": "none"}, 500);
     });/*.error hide*/


    $('.del-product').click(function(){
         alert("حذف");
     });/*.delete product from basket page*/



$(".post-check").change(function() {
    if(this.checked) {
        $(".post-check-box").slideToggle("slow");
          return false;
    }
    });/*chechkbox ersal posti*/

    setTimeout(function()
        {
            $(".titr-01").fadeOut("slow", function ()
            {
               $(".titr-01").fadeIn("slow");
            });
         },1000);/*news title scroll*/
    
    $("#lista1").als({
                    visible_items: 3,
                    scrolling_items: 1,
                    orientation: "horizontal",
                    circular: "yes",
                    autoscroll: "no",
                    interval: 5000,
                    direction: "right",
                    start_from: 5
                });/*scroll logo footer right & left*/

    $('.hor li:first').before($('.hor li:last')); 
            //when user clicks the image for sliding right            
            $('.right-scroll').click(function(){        
          
            var item_width = $('.hor li').outerWidth() + 10;
            var right_indent = parseInt($('.hor').css('right')) - item_width;
           
            $('.hor:not(:animated)').animate({'right' : right_indent},500,function(){    
               
                $('.hor li:last').after($('.hor li:first')); 
               
                $('.hor').css({'right' : '0px'});
            });//next-hor
        });            
        
            //when user clicks the image for sliding left
        $('.right-scroll').click(function(){
            var item_width = $('.hor li').outerWidth() + 10;
           
            var right_indent = parseInt($('.hor').css('right')) + item_width;
            $('.hor:not(:animated)').animate({'right' : left_indent},500,function(){    
           
            $('.hor li:first').before($('.hor li:last')); 
           
            $('.hor').css({'right' : '0px'});
            });
            
            
        });//prv-hor

        var map;
                    map = new GMaps({
                        div: '#map',
                        zoom: 14,
                        lat: 35.671855,
                        lng: 51.283579,
                        });
                    map.addMarker({
                        lat: 35.671855,
                        lng: 51.283579,
                        title: '',
                        icon: '/static/img/Location-Pointer.png',
                        infoWindow: {
                        content: '<p>Behsazan Ghaleb Company</p>'
                                },
                        });//googlemap

});//ready

 