function create_html(product,variant) {
    var images = product.images;
    var url = product.handle;
    var name = variant.title != 'Default Title' ? product.title+' '+variant.title : product.title;
    var price = parseFloat(variant.compare_at_price) > parseFloat(variant.price) ? '<del><span class="amount"><span class="money" data-currency-'+shop_currency+'="'+money_format+(variant.compare_at_price)+'" data-currency="'+shop_currency+'">'+money_format+(variant.compare_at_price)+'</span></span></del><ins><span class="amount"><span class="money" data-currency-'+shop_currency+'="'+money_format+(variant.price)+'" data-currency="'+shop_currency+'">'+money_format+(variant.price)+'</span></span></ins>':'<ins><span class="amount"><span class="money" data-currency-'+shop_currency+'="'+money_format+(variant.price)+'" data-currency="'+shop_currency+'">'+money_format+(variant.price)+'</span></span></ins>';
    var sale_0ff = parseFloat(variant.compare_at_price) > parseFloat(variant.price) ? 100 - Math.round((parseFloat(variant.price)*100 / parseFloat(variant.compare_at_price)))+'%':'';
    var html = '' +
        '<div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">'+
        '<div class="product-item style-1 rows-space-40"> ' +
        '<div class="product-inner"> ' +
        '<div class="product-thumb"> ' +
        '<div class="flashs">' +
        '<span class="onsale">'+sale_0ff+'</span>' +
        '</div> ' +
        '<div class="thumb-inner"> ' +
        '<a class="thumb-link" href="#"> ' +
        '<img height="478" width="370" class="lazy" src="'+images[0].src+'" alt=""> ' +
        '</a> ' +
        '</div> ' +
        '<div class="group-button"> ' +
        '<div class="yith-wcwl-add-to-wishlist"> ' +
        '<div class="show" style="display:block"> ' +
        '<a href="#" data-variant-id="'+variant.id+'"  class="add_to_wishlist  wished in-wished">Add to Wishlist</a> ' +
        '</div> ' +
        '<div style="clear:both"></div> ' +
        '</div> ' +
        '<div class="clear"></div> ' +
        '<a rel="nofollow" href="#" data-variant-id="'+variant.id+'" class="button add_to_cart_button add-to-cart">Add to cart</a> ' +
        '</div> ' +
        '</div> ' +
        '<div class="product-innfo"> ' +
        '<h3 class="product-name"> ' +
        '<a href="/products/'+url+'/?variant='+variant.id+'">'+name+'</a> ' +
        '</h3> ' +
        '<span class="price"> ' +
        '<span>' + price+'</span> ' +
        '</span> ' +
        '<div class="star-app"> ' +
        '<span class="shopify-product-reviews-badge rating" data-id="'+product.id+'"></span> ' +
        '</div> ' +
        '</div> ' +
        '</div> ' +
        '</div>' +
        '</div>'+
        '</div>';
    return html;
}
function variant_field() {

}
if ($('.wishlist-container').length > 0) {
    if(customer_id != '') {
        $.ajax({
            url: 'https://farost.net/appshopify/wishlist/wishlist.php',
            type: 'GET',
            data: {
                customer_id: customer_id,
                shop: domain,
                type: 'get'
            },
            dataType: 'json'
        }).always(function (response) {
            var products = response.data;
            var wish = wishlists.split(',');
            var results = [];
            if(products.length > 0) {
                $('.wishlist-container .row').empty();
                $.each(products, function (i, e) {
                    if (results == null) {
                        results.push(products[0]);
                    } else {
                        var isset = true;
                        $.each(results, function (j, p) {
                            if (e.id.toString() == p.id.toString()) {
                                isset = false;
                                return false;
                            }
                        });
                        if (isset) {
                            results.push(e);
                        }
                    }
                });
                products = results;
                for (var i = 0; i <= products.length; i++) {
                    var product = products[i];
                    if (typeof product !== "undefined") {
                        if (product.variants.length > 1) {
                            $.each(product.variants, function (i, e) {
                                $.each(wish, function (j, w) {
                                    if (e.id.toString() == w) {
                                        var html = create_html(product, e);
                                        $('.wishlist-container .row').append(html);
                                        $('.variant-field').append('<input type="hidden" name="id[]" value="'+e.id+'">');
                                    }
                                })
                            });
                        } else {
                            var html = create_html(product, product.variants[0]);
                            $('.wishlist-container .row').append(html);
                            $('.variant-field').append('<input type="hidden" name="id[]" value="'+product.variants[0].id+'">');
                        }
                    }
                }
                $('.form-add-cart').show();
                theme.changeMoney();
                $.getScript(window.location.protocol + "//productreviews.shopifycdn.com/assets/v4/spr.js");
            }
        });
    }
}
$(document).on('click', 'a.add-wishlist', function(e) {
    e.preventDefault();
    var $this = $(this);
    var variant_id = $this.attr('data-variant-id');
    if($(this).hasClass('add-wishlist')){
        $(this).addClass('wished');
    }
    if (customer_id == "") {
        return;
    }
    var data = {
        customer_id: customer_id,
        variant_id: variant_id,
        type: 'update',
        shop: domain
    };
    $.ajax({
        url: 'https://farost.net/appshopify/wishlist/wishlist.php',
        type: 'POST',
        data: data,
        dataType: 'json'
    }).always(function(response) {
        if (response.message == "success") {
            if (response.type == "add") {
                $(document).find('[data-variant-id="'+variant_id+'"]').each(function(){
                    console.log(response);
                })
                if($('.single-product-template').length > 0){
                    $('.yith-wcwl-add-button').removeClass('show').addClass('hide');
                    $('.yith-wcwl-wishlistaddedbrowse').removeClass('hide').addClass('show');
                }
                window.location = 'https://'+window.location.host+'/pages/wishlist';
            }
            if (response.type == "remove") {
                $(document).find('[data-variant-id="'+variant_id+'"]').each(function(){
                    if($(this).hasClass('add-wishlist')){
                        $(this).removeClass('wished');
                        if($('.single-product-template').length > 0){
                            $('.yith-wcwl-add-button').removeClass('hide').addClass('show');
                            $('.yith-wcwl-wishlistaddedbrowse').removeClass('show').addClass('hide');
                        }
                    }
                });
                window.location = 'https://'+window.location.host+'/pages/wishlist';
            }
        }
    });
});
$(document).on('click', 'a.in-wished', function(e) {
    e.preventDefault();
    var $this = $(this);
    var variant_id = $this.attr('data-variant-id');
    $this.parents('.col-xs-12').fadeOut('slow').remove();
    if (customer_id == "") {
        return;
    }
    var data = {
        customer_id: customer_id,
        variant_id: variant_id,
        type: 'update',
        shop: domain
    };
    $.ajax({
        url: 'https://farost.net/appshopify/wishlist/wishlist.php',
        type: 'POST',
        data: data,
        dataType: 'json'
    }).always(function(response) {
        if (response.message == "success") {
            if (response.type == "remove") {
                window.location = 'https://'+window.location.host+'/pages/wishlist';
            }
        }
    });
});
$(document).on('click', 'a.clear-wishlist', function(e) {
    e.preventDefault();
    var that = $(this);
    var data = {
        customer_id: customer_id,
        type: 'delete-all',
        shop: domain
    };
    $.ajax({
        url: 'https://farost.net/appshopify/wishlist/wishlist.php',
        type: 'POST',
        data: data,
        dataType: 'json'
    }).always(function(response) {
        if (response.message == "success") {
            window.location = window.location;
        }
    });
});