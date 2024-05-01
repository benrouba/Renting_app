rangeSlider(document.querySelector('#range-slider-example'), {
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
    orientation: 'horizontal',
    // callback
    //display the value of the range slider
    onInit: function(valueSet) {
        console.log(valueSet);
    },
    onInput: function(valueSet) {

        console.log(valueSet);
    },
  })
