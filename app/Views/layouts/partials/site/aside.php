<!-- aside -->
<aside class="aside">
        <div class="cart">
            <div class="cart-header">
                <button class="close-btn"><i class="fas fa-times"></i></button>
                <h2 class="logo">Shopping Cart</h2>
            </div>

            <!-- cart items -->
            <div class="cart-items">

            </div>

            <!-- buttons -->
            <div class="cart-footer">
                <h3>Your total : $<span class="cart-total">0</span></h3>
                <div class="btn-group" role="group">
                    <button class="btn btn-outline-danger clear-cart">Clear Cart</button>
                    <?php if(isGuest()):?>
                    <a href="/#login">
                        <button class="btn btn-outline-warning">You sHould log in</button></a>
                    <?php else:?>
                        <button class="checkout btn btn-outline-success">Checkout</button>
                    <?php endif?>
                </div>
                

            </div>
        </div>
    </aside>
    <!-- ./aside -->

    <aside class="single">
       
    </aside>