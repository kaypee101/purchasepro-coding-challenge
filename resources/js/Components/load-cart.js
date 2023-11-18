import {
    processCart,
    objectToString,
    stringToObject,
    getCookie,
    setCookie,
} from "./cookie-methods.js";

loadCart();

function loadCart() {
    var getCart = getCookie("cart");
    getCart = stringToObject(getCart);

    for (var key in getCart) {
        if (getCart.hasOwnProperty(key)) {
            console.log(key + " -> " + getCart[key]);
            $("#" + key).val(getCart[key]);
        }
    }
}
