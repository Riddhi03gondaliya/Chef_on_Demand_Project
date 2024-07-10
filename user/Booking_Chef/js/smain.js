$(function () {
    $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 300,
        labels: {
            next: "Continue",
            previous: "Back",
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if (newIndex >= 1) {
                $('.steps ul li:first-child a img').attr('src', 'images/step-1.png');
            } else {
                $('.steps ul li:first-child a img').attr('src', 'images/step-1-active.png');
            }

            if (newIndex === 1) {
                $('.steps ul li:nth-child(2) a img').attr('src', 'images/step-2-active.png');
            } else {
                $('.steps ul li:nth-child(2) a img').attr('src', 'images/step-2.png');
            }

            if (newIndex === 2) {
                $('.steps ul li:nth-child(3) a img').attr('src', 'images/step-3-active.png');
            } else {
                $('.steps ul li:nth-child(3) a img').attr('src', 'images/step-3.png');
            }

            if (newIndex === 3) {
                $('.steps ul li:nth-child(4) a img').attr('src', 'images/step-4-active.png');
            } else {
                $('.steps ul li:nth-child(4) a img').attr('src', 'images/step-4.png');
            }
            if (newIndex === 4) {
                $('.steps ul li:nth-child(5) a img').attr('src', 'images/step-5-active.png');
            } else {
                $('.steps ul li:nth-child(5) a img').attr('src', 'images/step-5.png');
            }

            if (newIndex === 5) {
                $('.steps ul li:nth-child(6) a img').attr('src', 'images/4.png');
                $('.actions ul').addClass('step-4');
            } else {
                $('.steps ul li:nth-child(6) a img').attr('src', 'images/4.4.png');
                $('.actions ul').removeClass('step-4');
            }
            return true;
        }
    });
    // Custom Button Jquery Steps
    $('.forward').click(function () {
        $("#wizard").steps('next');
    })
    $('.backward').click(function () {
        $("#wizard").steps('previous');
    })
    // Click to see password 
    $('.password i').click(function () {
        if ($('.password input').attr('type') === 'password') {
            $(this).next().attr('type', 'text');
        } else {
            $('.password input').attr('type', 'password');
        }
    })
    // Create Steps Image
    $('.steps ul li:first-child').append('<img src="images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="images/step-1-active.png" alt=""> ').append('<span class="step-order">Step 01</span>');
    $('.steps ul li:nth-child(2)').append('<img src="images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="images/step-2.png" alt="">').append('<span class="step-order">Step 02</span>');
    $('.steps ul li:nth-child(3)').append('<img src="images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="images/step-3.png" alt="">').append('<span class="step-order">Step 03</span>');
    $('.steps ul li:nth-child(4)').append('<img src="images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="images/step-4.png" alt="">').append('<span class="step-order">Step 04</span>');
    $('.steps ul li:nth-child(5)').append('<img src="images/step-arrow.png" alt="" class="step-arrow">').find('a').append('<img src="images/step-5.png" alt="">').append('<span class="step-order">Step 05</span>');

    $('.steps ul li:last-child a').append('<img src="images/4.4.png" alt="">').append('<span class="step-order">Step 06</span>');
    // Count input 
    var products = {};

    $(".quantity span").on("click", function () {
        var $button = $(this);
        var $input = $button.parent().find("input");
        var oldValue = parseFloat($input.val());
        var $row = $button.closest('tr');
        var productName = $row.find('.product-detail a').text().trim();
        var price = parseFloat($row.find('.product-detail span:last-child').text());
        var newTotal = 0;
        if ($button.hasClass('plus')) {
            var newVal = oldValue + 1;
            newTotal = newVal * price;
            $row.find('.total-price span:last-child').text(`₹${newTotal.toFixed(2)}`);
        } else {
            if (oldValue > 0) {
                var newVal = oldValue - 1;
                newTotal = newVal * price;
                $row.find('.total-price span:last-child').text(`₹${newTotal.toFixed(2)}`);
            } else {
                var newVal = 0;
                $row.find('.total-price span:last-child').text(`₹0.00`);
            }
        }
        $input.val(newVal);
        if (newVal > 0) {
            if (products.hasOwnProperty(productName)) {
                products[productName].totalQuantity += 1;
                products[productName].totalPrice = newTotal;
            } else {
                products[productName] = {
                    totalPrice: newTotal,
                    totalQuantity: 1
                };
            }
        } else {
            delete products[productName];
        }

        var $cartItems = $('.cart-items');
        $cartItems.html('');
        var totalQuantity = 0;
        var totalPrice = 0;
        for (var productName in products) {
            if (products.hasOwnProperty(productName)) {
                var price = products[productName].totalPrice;
                var quantity = products[productName].totalQuantity;
                // console.log(products);
                var $row = $(`<tr><td><input type = "hidden" name="pname[]" value="${productName}">${productName}</td><td><input type = "hidden" name="pprice[]" value="${price.toFixed(2)}">${price.toFixed(2)}</td><td><input type = "hidden" name="pquantity[]" value="${quantity}">${quantity}</td><td><input type = "hidden" name="ptotal[]" value="${(price * quantity).toFixed(2) }">₹${(price * quantity).toFixed(2)}</td></tr>`);
                $cartItems.append($row);
                totalQuantity = totalQuantity + quantity;
                totalPrice = totalPrice + (price * quantity);
                
            }
        }
        var $totalRow = $(`<tr><td colspan="3"><strong>Total Price:</strong></td><td><input type="hidden" name="totalprice" value="${totalPrice.toFixed(2)}">₹${totalPrice.toFixed(2)}</td></tr>`);
        $('#cart_total').append($totalRow);
        
        $('#total-quantity').text(totalQuantity);
        $('#total-price').text(`₹${totalPrice.toFixed(2)}`);
        $(`<td><input type = "hidden" name="total" value="${totalPrice}</td>"`)

    })
});


// get all remove buttons and attach click event listener
