jQuery(document).ready(function($) {
    function update_cart(items) {
        var result = {};
        $.ajax({
            url: '/cart/update.js',
            method: 'POST',
            dataType: 'json',
            data: {
                updates: items
            },
            async: false
        }).always(function(response) {
            result = response;
        });
        return result;
    }

    function change_cart(data) {
        var result = {};
        $.ajax({
            url: '/cart/change.js',
            method: 'POST',
            dataType: 'json',
            data: data,
            async: false
        }).always(function(response) {
            result = response;
        });
        return result;
    }

    function remove_cart(items) {
        var result = {};
        $.ajax({
            url: '/cart/update.js',
            method: 'POST',
            dataType: 'json',
            data: {
                updates: items
            },
            async: false
        }).always(function(response) {
            result = response;
        });
        return result;
    }

    function get_cart() {
        var result = {};
        $.ajax({
            url: '/cart.js',
            dataType: 'json',
            async: false
        }).always(function(response) {
            result = response;
        });
        return result;
    }

    function add_cart(id, quantity) {
        var result = {};
        $.ajax({
            url: '/cart/add.js',
            method: 'POST',
            dataType: 'json',
            data: {
                id: id,
                quantity: quantity,
            },
            async: false
        }).done(function(response){
            result = response;
        }).fail(function(response){
            result = response;
        }).always(function(response) {
            result = response;
        });
        return result;
    }

    function update_cart_html(items) {
        var list = '';
        if (items.items.length > 0){
            $('.badge-line').html(items.items.length);
        }else{
            $('.badge-line').html('0');
        }
        if (items.item_count > 0) {
            for (var i in items.items) {
                list += '<div class="shop-item clearfix">' +
                    '<a class="left image-link" href="' + items.items[i].url + '">' +
                    '<img  src="' + items.items[i].image + '"  alt="' + items.items[i].title + '"> ' +
                    '</a> ' +
                    '<div class="left line-info"> ' +
                    '<a href="' + items.items[i].url + '" class="product-title">' + items.items[i].title + '</a> ' +
                    '<span class="amount money" data-currency-'+shop_currency+'="'+money_format+(items.items[i].price/100)+'">' +money_format+(items.items[i].price/100)+'</span> ' +
                    '<span class="quantity">QTY: ' + items.items[i].quantity + '</span> ' +
                    '<a class="remove-product" href="/cart/change?line=' + (parseInt(i) + 1) + '&amp;quantity=0" title="Remove this item"> ' +
                    '<i class="fa fa-trash"></i> ' +
                    '</a>' +
                    '</div> ' +
                    '</div>';//show_price(items.total_price/100)
            }
            $('.total-price').html('<span class="money" data-currency-'+shop_currency+'="'+money_format+(items.total_price/100)+'">'+money_format+(items.total_price/100)+'</span>');
        }else{
            $('.total-price').html('0');
            list +="<div class='shop-item'>No product in your cart!</div>";
        }
        return list;
    }
    function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
        if (colorName === null || colorName === '') { colorName = 'bg-black'; }
        if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
        if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
        if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
        var allowDismiss = true;

        $.notify({
                message: text
            },
            {
                type: colorName,
                allow_dismiss: allowDismiss,
                newest_on_top: true,
                timer: 100000,
                placement: {
                    from: placementFrom,
                    align: placementAlign
                },
                animate: {
                    enter: animateEnter,
                    exit: animateExit
                },
                template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="/cart" target="{4}" data-notify="url" class="alert-link">Go to cart</a>' +
                '</div>'
            });
    }
    $(document).on('click', '.add-to-cart', function(e) {
        e.preventDefault();
        var variant = $(this).data('variant-id');
        if (variant > 0) {
            var item = add_cart(variant, 1);
            if (typeof item.id !== 'undefined') {
                var items = get_cart();
                console.log(items);
                if (typeof items.token !== 'undefined') {
                    var str = update_cart_html(items);
                    $('.list-product').html(str);
                    $('.aside-shop').addClass('active');
                    theme.changeMoney();
                }
            }else{
                alert(JSON.parse(item.responseText).description);
            }
        }else{
            console.log(variant.length);
        }
    });
    $(document).on('click', '.quick-add-to-cart', function(e) {
        e.preventDefault();
        var data = $(this).parents('.quick-form-product').serializeArray();
        var quantity = data[0].value;
        var variant = data[1].value;
        console.log(data);
        if (variant > 0) {
            var item = add_cart(variant, quantity);
            if (typeof item.id !== 'undefined') {
                var items = get_cart();
                console.log(items);
                if (typeof items.token !== 'undefined') {
                    var str = update_cart_html(items);
                    $('.list-product').html(str);
                    $('.aside-shop').addClass('active');
                }
            }else{
                alert(JSON.parse(item.responseText).description);
            }
        }else{
            console.log(variant.length);
        }
    });
    $(document).on('click', '.single-product-add', function(e) {
        e.preventDefault();
        var form = $(this).closest('form');
        var url = form.attr('action');
        var variant_id = form.find('input[name="id"]').val();
        var quantity = 1;
        if (form.find('input[name="quantity"]').length > 0) quantity = form.find('input[name="quantity"]').val();
        if (variant_id.length > 0) {
            var item = add_cart(variant_id, quantity);
            if (typeof item.id !== 'undefined') {
                var items = get_cart();
                if (typeof items.token !== 'undefined') {
                    var str = update_cart_html(items);
                    $('.list-product').html(str);
                    $('.aside-shop').addClass('active');
                    theme.changeMoney();
                }
            }else{
                alert(JSON.parse(item.responseText).description);
            }
        }
    });
    $(document).on('click', '.remove-product', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var href_array = href.split('?');
        var search = href_array[1];
        var search_arr = search.split("&");
        var data = {};
        for (var i in search_arr) {
            var item = search_arr[i].split('=');
            data[item[0]] = item[1];
        }
        var items = change_cart(data);
        if (typeof items.token !== 'undefined') {
            var str = update_cart_html(items);
            $('.list-product').html(str);
        }
    });
});