const aside = document.querySelector(".aside");
const sidebarToggle = document.querySelector(".sidebar-toggle");
const closeBtn = document.querySelector(".close-btn");
const clearCart = document.querySelector(".clear-cart");
const single = document.querySelector(".single");

const cartItems = document.querySelector('.cart-items');

const cartTotal = document.querySelector(".cart-total");
const countItemsInCart = document.querySelector('.count-items-in-cart');

const toggleCart = () => {
    single.classList.contains('show-single') && single.classList.remove('show-single');
    aside.classList.toggle("show");
    aside.classList.contains('show') && populateCart(cart);
}

const closeCart = () =>  aside.classList.remove("show");

const createProduct = (data) => `
    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="product text-center" data-id="${data.id}">
            <div class="position-relative mb-3">
                <a class="d-block product-detail" href="#">
                    <img class="img-fluid w-100 product-img" src="${data.image}" alt="${data.name}">
                </a>
                <div class="product-overlay">
                    <ul class="mb-0 list-inline">
                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark add-to-cart">Add to cart</a></li>
                        <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark product-detail"><i class="fas fa-expand"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <h6> <a class="reset-anchor product-name" href="#">${data.name}</a></h6>
            <p class="text-small text-muted">$<span class="product-price">${data.price}</span></p>
        </div>
    </div>
`;
        
function makeShowcase(products) {
    let result = '';
    products.forEach(item => {
        result+=createProduct(item);
    });
    document.querySelector('.showcase').innerHTML = result;
}

const createDetail = (data) => 
`<div class="detail product" data-id="${data.id}">
    <div class="product__img">
        <img src="${data.image}" alt="${data.name}">
    </div>
    <div class="product__description--content">
        <div class="description__content--about">
            <h1>${data.name}</h1>
            <h2>$${data.price}</h2>
            <div>${data.description}</div>
        </div>
    </div>
    <div class="go-back">
        <i class="fas fa-play"></i>
        <span>All products</span>
    </div>
    <div class="product_buttons">
        <button class="btn wishlist">wishlist</button>
        <button class="btn buy add-to-cart">Add to cart</button>
    </div>
</div>`;

const addItem = (product) => {
    let exist = cart.some(elem => elem.id === product.id);
    if(exist){
        cart.forEach(elem => {
            if(elem.id === product.id){
                elem.amount += 1;
            }
        })
    }else {
        let cartItem = { ...product, amount: 1 };
        cart = [...cart, cartItem];

    
    }
    +countItemsInCart.textContent++;
    countItem(cart);
    saveCart(cart);
};

function countItem(cart){
    countItemsInCart.textContent = cart.reduce((previous, current) => previous + current.amount, 0);
    if (+countItemsInCart.textContent>0){
        countItemsInCart.classList.add('notempty');
    } else {
        countItemsInCart.classList.remove('notempty');
    }
}

function renderShowcase(){
    let productDetails = document.querySelectorAll('.product-detail');
    
    productDetails.forEach(function(element) {
        element.addEventListener("click", function(e){
            let product = getProduct(e.target.closest('.product').dataset.id);
            single.innerHTML = createDetail(product);
            single.classList.add("show-single");
            let goBack = document.querySelector('.go-back');
            goBack && goBack.addEventListener('click', () => single.classList.remove("show-single"));
            document.querySelector('.detail .add-to-cart').addEventListener('click', (e) => {
                addItem(getProduct(e.target.closest('.product').dataset.id));
            });
        });
    });
    
}

const carouselItem = (data) =>`
    <div class="carousel-item">
        <a class="category-item" href="#" data-category="${data.name}">
            <img src="${data.image}" alt="${data.name}" height="100" width="250" class="category-item"  data-category="${data.name}"><strong
            class="category-item category-item-title" data-category="${data.name}">${data.name}</strong></a>
</div>`;

function makeCarousel(categories) {
    let result = '';
    categories.forEach(item => {
        result+=carouselItem(item);
    });
    result += result;
    document.querySelector('.carousel-track').innerHTML = result;
}

let cart = [];

