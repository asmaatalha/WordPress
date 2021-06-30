// JavaScript Document

jQuery( document ).ready( function($){
    var update_wishlist_count = function() {
        $.ajax({
            beforeSend: function () {

            },
            complete  : function () {

            },
            data      : {
                action: 'update_wishlist_count'
            },
            success   : function (data) {
				$('.wishlist-contents-count').html( data );
				
            },

            url: yith_wcwl_l10n.ajax_url
        });
    };

    $('body').on( 'added_to_wishlist removed_from_wishlist', update_wishlist_count );
} );