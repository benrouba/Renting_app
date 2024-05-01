var min = 0;
var max = 0;
rangeSlider(document.querySelector("#range-slider-example"), {
    step: 1,
    // initial values
    value: [0, 100],
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
    onInit: function (valueSet) {
        console.log(valueSet);
    },
    onInput: function (valueSet) {
        min = valueSet[0];
        max = valueSet[1];
        console.log(valueSet);
        // redirect to the url with the minPrice and maxPrice parameters
        window.location.href = "/rent?minPrice=" + min + "&maxPrice=" + max;
    },
});
$(document).ready(function () {
    // if one of th eprovinces button is clicked
    // the initial value of the province is obtained from the url otherwise it is empty
    var url = new URL(window.location.href);
    var province = url.searchParams.get("province") || "";
    var room =  url.searchParams.get("room") || ""
    var minPrice = url.searchParams.get("minPrice") || 0;
    var maxPrice = url.searchParams.get("maxPrice") || 0;
    $("#reset").click(function () {
        // redirect to the url without any parameters
        window.location.href = "/rent";
    });
    // if the province button is clicked
    $(".province").click(function () {
        // get the value of the button
         province = $(this).val();
        // redirect to the url with the province parameter
        room? window.location.href = "/rent?province=" + province + "&room=" + room :  window.location.href = "/rent?province=" + province;
    });
    // if the room button is clicked
    $(".room").click(function () {
        // get the value of the button
         room = $(this).val();
        // redirect to the url with the room parameter
        province? window.location.href = "/rent?province=" + province + "&room=" + room :  window.location.href = "/rent?room=" + room;
    });

});