function addToCartItem(item){
    const div = document.createElement("div");
        div.classList.add("cart-item");
        div.setAttribute('id', 'id'+item.id);
        div.innerHTML = `
            <div class="picture product-img">
                <img src="${item.image}" alt="${item.name}" class="img-fluid w-100">
            </div>
            <div class="product-name p-auto">${item.name}</div>
            <div class="remove-btn text-right">
                <a class="reset-anchor m-auto" href="#">
                    <i class="fas fa-trash-alt" data-id=${item.id}></i>
                </a>
            </div>
            <div class="quantity">
                <div class="border d-flex justify-content-around mx-auto">
                    <i class="fas fa-caret-left inc-dec-btn" data-id=${item.id}></i>
                    <span class="border-1 p-1 amount">${item.amount}</span>
                    <i class="fas fa-caret-right inc-dec-btn" data-id=${item.id}></i>
                </div>
            </div>
            <div class="prices">
                <span class="price">$<span class="product-price">${item.price}</span></span>
                <span class="subtotal">Total: $<span class="product-subtotal">${item.amount*item.price}</span></span>
            </div>
        `;
        cartItems.appendChild(div);
}

function populateCart(cart) {
    cartItems.innerHTML = '';
    cart.forEach(function(item){addToCartItem(item);});
    setCartTotal(cart);
}

const clear = () => {
    cart = [];
    cartItems.innerHTML = '';
    setCartTotal(cart);
    saveCart(cart);
}

const filterItem = (cart, curentItem) => cart.filter(item => item.id !== +(curentItem.dataset.id));
    
const findItem = (cart, curentItem) => cart.find(item => item.id === +(curentItem.dataset.id));

function renderCart() {
    clearCart.addEventListener("click", () => clear());
    cartItems.addEventListener("click", event => {
        // event.preventDefault();
        if (event.target.classList.contains("fa-trash-alt")){
            cart = filterItem(cart, event.target);
            event.target.closest('.cart-item').remove();
            setCartTotal(cart);
            saveCart(cart);
            
        } else if (event.target.classList.contains("fa-caret-right")) {
            let tempItem = findItem(cart, event.target);
            tempItem.amount = tempItem.amount + 1;
            event.target.previousElementSibling.innerText = tempItem.amount;
            setCartTotal(cart);
            saveCart(cart);
        } else if (event.target.classList.contains("fa-caret-left")) {
            let tempItem = findItem(cart, event.target);
            if (tempItem !== undefined && tempItem.amount > 1) {
                tempItem.amount = tempItem.amount - 1;
                event.target.nextElementSibling.innerText = tempItem.amount;
                
            } else {
                cart = filterItem(cart, event.target);
                event.target.closest('.cart-item').remove();
                
            }
            setCartTotal(cart);
            saveCart(cart);
        }
    });
}

function setCartTotal(cart) {
    let tmpTotal = 0;
    cart.map(item => {
        tmpTotal = item.price * item.amount;
        cartItems.querySelector(`#id${item.id} .product-subtotal`).textContent=parseFloat(tmpTotal.toFixed(2));
    });

    cartTotal.textContent = parseFloat(cart.reduce((previous, current) => previous + current.price * current.amount, 0).toFixed(2));
    countItemsInCart.textContent = cart.reduce((previous, current) => previous + current.amount, 0);
}

function saveProducts(products) {
    localStorage.setItem("products", JSON.stringify(products));
}

function getProducts() {
    return JSON.parse(localStorage.getItem("products"));
}

function getProduct(id) {
    let products = JSON.parse(localStorage.getItem("products"));
    return products.find(product => product.id === +(id));
}

function getCart() {
    return localStorage.getItem("basket")
      ? JSON.parse(localStorage.getItem("basket"))
      : [];
}

function saveCart(cart) {
    localStorage.setItem("basket", JSON.stringify(cart));
}

function renderCategory(selector){
    const categoryItems = document.querySelectorAll(selector);
    categoryItems.forEach(item => item.addEventListener('click', function(e){
        if (e.target.classList.contains('category-item')) {
            const category = e.target.dataset.category;
            const categoryFilter = items => items.filter(item => item.category.includes(category));
                makeShowcase(categoryFilter(getProducts()));
        } else {
                makeShowcase(getProducts());
        }
        addToCarts();
        renderShowcase();
    }))
}

function addToCarts(){
    let addToCarts = document.querySelectorAll('.add-to-cart');

    addToCarts.forEach(function(item) {
        item.addEventListener("click", function(event) {
            let product = getProduct(event.target.closest('.product').dataset.id);
            addItem(product);
        });
    });
}

