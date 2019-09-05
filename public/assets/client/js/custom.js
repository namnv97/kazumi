jQuery('.slide-bn-home').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:true,
    animateOut: 'fadeOut',
    smartSpeed:450,
    autoplay:true,
    autoplayTimeout:5500,
    items:1
})
$('.slide-discover').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    items:1
})
$('.slide-pro-recently').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    dots:false,
    navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})

jQuery(document).ready(function() {
	jQuery('header').scrollToFixed();
  	jQuery(window).on('scroll',function(){

      if (jQuery(window).scrollTop() > 10) {
          jQuery('header').addClass('on-scroll');
      } else {
          jQuery('header').removeClass('on-scroll');
      }
    })

    jQuery('.head-blog').scrollToFixed();
    window.onscroll = function() {
      if (window.pageYOffset > 10) {
          jQuery('.head-blog').addClass('on-scroll');
      } else {
          jQuery('.head-blog').removeClass('on-scroll');
      }
    };
});
$(document).ready(function(){
  jQuery("#accordion .accordion-pro-item h3").click(function(){
    if (jQuery(this).hasClass("active")) {
        jQuery(this).parents(".accordion-pro-item").find(".accordion-pro-content").slideUp();
        jQuery(this).removeClass("active");
    } else {
        jQuery(this).parents("#accordion").find(".accordion-pro-content").slideUp();
        jQuery(this).parents(".accordion-pro-item").find(".accordion-pro-content").slideDown();
        jQuery(this).addClass("active");
    }
  });
  jQuery(".faq-content .faq-box .Faq__Question").click(function(){
    if (jQuery(this).hasClass("active")) {
        jQuery(this).parents(".faq-content .faq-box ul li").find(".Faq__Answer").slideUp();
        jQuery(this).removeClass("active");
    } else {
        jQuery(".faq-content .Faq__Question.active").next().slideUp();
        jQuery(".faq-content .Faq__Question").removeClass('active');
        jQuery(this).next().slideDown();
        jQuery(this).addClass("active");
    }
  });
});

$(document).ready(function() {

  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
  var slidesPerPage = 4; //globaly define number of elements per page
  var syncedSecondary = true;

  sync1.owlCarousel({
    items : 1,
    slideSpeed : 2000,
    nav: false,
    autoplay: false,
    dots: false,
    loop: true,
    responsiveRefreshRate : 200,
    navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
  }).on('changed.owl.carousel', syncPosition);

  sync2
    .on('initialized.owl.carousel', function () {
      sync2.find(".owl-item").eq(0).addClass("current");
    })
    .owlCarousel({
    items : 8,
    dots: false,
    nav: false,
    smartSpeed: 200,
    slideSpeed : 500,
    margin: 10,
    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
    responsiveRefreshRate : 100
  }).on('changed.owl.carousel', syncPosition2);

  function syncPosition(el) {
    //if you set loop to false, you have to restore this next line
    //var current = el.item.index;
    
    //if you disable loop you have to comment this block
    var count = el.item.count-1;
    var current = Math.round(el.item.index - (el.item.count/2) - .5);
    
    if(current < 0) {
      current = count;
    }
    if(current > count) {
      current = 0;
    }
    
    //end block

    sync2
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = sync2.find('.owl-item.active').length - 1;
    var start = sync2.find('.owl-item.active').first().index();
    var end = sync2.find('.owl-item.active').last().index();
    
    if (current > end) {
      sync2.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      sync2.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }
  
  function syncPosition2(el) {
    if(syncedSecondary) {
      var number = el.item.index;
      sync1.data('owl.carousel').to(number, 100, true);
    }
  }
  
  sync2.on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).index();
    sync1.data('owl.carousel').to(number, 300, true);
  });
});

