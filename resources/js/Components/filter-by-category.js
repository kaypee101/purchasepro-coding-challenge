var urlOrigin = window.location.origin + window.location.pathname;

$("#filter-by-catalog").on("change", function () {
    var catalog = this.value;
    catalog = catalog.toLowerCase();

    var page = $("ul.pagination li.active span.page-link").html();

    var param = "";

    if (page) {
        param = "?page=" + page;
    }

    if (catalog) {
        param = param + (param != "" ? "&" : "?") + ("catalog=" + catalog);
    }

    window.location.replace(urlOrigin + param);
});