function categoriesList(categories){
    let result = '';
    categories.forEach(item => 
        result+=`<li class="mb-2"><a class="reset-anchor category-item" href="#" data-category="${item.name}">${item.name}</a></li>`
    );
    document.querySelector('.categories-list').innerHTML = result;
} 
 
function compareValues(key, order = 'asc') {
    return (a, b) => {
      if (!a.hasOwnProperty(key) || !b.hasOwnProperty(key)) {
        return 0;
      }
  
      const A = (typeof a[key] === 'string')
        ? a[key].toUpperCase() : a[key];
      const B = (typeof b[key] === 'string')
        ? b[key].toUpperCase() : b[key];
  
      let comparison = 0;
      if (A > B) {
        comparison = 1;
      } else if (A < B) {
        comparison = -1;
      }
      return (
        (order === 'desc') ? (comparison * -1) : comparison
      );
    };
}

function saveStorageItem(key, item) {
    localStorage.setItem(key, JSON.stringify(item));
}
function fetchData(dataBase) {
    const baseUrl = `http://peculiar.cms/api/${dataBase}`;
    // http://peculiar.cms/api/products
    fetch(baseUrl)
        .then((response) => {
            if (response.status !== 200) {
                console.log('Looks like there was a problem. Status Code: ' + response.status);
                return;
            }
            response.json().then((dataJson) => {
                saveStorageItem(dataBase, dataJson)
            });
        })
        .catch((err) => {
            console.log('Fetch Error :-S', err);
        });

}
document.addEventListener("DOMContentLoaded", function(){
    
    closeBtn.addEventListener("click", closeCart);
    sidebarToggle.addEventListener("click", toggleCart);
    // saveProducts(products);
    fetchData("products");
    
    // let array = getProducts();
    // const key = 'category';

    // const arrayUniqueByKey = [...new Map(getProducts().map(item =>
    // [item['category'], item])).values()];

    // console.log(arrayUniqueByKey);
    // const categories = arrayUniqueByKey.map(item => (
    //     { 
    //         name: item.category,
    //         image: item.image
    //     }
    // ));
    
    const categories = [...new Map(getProducts().map(item =>
        [item['category'], item])).values()].map(item => (
        { 
            name: item.category,
            image: item.image
        }
    ));
    console.log(categories);
    
    document.body.style.setProperty( "--categories-length", categories.length );
    makeCarousel(categories);

    makeShowcase(getProducts());
    cart = getCart();
    countItem(cart);
    renderShowcase();

    
    addToCarts();

    renderCategory('.categories .carousel-item');
    document.querySelector('.categories-list') && categoriesList(categories);
    document.querySelector('.categories-list') && renderCategory('.categories-list');

    if (document.querySelector(".selectpicker")){
        let selectpicker = document.querySelector(".selectpicker");
        selectpicker.addEventListener('change', function() {
            // обычная функция изменяет свой контекст в зависимости от вызова
            console.log('You selected: ', this.value);
            switch(this.value){
                case 'low-high':
                    makeShowcase(getProducts().sort(compareValues('price', 'asc')));
                    break;
                case 'high-low':
                    makeShowcase(getProducts().sort(compareValues('price', 'desc')));
                    break;
                case 'popularity':
                    makeShowcase(getProducts().sort(compareValues('id', 'desc')));
                    break;
                default:
                    makeShowcase(getProducts().sort(compareValues('id', 'asc')));
                    break;
            }
            addToCarts();
            renderCategory();
        });
    }
    renderCart();

     // checkout__now
     if (document.querySelector(".checkout")) {
        document.querySelector(".checkout").addEventListener("click", () => {
            let inCart = [];
            // Storage.getCart()
            let cart = getCart();
            cart.forEach(item => {
                inCart.push({
                id: item.id,
                amount: item.amount
                });
            });
            console.log(inCart);
            fetch("/api/cart", {
                method: "POST", // *GET, POST, PUT, DELETE, etc.
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                cart: inCart,
                })
            })
            .then(function(response) {
                clear();
                document.location.replace("/profile");
            })
            .catch(function(error) {
                console.log(error);
            });
        });
    }

});
   