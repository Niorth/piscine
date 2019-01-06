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
        setTotalBooking();
        setTotalDelivery()
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
        setTotalBooking();
        setTotalDelivery()
    })

    const order = $("#orderButton");

    order.on('click', () => {
        if ($("#totalFinalBooking").text().split("€")[0] > 0) {
            ajaxInsertResa()
        }
    })

}


function ajaxInsertResa() {
    const bookingTotal = $("#totalFinalBooking").text().split("€")[0];

    $.ajax({
        url: baseURL + 'Reservation/addReservation/' + bookingTotal,
        method: 'POST',
        error: function() {
            alert('Something went wrong');
        },
        success: (data) => {
            ajaxInsertLigneResa(data)
        }
    })
}

function ajaxInsertLigneResa(numResa) {
    const qtys = $("table#booking > tbody >> .qty")

    for (let i = 0; i < qtys.length; i++) {
        const qty = $(qtys[i]).children().val()
        const id = $(qtys[i]).attr("id")

        $.ajax({
            url: baseURL + 'Reservation/addLigneReservation/' + numResa +'/' + i + '/' + qty + '/' + id,
            method: 'POST',
            error: function() {
                alert('Something went wrong');
            },
            success : () => {
                $.ajax({
                    url: baseURL + 'Reservation/addReserver/' + numResa + '/' + qty + '/' + id,
                    method: 'POST',
                    error: function() {
                        alert('Something went wrong');
                    },
                })
            }
        })

    }
}

function setTotalBooking() {
    const prices = $("table#booking > tbody >> .total > strong");
    let total = 0;
    for (let i = 0; i < prices.length; i++) {
        total = total + + $(prices[i]).text().split('€')[0]
    }
    $("#totalFinalBooking").text(total + "€")
}

function setTotalDelivery() {
    const prices = $("table#delivery > tbody >> .total > strong");
    let total = 0;
    for (let i = 0; i < prices.length; i++) {
        total = total + + $(prices[i]).text().split('€')[0]
    }
    console.log($("#totalFinal "))
    $("#totalFinalDelivery").text(total + "€")
}

init();