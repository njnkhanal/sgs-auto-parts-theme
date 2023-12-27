document.addEventListener('DOMContentLoaded', function () {
    // Get DOM elements
    var priceSlider = document.getElementById('priceSlider');
    var priceValues = document.getElementById('priceValues');
    var minPriceInput = document.getElementById('minPrice');
    var maxPriceInput = document.getElementById('maxPrice');

    // Check if the slider element exists before initializing
    if (priceSlider && priceValues && minPriceInput && maxPriceInput) {
        // Set initial min and max prices
        var minPrice = 0;
        var maxPrice = parseFloat(custome_script_vars.max_price);
        var initialRange = [minPrice, maxPrice];

        // Create noUiSlider
        noUiSlider.create(priceSlider, {
            start: initialRange,
            connect: true,
            range: {
                'min': minPrice,
                'max': maxPrice
            },
            step: 10 // Adjust the step as needed
        });

        // Update the displayed range when the slider values change
        priceSlider.noUiSlider.on('update', function (values, handle) {
            var range = values.map(function (value) {
                return '$' + Math.round(value);
            }).join(' - ');

            // Update HTML elements with the selected range
            priceValues.innerHTML = 'Selected Range: ' + range;
            minPriceInput.value = values[0];
            maxPriceInput.value = values[1];
        });
    }
});



// document.getElementById('filterAction').addEventListener('click', function (event) {
//     event.preventDefault();

//     var selectedCategories = document.querySelectorAll('input[name="category[]"]:checked');
//     var selectedCategoryValues = [];
//     selectedCategories.forEach(function (checkbox) {
//         selectedCategoryValues.push(checkbox.value);
//     });
//     var selectedPriceRange = priceSlider.noUiSlider.get();
//     var keySearch = document.getElementById('keySearch').value;

//     var currentPage = 1; 
//     // AJAX request to fetch products
//     jQuery.ajax({
//         url: custome_script_vars.ajax_url,
//         type: 'POST',
//         data: {
//             action: 'fetch_products',
//             category: selectedCategoryValues,
//             min_price: selectedPriceRange[0],
//             max_price: selectedPriceRange[1],
//             keySearch: keySearch,
//             page: currentPage,
//         },
//         success: function (response) {
//             // Update the product container with the fetched products
//             productContainer.innerHTML = response;
//         },
//         error: function (xhr, status, error) {
//             console.error('AJAX request failed:' + error);
//         },
//     });
// });
document.getElementById('tBtnNavbar').addEventListener('click', navHandleCst);
function navHandleCst (){
    let nav = document.getElementById('navbar');
    if(nav.className === 'collapse navbar-collapse'){
        nav.className += ' show';
    }else{
        nav.className = 'collapse navbar-collapse';
    }
}