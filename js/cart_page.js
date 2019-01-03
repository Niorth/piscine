import {removeProductById, changeQtyHeader} from "./cart";

function init() {
    const closeButtons = $('.main-btn');

    closeButtons.on('click', (event) => {

        const productId = event.currentTarget.id;

        $.ajax({
            url: baseURL + 'Cart/removeProductFromCart/' + productId,
            method: 'POST',
            error: function() {
                alert('Something went wrong');
            },
        });
        $(event.currentTarget).parent().parent().remove();

        removeProductById(productId);
        setTotal()
    });

    const qtys = $(".input#qty");

    qtys.change((event) => {
        $.ajax({
            url: baseURL + 'Cart/changeQty/' + $(event.currentTarget).parent().attr('id') + '/' + $(event.currentTarget).val(),
            method: 'POST',
            error: function() {
                alert('Something went wrong');
            },
        });
        changeQtyHeader($(event.currentTarget).parent().attr('id'), $(event.currentTarget).val())
        setSubTotal($(event.currentTarget).parent().attr('id'))
        setTotal()
    })
}

function setTotal() {
    const $total = $("#totalFinal");
    const $totalHeader = $("#total");
    $total.text($totalHeader.text())
}

function setSubTotal(id) {
    const price = $('tr#' + id + '> .price').text().split('€')[0];
    const qty = $('tr#' + id + '> .qty > #qty').val();
    $('tr#' + id + '> .total > strong').text(price * qty + '€');
}
init();