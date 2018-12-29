import $ from 'jquery'

function init() {
    const cancelButtons = $("cancel_1");

    cancelButtons.addEventListener('click', () => {
        alert("foo")
    })
}

init();