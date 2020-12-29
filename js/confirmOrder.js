function confirmOrder(orderId) {
    $.post("./cart-confirm.php", {
        id: orderId
    }, function (data) {
        if (data) {
            location.reload();
        }
    });
}

function myFunction(x) {
    var txt;
    var r = confirm("Have you already processed the order!");
    if (r == true) {
        confirmOrder(x);
    }
}