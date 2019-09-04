/*перенести  в скрипт компонента*/
$(window).on('load', function () {
    let wall = new Masonry(document.getElementById('catalog'), {
        isFitWidth: true,
        isResizable: false,
        gutterWidth: 0
    });
    $("#slider-range").slider({
        animate: "slow",
        range: true,
        min: 0,
        max: 10000000,
        step: 50000,
        values: [0, 10000000],
        slide: function (event, ui) {
            $("#price-start").val(ui.values[0]);
            $("#price-end").val(ui.values[1]);
        }
    });
});
