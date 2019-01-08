import {removeProductById, changeQtyHeader} from "./cart";

function init() {
    const closeButtons = $('.closeButton');

    closeButtons.on('click', (event) => {

        const productId = event.currentTarget.id;

        $.ajax({
            url: baseURL + 'Cart/removeProductFromCart/' + productId,
            method: 'GET',
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
            method: 'GET',
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
        const total = $("#totalFinalDelivery").text().split("€")[0] + $("#totalFinalBooking").text().split("€")[0]

        if($("#remise").is(':checked')) {
            usePoints()
        }

        if (total > 100) {
            addPoints(Math.round(total/10))
        }

        if ($("#totalFinalBooking").text().split("€")[0] > 0) {
            ajaxInsertResa()
        }

        if ($("#totalFinalDelivery").text().split("€")[0] > 0) {
            ajaxInsertOrder()
        }


        setTimeout(function(){
            if ($("#totalFinalDelivery").text().split("€")[0] > 0 || $("#totalFinalBooking").text().split("€")[0] > 0) {
                resetCart()
            }
        }, 1000);

    })

}


function ajaxInsertResa() {
    let bookingTotal = $("#totalFinalBooking").text().split("€")[0];
    if($("#remise").is(':checked')) {
        bookingTotal = Math.round((bookingTotal * 0.9)*100)/100
    }

    $.ajax({
        url: baseURL + 'Reservation/addReservation/' + bookingTotal,
        method: 'GET',
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
            method: 'GET',
            error: function() {
                alert('Something went wrong');
            },
            success : () => {
                $.ajax({
                    url: baseURL + 'Reservation/addReserver/' + numResa + '/' + qty + '/' + id,
                    method: 'GET',
                    error: function() {
                        alert('Something went wrong');
                    },
                    success: () => {
                        updateStock(id, qty)
                    }
                })
            }
        })

    }
}

function ajaxInsertOrder() {
    let orderTotal = $("#totalFinalDelivery").text().split("€")[0];
    if($("#remise").is(':checked')) {
        orderTotal = Math.round((orderTotal * 0.9)*100)/100
    }
    $.ajax({
        url: baseURL + 'Order/addOrder/' + orderTotal,
        method: 'GET',
        error: function() {
            alert('Something went wrong');
        },
        success: (data) => {
            ajaxInsertLigneOrder(data)
        }
    })
}

function ajaxInsertLigneOrder(numOrder) {
    const qtys = $("table#delivery > tbody >> .qty")

    for (let i = 0; i < qtys.length; i++) {
        const qty = $(qtys[i]).children().val()
        const id = $(qtys[i]).attr("id")

        $.ajax({
            url: baseURL + 'Order/addLigneOrder/' + numOrder +'/' + i + '/' + qty + '/' + id,
            method: 'GET',
            error: function() {
                alert('Something went wrong');
            },
            success : () => {
                $.ajax({
                    url: baseURL + 'Order/addCommander/' + numOrder + '/' + qty + '/' + id,
                    method: 'GET',
                    error: function() {
                        alert('Something went wrong');
                    },
                    success: () => {
                        updateStock(id, qty)
                    }
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

    $("#totalFinalDelivery").text(total + "€")
}

function setSubTotal(id) {
    const price = $('.headerProductBody#'+id+'> .product-price').text().split('€')[0]
    const qty = $('.headerProductBody#'+id+'> .product-price > span').text().split('x')[1]
    $('#total'+id).text(price*qty+'€')
}

function confirmModalAppear(){
    $('#modal').css('display', 'block')
}

function confirmModalDisppear(){
    $('#modal').css('display', 'none')
}

function updateStock(id, qty) {
    $.ajax({
        url: baseURL + 'Product/updateStock/' + id + '/' + qty,
        method: 'GET',
        error: function() {
            alert('Something went wrong');
        },
    })
}

function usePoints() {
    $.ajax({
        url: baseURL + 'Customer/usePoints',
        method: 'GET',
        error: function() {
            alert('Something went wrong');
        },
    })
}

function addPoints(nb) {
    $.ajax({
        url: baseURL + 'Customer/earnPoints/' + nb,
        method: 'GET',
        error: function() {
            alert('Something went wrong');
        },
    })
}

function resetCart() {
    $.ajax({
        url: baseURL + 'Cart/createCart',
        method: 'GET',
        error: function() {
            alert('Something went wrong');
        },
        success: () => {
            confirmModalAppear();
            $(document).on('click', () => {
                confirmModalDisppear()
                $('tbody>tr').remove()
                $('.headerProductBody').remove()
                $('#totalFinalDelivery').text('0€')
                $('#totalFinalBooking').text('0€')
                $('span.qty').text(0)
                $('span#total').text('0€')
            })
        }
    });
}

init();