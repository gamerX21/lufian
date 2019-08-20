(function($) {
    History.Adapter.bind(window,'statechange',function() {
        if ($(".product-listing").length > 0 || $(".filters-row").length > 0) {
            if(!obj.ajaxClickHandlerState) {
                var n = location.search == "" ? "" : "?" + location.search;
                var url = location.pathname + n;
                obj.getCollectionContent(url);
            }
            obj.ajaxClickHandlerState = false;
        }
    });

    var queryParams = {};
    var obj = {
        init: function() {
            queryParams = this.getQueryParams();
            this.initSidebar();
            this.initToolbar();
            this.currentFilter();
        },
        currentFilter : function(){
            var args = [];
            if(queryParams.constraint){
                $('.clear_all_filter').show();
                args = queryParams.constraint.split('+');
                $.each(args,function(i,e){
                    $('[value="'+e+'"]').prop('checked',true);
                })
            }else{
                $('.clear_all_filter').hide();
            }
            $(".slider").each(function(){
                var datas = $(this).data('range').split(',');
                var start = datas.length/2;
                $.each(args,function(i,e){
                    if(datas.indexOf(args[i]) >= 0){
                        start = datas.indexOf(args[i]);
                    }
                })
                if(args.length > 0){
                    $("#labels-months-output").text(" " + datas[start]);
                    $('.labels-months-output').val(datas[start]).prop( "checked", true );
                }
                $(this).slider({
                    min: 0,
                    max: datas.length-1,
                    value: start
                }).slider("pips", {}).on("slidechange", function(e,ui) {
                    $("#labels-months-output").text(" " + datas[ui.value]);
                    $('.labels-months-output').val(datas[ui.value]).prop( "checked", true ).trigger('change');
                });
            })
        },
        initSidebar: function() {
            obj.initFiltresEvent();
        },
        initToolbar: function() {
            obj.initSortbyState();
            obj.initSortbyEvent();
            obj.initPaginationEvent();
        },
        initFiltresEvent: function() {
            if ($(".sidebar-products-filter").length > 0) {
                var filters = $('.widget input');
                filters.on('change',function(){
                    obj.getValue();
                });
                $('.clear_all').on('click',function(){
                    queryParams.constraint = '';
                    $('.widget input').prop('checked',false);
                    obj.ajaxClick(obj.getAjaxLink(queryParams));
                })
            };
        },
        getValue : function(){
            var checked = $('.widget input:checked');
            var query = [];
            checked.each(function(){
                query.push($(this).val());
            });
            queryParams.constraint = query.join('+');
            obj.ajaxClick(obj.getAjaxLink(queryParams));
        },
        initSortbyState: function() {
            if ($("#sort_by").length > 0) {
                if (queryParams.sort_by) {
                    $('#sort_by').each(function() {
                        $(this).val(queryParams.sort_by);
                    });
                }
            }
        },
        initSortbyEvent: function() {
            if ($("#sort_by").length > 0) {
                $(document).find('#sort_by').change(function(event) {
                    var val = $(this).val();
                    queryParams.sort_by = val;
                    obj.ajaxClick(obj.getAjaxLink(queryParams));
                });
            }
        },
        initPaginationEvent: function() {
            if ($(".pagination-product").length > 0) {
                $(".pagination-product a").unbind().click(function(event) {
                    event.preventDefault();
                    if(!$(this).parent().hasClass("active")) {
                        var value = $(this).attr("href").match(/page=\d+/g);
                        if (!value) return false;
                        queryParams.page = parseInt(value[0].match(/\d+/g));
                        obj.ajaxClick(obj.getAjaxLink(queryParams));
                    }
                });
            };
        },
        getAjaxLink: function(value) {
            var page = obj.getUrlSubcategory('/collections/', location.pathname);
            var pathname = '/collections/' + page;
            value = obj.getDecodedUrl(value);
            return value != "" ? pathname + "?" + value : pathname;
        },
        //AJAX
        ajaxClick: function(url) {
            obj.ajaxClickHandlerState = true;
            History.pushState({
                param: Shopify.queryParams
            }, document.title, url);
            obj.getCollectionContent(url);
        },
        getCollectionContent: function(url) {
            var view = url.match(/view=([^&#]*)/);
            if (!view) {
                url += String(url.indexOf('?') > -1 ?'&':'?') + 'view=ajax';
            }
            else {
                view = view[0];
                url = url.replace(view, view+'ajax');
            }

            var params = {
                type: "get",
                url: url,
                beforeSend: function() {
                    obj.showPreloader();
                },
                success: function(data) {
                    obj.hidePreloader();
                    obj.pageData(data);
                    obj.initPaginationEvent();
                },
                error: function(XMLHttpRequest, textStatus) {
                    obj.hidePreloader();
                    alert("error")
                }
            }
            jQuery.ajax(params);
        },
        //Get and show new content
        pageData: function(data) {
            var pagination = ".woocommerce-pagination";
            var products = ".products";
            $(products).empty();
            $(pagination).empty();
            $(products).html($(data).find(products).html());
            $(pagination).html($(data).find(pagination).html());
            if(queryParams.constraint){
                $('.clear_all_filter').show();
            }else{
                $('.clear_all_filter').hide();
            }
            $('body').trigger('convert.money');
            theme.changeMoney();
            theme.productViewType();

            if($(".spr-badge").length > 0) {
                $.getScript(window.location.protocol + "//productreviews.shopifycdn.com/assets/v4/spr.js");
            }
        },
        //Utils
        showPreloader: function() {
            $(".custom-loader").show();
        },
        hidePreloader: function() {
            $(".custom-loader").hide();
        },
        getUrlSubcategory: function (category, url) {
            var str = url;
            var n = str.indexOf(category);
            if(n < 0)
                return "";
            str = str.slice(n + category.length, str.length);
            var m = str.indexOf("/") > -1 ? str.indexOf("/") : str.length;
            str = str.slice(0, m).toLowerCase();
            return str.replace(name+"=", "");
        },
        getQueryParams: function() {
            var location_path = location.pathname;
            var location_search = location.search;
            var path_search = location_path.split('/');
            path_search.length > 3 ? path_search = 'constraint=' + path_search.pop().replace(/&/g, "") : path_search = location_search.split('?').pop();
            if(path_search == '') return {};
            else return obj.uriToJson(path_search);
        },
        uriToJson: function (value) {
            return JSON.parse('{"' + decodeURI(value.replace(/&/g, "\",\"").replace(/=/g,"\":\"")) + '"}')
        },
        getDecodedUrl: function(value) {
            return decodeURIComponent($.param(value));
        }
    }

    $(document).ready(function() {
        obj.init();
    });

})(jQuery)