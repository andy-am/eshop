var app = {};

$(document).on('click', '.removeItemFromBasket', function(e) {
    e.preventDefault();
    var $id = $(this).attr('data-id');

    $.ajax({
        method: "POST",
        url: "/api/product/removeItemFromBasket/"+$id,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}

    }).done(function (result) {
        $('.basket-items').html(result.html)
    });

});