jQuery(document).ready(function() {
    jQuery('.box-star-view .SectionHeader__ButtonWrapper .ButtonGroup__Item').click(function(e) {
      e.preventDefault();
      jQuery('.jdgm-form-wrapper').slideToggle('slow');
      
    });

    jQuery('.CollectionToolbar .CollectionToolbar__LayoutType.two').click(function() {
        jQuery('.shop-content .list-pro .row .col-pro').removeClass('col-md-4');
        jQuery('.shop-content .list-pro .row .col-pro').removeClass('col-lg-4');
        jQuery('.shop-content .list-pro .row .col-pro').addClass('col-md-6');
        jQuery('.shop-content .list-pro .row .col-pro').addClass('col-lg-6');
        jQuery(this).addClass('is-active');
        jQuery('.CollectionToolbar .CollectionToolbar__LayoutType.four').removeClass('is-active');
    });
    jQuery('.CollectionToolbar .CollectionToolbar__LayoutType.four').click(function() {
        jQuery('.shop-content .list-pro .row .col-pro').removeClass('col-md-6');
        jQuery('.shop-content .list-pro .row .col-pro').removeClass('col-lg-6');
        jQuery('.shop-content .list-pro .row .col-pro').addClass('col-md-4');
        jQuery('.shop-content .list-pro .row .col-pro').addClass('col-lg-4');
        jQuery(this).addClass('is-active');
        jQuery('.CollectionToolbar .CollectionToolbar__LayoutType.two').removeClass('is-active');
    });


    jQuery('.search .Search__Close').click(function(event) {
        jQuery(this).parents('.search').css({
            visibility: 'hidden',
            opacity: '0'
        });
    });
    jQuery('.search-btn-head>a').click(function(e) {
        e.preventDefault();
        jQuery('.search').css({
          visibility: 'visible',
          opacity: '1'
        });
    });
  
});
jQuery(document).ready(function () {
    jQuery('.menu-site .btn-show-menu').click(function () {
        jQuery(this).parents('.menu-site').find('.menu-box').css('width','100%');
    });
    jQuery('.menu-box .btn-hide-menu, .menu-box .bg-menu').click(function () {
        jQuery(this).parents('.menu-box ').css('width','0');
    });
    jQuery('.menu-left ul .menu-item-has-mega').hover(function() {
        jQuery(this).addClass('active-mega');
        jQuery('.MegaMenu').css({
          visibility: 'visible',
          opacity: '1'
        });
    }, function() {
      jQuery(this).removeClass('active-mega');
      jQuery('.MegaMenu').css({
          visibility: 'hidden',
          opacity: '0'
        });
    });

    jQuery('.MegaMenu').hover(function() {
        jQuery(this).css({
          visibility: 'visible',
          opacity: '1'
        });
        jQuery('.menu-left ul .menu-item-has-mega').addClass('active-mega');
    }, function() {
        jQuery(this).css({
          visibility: 'hidden',
          opacity: '0'
        });
        jQuery('.menu-left ul .menu-item-has-mega').removeClass('active-mega');
    });

    if($(window).width()<992){
        jQuery('.main-menu li.menu-item-has-children>a').click(function (e) {
            e.preventDefault();
            jQuery(this).parent().children('.dropdowwn-menu').slideToggle('slow');
            jQuery(this).toggleClass('active-plus');
        });
    }
});

jQuery(document).ready(function() {
    jQuery('.CollectionToolbar__Item--sort').click(function() {
        jQuery('#collection-sort-popover,#collection-sort-popover:before').slideToggle('fast');
    });
    jQuery('#filter .Collapsible__Inner .Collapsible__Content ul li button').click(function() {
        jQuery('#filter .Collapsible__Inner .Collapsible__Content ul li').removeClass('is-selected');
        jQuery(this).parent().addClass('is-selected');
    });

    calculator();

    jQuery('body').on('click','#sidebar-cart .QuantitySelector span',function(e){
      e.preventDefault();
      var val = jQuery(this).parent().find('input').val();
      if(jQuery(this).hasClass('minus'))
      {
        val = parseInt(val) - 1;
      }
      else
      {
        val = parseInt(val) + 1;
      }

      jQuery(this).parent().find('input').val(val);
      jQuery(this).parent().find('input').trigger('change');
    });
});


function check_cart()
{
  var count = 0;
  jQuery('#sidebar-cart .CartItem').each(function(){
    count ++;
  })
  return count;
}

function calculator()
{
  var total = 0;
  var all = 0;
  jQuery('#sidebar-cart input[name=quantity]').each(function(){
    var num = jQuery(this).val();
    var price = jQuery(this).data('price');

    total += parseInt(num)*parseInt(price);
    all += parseInt(num);
  });

  jQuery('.cart-btn span').text('('+all+')');
  jQuery('#sidebar-cart .cart_total').text(numberWithCommas(total)+'VND');
}

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}