/* Cart */

/* Confirms that the file loaded correctly */
console.log("Main.js is loaded")

/* Waits until the website is in a ready state, then it loads the variables in ready() */
if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

/* Function runs when the wbesite is ready */
function ready(){

    /* Stores all of the "Remove from Cart" buttons into a variable, logs it to the console, and
    when the button is clicked, it performs the removeCartItem() */
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    console.log(removeCartItemButtons)
        for (var i = 0; i < removeCartItemButtons.length; i++) {
            var button = removeCartItemButtons[i]
            button.addEventListener('click',removeCartItem)
        }

    /* Stores all of the "Quantity"" inputs into a variable, logs it to the console, and
    when the value is changed, it performs the quantityChanged() */
    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    console.log(quantityInputs)
        for (var i = 0; i < quantityInputs.length; i++) {
            var input = quantityInputs[i]
            input.addEventListener('change', quantityChanged)
        }

    /* Stores all of the "Add to Cart" buttons into a variable, logs it to the console, and
    when the button is clicked, it performs the addCartItem() */
    var addToCartButtons = document.getElementsByClassName('add-to-cart-btn')
    console.log(addToCartButtons)
        for (var i = 0; i < addToCartButtons.length; i++) {
            console.log("In addToCartButtons for loop")
            var button = addToCartButtons[i]
            button.addEventListener('click', addCartItem)
        }

    /* Updates the cart total when the page is ready */
    updateCartTotal()

    /* Unfinished method */
    /* The goal was when the Purchase button was clicked, it would refer to the MAMP database
    and the items in the cart-items class would match to iteams in the products table, and print
    off an invoice for the customer */
    var purchaseButton = document.getElementsByClassName('btn-purchase').addEventListener('click',
    console.log("I'm gonna reference the PHP database and then print a list of the materials ordered"))

}



/* Responsiveness for Mobile */
const breakpoint = [
{
    breakpoint: 1280, 
    settings:{
        slidesToShow : 4
    }
},
{
    breakpoint: 1009,
    settings: {
        slidesToShow : 3
    }
},
{
    breakpoint: 720,
    settings: {
        slidesToShow : 2
    }
},
{
    breakpoint: 460,
    settings: {
        slidesToShow : 1
    }
}
]


/** First Slider */
$('.slider-one')
.not(".slick-initialized")
.slick({
    autoplay: true,
    autoplaySpeed: 3000,
    dots: true,
    prevArrow:".site-slider .slider-btn .prev",
    nextArrow:".site-slider .slider-btn .next",
});

/** Second Slider */
$('.slider-two')
.not(".slick-initialized")
.slick({
    prevArrow:".site-slider-two .prev",
    nextArrow:".site-slider-two .next",
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplaySpeed: 3000,
    responsive: breakpoint
});

/** Third Slider */
$('.slider-three')
.not(".slick-initialized")
.slick({
    prevArrow:".site-slider-three .prev",
    nextArrow:".site-slider-three .next",
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplaySpeed: 3000,
    infinite: true,
    responsive: breakpoint
});

/** Fourth Slider */
$('.slider-four')
.not(".slick-initialized")
.slick({
    prevArrow:".site-slider-four .prev",
    nextArrow:".site-slider-four .next",
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplaySpeed: 3000,
    infinite: true,
    responsive: breakpoint
});

/* Updates the cart total when the quantity is changed */
function quantityChanged(event){
    console.log('Quantity Changed')
    var input = event.target
    if(isNaN(input.value) || input.value < 1){
        input.value = 1
        alert('Please enter a value greater than 0 or remove the item from your')
    }
    updateCartTotal()

}

/* Removes the item in the cart and updates the cart total */
function removeCartItem(event){
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

/* Adds an item to the cart and updates the cart total */
function addCartItem(event){
    var buttonClicked = event.target
    var shopItem = buttonClicked.parentElement.parentElement
    var title = shopItem.getElementsByClassName('pro-title')[0].innerText
    var price = shopItem.getElementsByClassName('add-to-cart-price')[0].innerText
    var shopItemImage = buttonClicked.parentElement.parentElement.parentElement
    var image = shopItemImage.getElementsByClassName('img-fluid')[0].src
    updateCartTotal()

}

function addItemToCart(title, price, image){
    var cartRow = document.createElement('div')
    cartRow.innerHTML = cartRowContents
    var addCartItem = document.getElementsByClassName('cart-items')[0]
    addCartItem.append(cartRow)
}

updateCartTotal()

/* Every time the button was clicked, the item is removed and the cart toal is updated */
var removeCartItemButtons = document.getElementsByClassName('btn-danger')
console.log(removeCartItemButtons)
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', function(event){
            var buttonClicked = event.target
            buttonClicked.parentElement.parentElement.remove()
            updateCartTotal()
        })
    }

/* For every cart-row in the cart, the price gets mutltiplied to the price
and is added to the cart total */
function updateCartTotal(){
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        
        var price = parseFloat(priceElement.innerText.replace('$', '').replace(',',''))
        price.toFixed(2)
        var quantity = quantityElement.value
        total = total + (price * quantity)        
    }
    document.getElementsByClassName('cart-total-price')[0].innerText = '$' + total.toFixed(2)
   
}