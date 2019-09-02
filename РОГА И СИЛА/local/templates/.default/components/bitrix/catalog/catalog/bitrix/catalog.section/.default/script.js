window.onload = function() {
    var wall = new Masonry(document.getElementById('catalog'), {
        isFitWidth: true,
        isResizable: false,
        gutterWidth: 0
    });
};

window.onload = function() {
    $("#slider-range").slider({
        animate: "slow",
        range: true,
        min: 0,
        max: 10000000,
        step: 50000,
        values: [0, 10000000],
        slide: function(event, ui) {
            $("#price-start").val(ui.values[0]);
            $("#price-end").val(ui.values[1]);
        }
    });
}