theme = {
       init : function(){
           theme.searchProduct();
           theme.portfolio();
           theme.countDown();
           theme.zoomImage();
           theme.singleProduct();
           theme.quickView();
           theme.close();
           theme.viewCompare();
           theme.quickChangeColor();
           theme.removeCompareId();
           theme.productViewType();
           theme.modalSletter();
           theme.triggerMoney();
           theme.scroll();
       },
        searchProduct : function(){
            function search(key) {
                var html = '';
                setTimeout(function(){
                    for(var i = 0;i < products.length;i++){
                        if(products[i].title.toUpperCase().search(key.toUpperCase()) >= 0) {
                            if(typeof products[i] != typeof undefined){
                                html += '<li class="product-item style-3 clearfix"><div class="product-inner"><div class="product-thumb thumb"> ' +
                                    '<a href="/products/'+products[i].handle+' "> ' +
                                    '<img width="180" height="233" src="'+products[i].images[0]+'" alt=""> ' +
                                    '</a> ' +
                                    '</div> ' +
                                    '<div class="product-innfo info"> ' +
                                    '<span class="product-title">'+products[i].title+'</span> ' +
                                    '<span class="price">' +
                                    '<del><span class="amount">'+(products[i].compare_at_price != null ?money_format+ products[i].compare_at_price:'')+'</span></del> ' +
                                    '<ins><span class="amount">'+money_format+(products[i].price/100)+'.00</span></ins>' +
                                    '</span> <span class="shopify-product-reviews-badge rating" data-id="'+products[i].id+'" style="font-size: 10px"></span>' +
                                    '<div class="group-button">' +
                                    '<div class="yith-wcwl-add-to-wishlist"> ' +
                                    '<div class="show" style="display:block"> ' +
                                    '<a  '+(customer_id.length > 5 ?'href="#"':'href="/account/login"')+' data-variant-id="'+products[i].variants[0].id+'"  class="add_to_wishlist '+(customer_id.length > 5 ?'add-wishlist':'')+'">Add to Wishlist</a> ' +
                                    '</div> ' +
                                    '<div style="clear:both"></div> ' +
                                    '</div> ' +
                                    '<div class="clear"></div> ' +
                                    '<a href="#" data-variant-id="'+products[i].variants[0].id+'" class="button add_to_cart_button add-to-cart">Add to cart</a> ' +
                                    '</div></div></div></li>';
                            }
                        }
                    }
                    if(html.length > 0) {
                        $('.results ul').html(html);
                        if($(document).find('.spr-badge').length > 0) {
                            $.getScript(window.location.protocol + "//productreviews.shopifycdn.com/assets/v4/spr.js");
                        }
                    }else{
                        $('.results ul').html('<li><a href="#" style="color: #333">Your search for "'+key+'" did not yield any results.</a></li>');
                    }
                },500);

            }
            function focussearch() {
                var html = '';
                for(var i = 0;i < products.length;i++){
                    if(i > 10){
                        break;
                    }
                    var num = Math.round(Math.random() * products.length);
                    if(typeof products[num] != typeof undefined){
                        html += '<li class="product-item style-3 clearfix"><div class="product-inner"><div class="product-thumb thumb"> ' +
                            '<a href="/products/'+products[num].handle+' "> ' +
                            '<img width="180" height="233" src="'+products[num].images[0]+'" alt=""> ' +
                            '</a> ' +
                            '</div> ' +
                            '<div class="product-innfo info"> ' +
                            '<span class="product-title">'+products[num].title+'</span> ' +
                            '<span class="price">' +
                            '<del><span class="amount">'+(products[num].compare_at_price != null ?money_format+ products[num].compare_at_price:'')+'</span></del> ' +
                            '<ins><span class="amount">'+money_format+(products[num].price/100)+'.00</span></ins>' +
                        '</span> <span class="shopify-product-reviews-badge rating" data-id="'+products[num].id+'" style="font-size: 10px"></span>' +
                            '<div class="group-button">' +
                            '<div class="yith-wcwl-add-to-wishlist"> ' +
                            '<div class="show" style="display:block"> ' +
                            '<a  '+(customer_id.length > 5 ?'href="#"':'href="/account/login"')+' data-variant-id="'+products[num].variants[0].id+'"  class="add_to_wishlist '+(customer_id.length > 5 ?'add-wishlist':'')+'">Add to Wishlist</a> ' +
                            '</div> ' +
                            '<div style="clear:both"></div> ' +
                            '</div> ' +
                            '<div class="clear"></div> ' +
                            '<a href="#" data-variant-id="'+products[num].variants[0].id+'" class="button add_to_cart_button add-to-cart">Add to cart</a> ' +
                            '</div></div></div></li>';
                    }
                }
                $('.results ul').html(html);
                if($(document).find('.spr-badge').length > 0) {
                    $.getScript(window.location.protocol + "//productreviews.shopifycdn.com/assets/v4/spr.js");
                }
            }
            $('.ajax-search').on('keyup',function(){
                var key = $(this).val();
                if(key.length == 0 || key == ''){
                    focussearch();
                }else{
                    search(key);
                }
            });
            $('.ajax-search').on('focusin',function(){
                $('.results').addClass('active');
                $('.main-content').addClass('active');
                var key = $(this).val();
                if(key.length == 0 || key == ''){
                    focussearch();
                }else{
                    search(key);
                }
            }).on('focusout',function(){
                $('.results').removeClass('active');
            });
        },
       freeStyle : function(){
           if($('.free-style').length > 0){
               var x = 0;
               $('.free-style').each(function(i,e){
                   if(x == 1 || x == 3){
                       $(this).addClass('col-sm-8');
                   }else{
                       $(this).addClass('col-sm-4');
                   }
                   if(x == 5){
                       x = 0;
                   }else{
                       x++;
                   }
               })
           }
       },
       portfolio : function(){
           theme.freeStyle();
           var portfolio = $('.isotope-portfolio');
           portfolio.imagesLoaded(function(){
               portfolio.isotope({filter:'*'});
           });
           $('.isotope-filter').on('click','li',function(){
               var active = $(this).find('a').data('filter');
               $(this).siblings('li').removeClass('active');
               $(this).addClass('active');
               portfolio.isotope({filter:active});
           });
           $('.load-more-port').on('click',function(e){
               e.preventDefault();
               var url = $(this).attr('href');
               $.ajax({
                   method:"GET",
                   url:url,
                   error : function(response){

                   },
                   success : function(response){
                       var response = $(response);
                       var articles = response.find('.isotope-portfolio').html();
                       var load = response.find('.load-more-port').attr('href');
                       portfolio.append(articles).data('isotope',false);
                       theme.freeStyle();
                       portfolio.imagesLoaded(function(){
                           portfolio.isotope();
                       })
                       if(typeof load != typeof undefined && load.length > 0){
                           $('.load-more-port').attr('href',load);
                           console.log(load);
                       }else{
                           $('.load-more-port').hide()
                       }
                   }
               })
           });
           var list = $('.data-site .list').html();
           var client = $('.data-site .client').html();
           var date = $('.data-site .date').html();
           var category = $('.data-site .category').html();
           var designer = $('.data-site .designer').html();
           var link = $('.data-site .link').html();
           var content = $('.data-site .content').html();
           $('.content-portfolio').html(content);
           $('.data-site').remove();
           $('.client-data').html(client);
           $('.date-data').html(date);
           $('.category-data').html(category);
           $('.designer-data').html(designer);
           $('.link-data').attr('href',link);

           $('.list-image-portfolio').html(list).owlCarousel({
               loop:false,
               nav:false,
               dots:true,
               items:1
           })

       },
       countDown : function(){
           var elem = $('.deal-time');
           var timeout = elem.data('timeout');
           var end = new Date(timeout);
           var _second = 1000;
           var _minute = _second * 60;
           var _hour = _minute * 60;
           var _day = _hour * 24;
           var timer = setInterval(showRemaining, 1000);
           function showRemaining() {
               var now = new Date();
               var distance = end - now;
               var elem = $('.countdown-amount');
               if (distance > 0) {
                   var days = Math.floor(distance / _day);
                   var hours = Math.floor((distance % _day) / _hour);
                   var minutes = Math.floor((distance % _hour) / _minute);
                   var seconds = Math.floor((distance % _minute) / _second);
                   elem.find('.day').html(days);
                   elem.find('.hour').html(hours);
                   elem.find('.minute').html(minutes);
                   elem.find('.second').html(seconds);

                   return;
               }
               clearInterval(timer);
           }
       },
       zoomImage : function(){
           $('#quick-view').on('click','.item-variant-image>a',function(){
                $('#image-no-zoom').attr('src',$(this).data('image'));
           })
           $("#img_01").elevateZoom({gallery:'gal1', cursor: 'crosshair', galleryActiveClass: 'active', imageCrossfade: true,zoomType:'inner'});
           //pass the images to Magnific Popup
           $(document).find("#img_01").bind("click", function(e) {
               var $this = $(this);
               var items = [];
               $(document).find('#gal1 a').each(function() {
                   var src = $(this).attr('data-zoom-image');
                   items.push( {
                       src: src
                   });
               });
               $this.magnificPopup({
                   items:items,
                   gallery: {
                       enabled: true, // set to true to enable gallery
                       preload: [0,2],
                       navigateByImgClick: true,
                       arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>', // markup of an arrow button
                       tPrev: 'Previous (Left arrow key)', // title for left button
                       tNext: 'Next (Right arrow key)', // title for right button
                       tCounter: '<span class="mfp-counter">%curr% of %total%</span>' // markup of counter
                   },
                   image: {
                       markup: '<div class="mfp-figure">'+
                       '<div class="mfp-close"></div>'+
                       '<div class="mfp-img"></div>'+
                       '<div class="mfp-bottom-bar">'+
                       '<div class="mfp-title"></div>'+
                       '<div class="mfp-counter"></div>'+
                       '</div>'+
                       '</div>', // Popup HTML markup. `.mfp-img` div will be replaced with img tag, `.mfp-close` by close button
                       cursor: 'mfp-zoom-out-cur', // Class that adds zoom cursor, will be added to body. Set to null to disable zoom out cursor.
                       verticalFit: true, // Fits image in area vertically
                       tError: '<a href="%url%">The image</a> could not be loaded.' // Error message
                   },
                   type: 'image' // this is default type
               });
           });
       },
       quickView : function(){
           $(document).on('click','.thumb-inner img',function(){
               var id = $(this).data('id');
               if(id){
                   var html = $('.content-quick-view-'+id).html();
                   var product_name = $('.content-quick-view-'+id).data('name');
                   $('#quick-view').find('.append').html(html);
                   $('#quick-view').modal('show');
                   $('#quick-view').find('.thumbnails_carousel').addClass('owl-carousel').owlCarousel({
                       nav:true,
                       loop:false,
                       margin:20,
                       navText:['<span class="flaticon-arrows-4"></span>','<span class="flaticon-arrows-3"></span>'],
                       responsive: {
                           0: {
                               items: 1
                           },
                           768: {
                               items: 2
                           },
                           992: {
                               items: 3
                           },
                           1200: {
                               items: 4
                           }
                       }
                   });
                   theme.actionProduct(product_name,false);
                   theme.changeMoney();
               }
           })
       },
       singleProduct : function(){
           if(typeof product_name != typeof undefined){
               theme.actionProduct(product_name,true);
           }
           if($('.single-product-template').length > 0){
               function initSlide (slide){
                   slide.slick({
                       slidesToShow: 4,
                       infinite:false,
                       arrows:true,
                       dots:false,
                       slidesToScroll: 1,
                       vertical:true,
                       verticalSwiping:true,
                       prevArrow:'<button class="prev"><span class="flaticon-up-arrow"></span></button>',
                       nextArrow:'<button class="next"><span class="flaticon-down-arrow"></span></button>'
                   });
               }
               var slide = $('.slick-small-image');
               initSlide(slide);
               $(window).on('resize',function(){
                   slide.slick('destroy');
                   initSlide(slide);
               })
           }
       },
       actionProduct : function(product_name,push){
           var single_product = $(document).find('.single-product-template');
           var data = [];
           $.ajax({
               type : "GET",
               url :window.location.protocol+'/products/'+product_name+'.json',
               async : false,
               success : function(response){
                   data = response.product;
               }
           });
           var variants = data.variants;
           var select = '.product-variants';
           var inputs = $(document).find(select+' input');
           $(document).find('.image-variant').on('click',function(){
               var id = $(this).attr('id');
               for(var i = 0 ; i < variants.length;i++){
                   if(variants[i].image_id != null && id == variants[i].image_id){
                       theme.handleSelectVariant(single_product,variants[i],push);
                       console.log(variants[i]);
                       $('[value="'+variants[i].option1+'"]').prop('checked',true);
                       $('[value="'+variants[i].option2+'"]').prop('checked',true);
                       $('[value="'+variants[i].option3+'"]').prop('checked',true);
                       break;
                   }
               }
           });
           inputs.on('change',function () {
               theme.selectVariant(single_product, select, variants,push);
           });
       },
       close : function(){
           $('.close-aside').on('click',function(){
               $('.aside-shop').removeClass('active');
           })
       },
       viewCompare : function(){
           $(document).on('click','.compare',function(e){
               e.preventDefault();
               var id = $(this).data('id').toString();
               var html = $(document).find('#compare-'+id).html();
               html = theme.getCompareData(id,html);
               theme.showModalCompare(html);
               theme.actionCompareId('add',id);
           });
       },
       getCompareData : function(id,html){
           var arrs = getCookie('_compare_list');
           if(arrs != false){
               arrs = arrs.split(',');
               $.each(arrs,function(i,e){
                   console.log(e);
                   if(e != id){
                       var data_html = $(document).find('#compare-' + e).html();
                       if(data_html != undefined){
                           html += data_html;
                       }
                   }
               });
               return html;
           }
           return html;
       },
       actionCompareId : function(action,id){
           var arrs = getCookie('_compare_list');
           if(action == 'add'){
               if(arrs != false) {
                   arrs = arrs.split(',');
                   if (jQuery.inArray(id, arrs) < 0) {
                       arrs.push(id);
                       setCookie('_compare_list', arrs, 60);
                   }
               }else{
                   setCookie('_compare_list',id,60);
               }
           }else{
               arrs = arrs.split(',');
               var index = arrs.indexOf(id);
               console.log(index);
               if (index > -1) {
                   arrs.splice(index, 1);
                   setCookie('_compare_list',arrs,60);
               }
           }
       },
       showModalCompare : function(html){
           var $modalCompare = $('#modal-compare');
           $('.append-owl').removeClass('owl-loaded');
           $('.append-owl').trigger('destroy.owl.carousel');
           $('.append-owl').html(html).show().owlCarousel({
               nav:false,
               responsiveClass: true,
               dots:false,
               responsive: {
                   0: {
                       items: 1
                   },
                   768: {
                       items: 2
                   },
                   992: {
                       items: 3
                   },
                   1200: {
                       items: 4
                   }
               }
           });
           $modalCompare.modal('show');
           $('#quick-view').modal('hide');
           $('.close-compare').on('click',function(e){
               e.preventDefault();
               $($modalCompare).modal('hide');
           })
       },
       removeCompareId : function(){
           $(document).on('click','.remove-from-compare',function(e){
               e.preventDefault();
               var id = $(this).data('id').toString();
               var html = '';
               html = theme.getCompareData(id,html);
               theme.showModalCompare(html);
               theme.actionCompareId('remove',id);
           });
       },
       quickChangeColor : function(){
           $(document).on('click','.variant-color',function(e){
               e.preventDefault();
               var image = $(this).data('image');
               var variant_id = $(this).data('variant-id');
               var price = $(this).data('price');
               var compare_price = $(this).data('compare-price');

               var parent = $(this).parents('.product-inner');

               parent.find('.lazy').attr('src',image);
               parent.find('.add_to_wishlist').attr('data-variant-id',variant_id);
               parent.find('.add_to_cart_button').attr('data-variant-id',variant_id);
               parent.find('.price>span').html(compare_price+price);
               $('body').trigger('convert.money');
               theme.changeMoney();
               theme.wishlist(parent,variant_id);
           })
       },
       triggerMoney : function(){
           setTimeout(function(){
               var cur = $('.current-money').find('span').data('currency');
               $('.'+cur).addClass('active').siblings('li').removeClass('active');
               $('.currency a').html(cur);
           },1000);
           $(document).on('click','.filter-type',function () {
               theme.changeMoney();
           });
           $(document).on('click','.switcher-price',function(){
               var currency = $(this).find('a').data('currency');
               $(this).siblings('li').removeClass('active');
               $(this).addClass('active');
               $('.currency-picker').val(currency).trigger('change');
           })
       },
       changeMoney : function(){
           var current = $('.currency-picker').val();
           $('.currency-picker').val('USD').trigger('change');
           $('.currency-picker').val(current).trigger('change');
       },
       removeCartItem : function(){
           $('.remove-item').on('click',function(e){
               var del = confirm('Are you sure, you want to delete this item ?');
               if(!del){
                   e.preventDefault();
                   return;
               }
           })
       },
       productViewType : function(){
           var type = getCookie('_view_type');
           $('.product-view-type').removeClass('active');
           if(type != false){
               $('.products .style-1').removeClass('grid').addClass(type);
               $('[data-type="'+type+'"]').addClass('active');
           }else{
               $('.products .style-1').addClass('grid');
               $('[data-type="grid"]').addClass('active');
           }
           $(document).on('click','.product-view-type',function(e){
               e.preventDefault();
               var type = $(this).data('type');
               $(this).siblings('.product-view-type').removeClass('active');
               $(this).addClass('active');
               if(type == 'list'){
                   $('.products .style-1').addClass(type).removeClass('grid');
               }else{
                   $('.products .style-1').addClass(type).removeClass('list');
               }
               setCookie('_view_type',type,60);
           })
       },
       selectVariant : function(single_product,select,variants,push){
           var option = [];
           var variant = [];
           var checked = $(select + " input:checked");
           checked.each(function () {
               option.push($(this).val());
           })
           option = option.join(',').toLowerCase().replace(/[^A-Z0-9]+/ig, "");
           for (var i in variants) {
               var vri = [variants[i].option1,variants[i].option2,variants[i].option3].join(',').toLowerCase().replace(/[^A-Z0-9]+/ig, "");
               if (vri === option) {
                   variant = variants[i];
                   break;
               }
           }
           theme.handleSelectVariant(single_product,variant,push);
       },
       handleSelectVariant : function(container,variant,state){
           if(variant) {
               var variant_id = $(container).find('[name="id"]');
               var price = $(container).find('.price');
               var wish = $(container).find('.add_to_wishlist');
               $(wish).attr('data-variant-id', variant.id);
               $(variant_id).val(variant.id);
               if(state == true){
                   window.history.pushState({}, '', '?variant=' + variant.id);
               }
               if (parseFloat(variant.compare_at_price) > parseFloat(variant.price)) {
                   $(price).find('del .amount').html('<span class="money" data-currency-' + shop_currency + '="' + money_format + (variant.compare_at_price)  + '">' + money_format + (variant.compare_at_price) + '</span>').show();
                   $(price).find('ins .amount').html('<span class="money" data-currency-' + shop_currency + '="' + money_format + (variant.price) + '">' + money_format + (variant.price) + '</span>');
               } else {
                   $(price).find('del').hide();
                   $(price).find('ins .amount').html('<span class="money" data-currency-' + shop_currency + '="' + money_format + (variant.price) + '">' + money_format + (variant.price) + '</span>');
               }

               if (variant.image_id != null) {
                   var id = variant.image_id;
                   $(container).find('[data-id="'+id+'"]').trigger('click');
               }
               theme.wishlist(container, variant.id);
               theme.changeMoney();
           }
       },
       wishlist : function(main,variant_id){
           if(customer_id != undefined){
               var wished = true;
               if(wishlists.indexOf(variant_id.toString()) < 0){
                   wished = false;
               }
               if(wished){
                   $(main).find('.add-wishlist').addClass('wished');
                   if($('.single-product-template').length > 0){
                       $('.yith-wcwl-add-button').removeClass('show').addClass('hide');
                       $('.yith-wcwl-wishlistaddedbrowse').removeClass('hide').addClass('show');
                   }
               }else{
                   $(main).find('.add-wishlist').removeClass('wished');
                   if($('.single-product-template').length > 0){
                       $('.yith-wcwl-add-button').removeClass('hide').addClass('show');
                       $('.yith-wcwl-wishlistaddedbrowse').removeClass('show').addClass('hide');
                   }
               }
           }
       },
       modalSletter : function(){
           var newsletter = $("#popup-sletter");
           //setCookie('showModal','false',60);
           var show = newsletter.data('popup');
           if(show != "none"){
               var state = getCookie('showModal');
               if (state == 'false' || state == false) {
                   setTimeout(function(){
                       newsletter.modal('show');
                   },10000);
               }
           }
           $('#showpopup').change(function(){
               var state = getCookie('showModal');
               if(state == 'false' || state == false){
                   setCookie('showModal','true',60);
               }else{
                   setCookie('showModal','false',60);
               }
           });
       },
       scroll : function(){
           $(window).on('scroll',function(){
               if(window.innerWidth >= 992) {
                   if($('.main-header').length > 0 && $('.top-header').length > 0 && $('.main-header').find('.main-menu').length == 0 ){
                       var h = parseInt($('.top-header').css('height').replace('px','')) + parseInt($('.main-header').css('height').replace('px',''));
                       console.log(h+'-2');
                   }else if($('.top-header').length > 0){
                       var h = parseInt($('.top-header').css('height').replace('px',''));
                       console.log(h+'-1');
                   }else if($('.main-header').length > 0){
                       var h = parseInt($('.main-header').css('height').replace('px',''));
                       console.log(h+'-0');
                   }else{
                       var h = 0;
                   }
                   if (window.pageYOffset > h) {
                       $('.header-sticky').addClass('is-sticky');
                   } else {
                       $('.header-sticky').removeClass('is-sticky');
                   }
               }
               if($('.style9').length > 0){

                   if (window.pageYOffset > 0) {
                       $('.header-container').addClass("sticky-bg");
                   } else {
                       $('.header-container').removeClass("sticky-bg");
                   }
               }
           })
           // if($('.style9').length > 0) {
           //     var h = $('.header-container').height();
           //     $('#header').css('height', h + 'px');
           //     $(window).on('scroll', function () {
           //         h = $('.header-container').height();
           //         $('#header').css('height', h + 'px');
           //         if (window.pageYOffset > 0) {
           //             $('.header-container').addClass('fixed');
           //         } else {
           //             $('.header-container').removeClass('fixed');
           //         }
           //     })
           // }
       }
   }
   theme.init();
