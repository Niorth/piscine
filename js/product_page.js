import {init as initHeader} from "./cart";

function init() {
    const addToCart = $(".add-to-cart");
    addToCart.on("click", () => {
        const id = $("#productCode").val();
        const qty = $(".qty-input > input").val();
        let name = $("#productBodyCard>.product-name").text();
        name = name.replace(/\(/g, '%28').replace(/\)/g, '%29');
        const price = $("#productBodyCard>.product-price").text().split('€')[0];

        $.ajax({
            url: baseURL + 'Cart/addProductToCart/' + id + '/' + name + '/' + qty + '/' + price,
            method: 'POST',
            error: function() {
                alert('Something went wrong');
            },
            success: () => {
                initHeader()
                document.location.reload();
            }
        });

    })
}

init();