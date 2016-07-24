function updaateOrdersCount() {
    var cart = getCookie("cart");
    if (cart.length == 0)
        document.getElementById('numOfOrders').innerHTML = 0;
    else {
        document.getElementById('numOfOrders').innerHTML = cart.split(',').length;

    }
}

function addToCart(id) {
    var cart = getCookie("cart");
    document.cookie = "cart=" + id + ((cart.length != 0) ? "," + cart : "");
    updaateOrdersCount();

}

function removeFromCart(id) {
    var cart = getCookie("cart");
    var split = cart.split(",");
    cart = "";
    var flag = false;
    for (var i = 0; i < split.length; i++) {
        if (split[i].indexOf(id) == -1 || flag) {
            if (cart.length > 0)
                cart += "," + split[i];
            else
                cart += split[i];
        }
        else
            flag = true;
    }
    document.cookie = "cart=" + cart;
    location.reload();
}


function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