var social = {
    datas : {"links":[],"images":[]},
    getInsImage : function(number){
        $.ajax({
            method: 'GET',
            url : 'https://api.instagram.com/v1/users/self/media/recent?access_token=' + access_token + '&count='+number+'&callback=?',
            error: function(response){
                console.log(response.message);
            },
            success: function (response) {
                if(response.meta.code == 200){
                    $.each(response.data,function(i,e){
                        social.datas.links.push(e.link);
                        social.datas.images.push(e.images.standard_resolution.url);
                    });
                }
            },
            dataType: 'jsonp'
        });
    }
}
Team = {
    init : function(){
        $('.team-carousel').owlCarousel({
            nav:true,
            dots:true,
            loop:false,
            margin:30,
            responsive:{
                0:{
                    items:1
                },
                768:{
                    items:2
                },
                992:{
                    items:3
                },
                1200:{
                    items:3
                }
            }
        })
    }
};
Team.init();
FeaturedProduct = {
    init:function(){
        $('.featured-product').each(function(){
            var id = $(this).data('id');
            FeaturedProduct.build(id);
        })
    },
    build: function(id){
        var slide = $('#featured-product-'+id);
        var options = slide.data('options');
        slide.owlCarousel({
            autoplay:options.autoplay,
            nav:true,
            loop:true,
            navText:['<span class="flaticon-arrows-4"></span>','<span class="flaticon-arrows-3"></span>'],
            autoplayTimeout:options.autoplayTimeout,
            margin:options.margin,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    }
};
FeaturedProduct.init();
SpecialProduct = {
   init:function(){
       $('.special-product').each(function(){
           var id = $(this).data('id');
           SpecialProduct.build(id);
       })
   },
   build: function(id){
       var slide = $('#special-product-'+id);
       var options = slide.data('options');
       slide.owlCarousel({
           autoplay:options.autoplay,
           nav:false,
           loop:true,
           autoplayTimeout:options.autoplayTimeout,
           margin:options.margin,
           responsive: {
               0: {
                   items: 1
               },
               480:{
                   items:2
               },
               768: {
                   items: 2
               },
               992: {
                   items: 2
               },
               1200: {
                   items: 2
               }
           }
       });
   }
};
SpecialProduct.init();
ProductList1 = {
    init:function(){
        $('.product-list-1').each(function(){
            var id = $(this).data('id');
            ProductList1.build(id);
        })
    },
    build:function(id){
        var slide = $('.product-list-1-'+id);
        var options = slide.data('options');
        slide.owlCarousel({
            autoplay:options.autoplay,
            nav:true,
            loop:true,
            navText:['<span class="flaticon-arrows-4"></span>','<span class="flaticon-arrows-3"></span>'],
            autoplayTimeout:options.autoplayTimeout,
            margin:options.margin,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: options.max_item
                },
                1370: {
                    items: (options.max_item + 1)
                }
            }
        })
    }
};
ProductList1.init();
BlogPost = {
    init:function(){
        $('.owl-blog-post').each(function(){
            var id = $(this).data('id');
            BlogPost.build(id);
        })
    },
    build:function(id){
        var slide = $('#blog-post-'+id);
        var options = slide.data('options');
        slide.owlCarousel({
            autoplay:options.autoplay,
            nav:false,
            loop:true,
            autoplayTimeout:options.autoplayTimeout,
            margin:options.margin,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            }
        })
    }
};
BlogPost.init();
Instagram = {
    init:function(){
        $('.instagram').each(function(){
            var $this = $(this);
            var id = $this.data('id');
            Instagram.build(id);
        })
    },
    build:function(id){
        var slide = $('#instagram-'+id);
        var number = slide.data('number');
        var options = slide.data('options');
        var html = '';
        var get = setInterval(function(){
            if(social.datas.images.length > 0){
                clearInterval(get);
                for(var i = 0 ; i< social.datas.images.length;i++){
                    html += '<div class="item"> ' +
                        '<a target="_blank" href="'+social.datas.links[i]+'"><img width="320" height="320" src="'+social.datas.images[i]+'" alt="Instagram"></a> ' +
                        '</div>';
                }
                slide.html(html).addClass('owl-carousel').owlCarousel({
                    autoplay:options.autoplay,
                    nav:true,
                    loop:true,
                    navText:['<span class="flaticon-arrows-4"></span>','<span class="flaticon-arrows-3"></span>'],
                    autoplayTimeout:options.autoplayTimeout,
                    margin:options.margin,
                    responsive: {
                        0: {
                            items: 2
                        },
                        480: {
                            items: 3
                        },
                        768: {
                            items: 4
                        },
                        992: {
                            items: 6
                        },
                        1200: {
                            items: 9
                        }
                    }
                });
            }else{
                social.getInsImage(number);
            }
        },500);
    }
};
Instagram.init();
Brands = {
    init:function(){
        $('.brands-slide').each(function(){
            var id = $(this).data('id');
            Brands.build(id);
        })
    },
    build:function(id){
        var slide = $('#brands-slide-'+id);
        var options = slide.data('options');
        slide.owlCarousel({
            autoplay:options.autoplay,
            nav:false,
            loop:false,
            navText:['<span class="flaticon-arrows-4"></span>','<span class="flaticon-arrows-3"></span>'],
            autoplayTimeout:options.autoplayTimeout,
            margin:options.margin,
            responsive: {
                0: {
                    items: 2
                },
                480: {
                    items: 3
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200: {
                    items: 5
                }
            }
        })
    }
};
Brands.init();
SideBarBlog = {
    init : function(){
        var html = '';
        var insta_sidebar = $('.linda-instagram-sidebar');
        if(insta_sidebar.length > 0) {
            var get = setInterval(function () {
                if (social.datas.images.length > 0) {
                    clearInterval(get);
                    for (var i = 0; i < 6; i++) {
                        html += '<div class="item"> ' +
                            '<a target="_blank" href="' + social.datas.links[i] + '"><img width="320" height="320" src="' + social.datas.images[i] + '" alt="Instagram"></a> ' +
                            '</div>';
                    }
                    insta_sidebar.html(html);
                } else {
                    social.getInsImage();
                }
            }, 500);
        }
    }
};
SideBarBlog.init();
CollectionWithBanner = {
   init:function(){
       $('.collection-with-banner').each(function(){
           var id = $(this).data('id');
           CollectionWithBanner.build(id);
       })
   },
   build: function(id){
       var slide = $('#collection-with-banner-'+id);
       var options = slide.data('options');
       slide.owlCarousel({
           autoplay:options.autoplay,
           nav:true,
           loop:true,
           navText:['<span class="flaticon-arrows-4"></span>','<span class="flaticon-arrows-3"></span>'],
           autoplayTimeout:options.autoplayTimeout,
           margin:options.margin,
           responsive: {
               0: {
                   items: 1
               },
               768: {
                   items: 1
               },
               992: {
                   items: 2
               },
               1200: {
                   items: 3
               },
               1920: {
                   items: 4
               }
           }
       });
   }
};
CollectionWithBanner.init();
BoxBanner3 = {
   init:function(){
       $('.box-banner-3').each(function(){
           var id = $(this).data('id');
           BoxBanner3.build(id);
       })
   },
   build: function(id){
       var slide = $('#box-banner-3-'+id);
       var options = slide.data('options');
       slide.owlCarousel({
           autoplay:options.autoplay,
           nav:false,
           loop:false,
           navText:['<span class="flaticon-arrows-4"></span>','<span class="flaticon-arrows-3"></span>'],
           autoplayTimeout:options.autoplayTimeout,
           margin:options.margin,
           responsive: {
               0: {
                   items: 1
               },
               768: {
                   items: 2
               },
               992: {
                   items: 3
               },
               1200: {
                   items: 3
               }
           }
       });
   }
};
BoxBanner3.init();
$(document).on('shopify:section:load', function (e) {
    var data = e.target.attributes;
    var array;
    for(var i in data){
        if(data[i].nodeValue.indexOf("}") > 0){
            array = data[i].nodeValue;
            break;
        }
    }
    console.log(JSON.parse(array));
    var section = JSON.parse(array);
    switch (section.type){
        case 'revolution-slider':
            build_revolution(section.id,6000);
            break;
        case 'carousel-slider':
            build_carousel(section.id);
            break;
        case 'revolution-collection':
            build_revolution_collection(section.id,6000);
            break;
        case 'revolution-with-banner':
            build_revolution_banner(section.id,6000);
            break;
        case 'revolution-with-sidebar':
            build_revolution_sidebar(section.id,6000);
            break;
        case 'product-list':
        case 'collection-with-sidebar':
            ProductList1.build(section.id);
            break;
        case 'featured-product':
            FeaturedProduct.build(section.id);
            break;
        case 'blog-post':
            BlogPost.build(section.id);
            break;
        case 'instagram':
            Instagram.build(section.id);
            break;
        case 'brand-slide':
            Brands.build(section.id);
            break;
        case 'special-product':
            SpecialProduct.build(section.id);
            break;
        case 'team-about-us':
            Team.init();
            break;
        case 'collection-with-banner':
            CollectionWithBanner.build(section.id);
            break;
        case 'box-banner-3':
            BoxBanner3.build(section.id);
            break;
    }
})