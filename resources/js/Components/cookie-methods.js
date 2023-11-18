function processCart(product_id, checkout_products) {
    var getCart = getCookie("cart");
    getCart = stringToObject(getCart);
    getCart = createOrUpdatePairByKey(getCart, product_id, checkout_products);

    var setCart = objectToString(getCart);
    setCookie("cart", setCart, 7);
}

function objectToString(obj) {
    try {
        return JSON.stringify(obj);
    } catch (error) {
        console.error("Error converting object to string:", error);
        return null;
    }
}

function stringToObject(str) {
    if (str == null) {
        return {};
    }
    try {
        return JSON.parse(str);
    } catch (error) {
        console.error("Error converting string to object:", error);
        return null;
    }
}

function getCookie(cookieName) {
    const cookiesArray = document.cookie.split(";");

    for (let i = 0; i < cookiesArray.length; i++) {
        const cookie = cookiesArray[i].trim();

        if (cookie.startsWith(`${cookieName}=`)) {
            return cookie.substring(cookieName.length + 1);
        }
    }

    return null;
}

function setCookie(cookieName, cookieValue, expirationDays) {
    const expirationDate = new Date();
    expirationDate.setDate(expirationDate.getDate() + expirationDays);

    const cookieString = `${cookieName}=${cookieValue}; expires=${expirationDate.toUTCString()}; path=/`;

    document.cookie = cookieString;
}

function findPairByKey(obj, key) {
    if (obj && typeof obj === "object") {
        const keys = Object.keys(obj);

        for (let i = 0; i < keys.length; i++) {
            const objKey = keys[i];

            if (objKey === key) {
                return obj[objKey];
            }
        }
    }

    return undefined;
}

function createOrUpdatePairByKey(obj, key, value) {
    if (obj && typeof obj === "object") {
        if (obj.hasOwnProperty(key)) {
            obj[key] = value;
        } else {
            obj[key] = value;
        }
    }

    return obj;
}

function deletePairByKey(obj, key) {
    if (obj && typeof obj === "object" && obj.hasOwnProperty(key)) {
        delete obj[key];
    }

    return obj;
}

export { processCart, objectToString, stringToObject, getCookie, setCookie };
