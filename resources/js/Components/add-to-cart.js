import { processCart } from "./cookie-methods.js";

const PRODUCT_ID = "product_";
const QTY_ID = "qty_";
const ADD_ID = "add_";
const SUB_ID = "sub_";

$(".add-to-cart-button").on("click", function (e) {
    e.preventDefault();
    var add_id = $(this).attr("id");
    var product_id = PRODUCT_ID + add_id.replace(ADD_ID, "");

    addToCart(product_id);
});

$(".sub-to-cart-button").on("click", function (e) {
    e.preventDefault();
    var sub_id = $(this).attr("id");
    var product_id = PRODUCT_ID + sub_id.replace(SUB_ID, "");

    subToCart(product_id);
});

function addToCart(product_id) {
    var qty_id = QTY_ID + product_id.replace(PRODUCT_ID, "");
    var available_products = $("#" + qty_id).html();
    var checkout_products = $("#" + product_id).val();
    if (checkout_products == "") {
        checkout_products = 0;
    }

    available_products = parseInt(available_products);
    checkout_products = parseInt(checkout_products);

    if (available_products > checkout_products) {
        checkout_products++;
        $("#" + product_id).val(checkout_products);
    }

    processCart(product_id, checkout_products);
}

function subToCart(product_id) {
    var checkout_products = $("#" + product_id).val();
    if (checkout_products == "") {
        checkout_products = 0;
    }

    checkout_products = parseInt(checkout_products);

    if (checkout_products > 0) {
        $("#" + product_id).val(checkout_products - 1);
    }

    processCart(product_id, checkout_products);
}
