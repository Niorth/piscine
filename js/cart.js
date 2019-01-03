
function init() {
    const cancelButtons = $('.cancel-btn');
    cancelButtons.on('click', (event) => {

        const eventId = event.currentTarget.id;
        const productId = eventId.split("_")[1];

        $.ajax({
            url: baseURL + 'Cart/removeProductFromCart/' + productId,
            method: 'POST',
            error: function() {
                alert('Something went wrong');
            },
        });
        $(event.currentTarget).parent().remove();

        setNumberProduct();
    })
}

function setNumberProduct() {
    const products = $('.product-body');
    let total = 0;
    for (let i = 0; i < products.length; i++){
        const data = $(products[i]).children().first().text();
        const price = data.split('€')[0];
        const qty = data.split('x')[1].split('\n')[0];
        total = total + price * qty
    }

    $('.header-btns-icon > .qty').text(products.length);
    $('.dropdown-toggle > #total').text(total+'€');
}

export function removeProductById(id) {
    const product = $('#'+ id + '.product-body');
    product.remove();
    setNumberProduct()
}

export function changeQtyHeader(id, qty) {
    $('#'+ id + '.product-body > .product-price > .qty').text('x' + qty);
    setNumberProduct()
}



init();