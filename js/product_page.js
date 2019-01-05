import {init as initHeader} from "./cart";

function init() {
    const addToCartBooking = $(".add-to-cart#booking");
    const addToCartDelivery = $(".add-to-cart#delivery");

    addToCartBooking.on("click", () => {
        const id = $("#productCode").val();
        const qty = $(".qty-input > input").val();
        let name = $("#productBodyCard>.product-name").text();
        name = name.replace(/\(/g, '%28').replace(/\)/g, '%29');
        const price = $("#productBodyCard>.product-price").text().split('€')[0];

        $.ajax({
            url: baseURL + 'Cart/addProductToCart/' + id + '/' + name + '/' + qty + '/' + price +'/1',
            method: 'POST',
            error: function() {
                alert('Something went wrong');
            },
            success: () => {
                initHeader();
                document.location.reload();
            }
        });
    })

    addToCartDelivery.on("click", () => {
        const id = $("#productCode").val();
        const qty = $(".qty-input > input").val();
        let name = $("#productBodyCard>.product-name").text();
        name = name.replace(/\(/g, '%28').replace(/\)/g, '%29');
        const price = $("#productBodyCard>.product-price").text().split('€')[0];

        $.ajax({
            url: baseURL + 'Cart/addProductToCart/' + id + '/' + name + '/' + qty + '/' + price +'/2',
            method: 'POST',
            error: function() {
                alert('Something went wrong');
            },
            success: () => {
                initHeader();
                document.location.reload();
            }
        });
    })
}

init();