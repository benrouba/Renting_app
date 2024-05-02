// get the min and max price from the url
var url = new URL(window.location.href);
var min_ = url.searchParams.get("minPrice") || 0;
var max_ = url.searchParams.get("maxPrice") || 100;
var url = new URL(window.location.href);
var province = url.searchParams.get("province") || "";
var room = url.searchParams.get("room") || "";
// add class active to the button that has the value of the province
$(".province").each(function () {
    if ($(this).val() == province) {
        $(this).addClass("active_filter");
    }
})
// add class active to the button that has the value of the room
$(".room").each(function () {
    if ($(this).val() == room) {
        $(this).addClass("active_filter");
    }
})
rangeSlider(document.querySelector("#range-slider-example"), {
    step: 1
    ,
    // initial values

    value: [min_, max_],
    // disable the range slider element

    disabled: false,
    // disable the range slider
    rangeSlideDisabled: false,
    // disable left/right (top/bottom) thumbs
    thumbsDisabled: [false, false],
    // or 'vertical'
    orientation: "horizontal",
    // callback
    //display the value of the range slider

    onInput: function (valueSet) {
        min = valueSet[0];
        max = valueSet[1];
        // redirect to the url with the minPrice and maxPrice parameters
        window.location.href = "/rent?province=" + province + "&room=" + room+ "&minPrice=" + min + "&maxPrice=" + max;
    },
});
$(document).ready(function () {
    // if one of th eprovinces button is clicked
    // the initial value of the province is obtained from the url otherwise it is empty
    var url = new URL(window.location.href);
    var province = url.searchParams.get("province") || "";
    var room =  url.searchParams.get("room") || ""
    $("#reset").click(function () {
        // redirect to the url without any parameters
        window.location.href = "/rent";
    });
    // if the province button is clicked
    $(".province").click(function () {
        // get the value of the button
         province = $(this).val();
        // redirect to the url with the province parameter
        window.location.href = "/rent?province=" + province + "&room=" + room+ "&minPrice=" + min_ + "&maxPrice=" + max_;
    });
    // if the room button is clicked
    $(".room").click(function () {
        // get the value of the button
         room = $(this).val();
        // redirect to the url with the room parameter
        window.location.href = "/rent?province=" + province + "&room=" + room+ "&minPrice=" + min_ + "&maxPrice=" + max_;
    });

});
