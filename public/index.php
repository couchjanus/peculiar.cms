<ul>
    <li><a href="/">Home</a></li>
    <li><a href="/blog">Blog</a></li>
    <li><a href="/shop">Shop</a></li>
</ul>


<?php 
switch($_SERVER['REQUEST_URI']){
    case '/': 
        include "home.php";
    break;
    case '/blog': 
        include "blog.html";
    break;
    case '/shop': 
        include "shop.php";
    break;
    default: 
        echo "<h1>404</h1>";
    break;
}
