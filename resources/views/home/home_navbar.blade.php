<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MyWebsite Navbar</title>

<!-- Bootstrap Icons (sirf icons ke liye) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

/* NAVBAR */
.navbar{
    background:#111;
    color:#fff;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:15px 25px;
    position:relative;
}

/* LOGO */
.logo{
    font-size:22px;
    font-weight:bold;
}

/* NAV LINKS */
.nav-links{
    display:flex;
    list-style:none;
    gap:18px;
    align-items:center;
}

.nav-links li a{
    color:#fff;
    text-decoration:none;
    padding:8px 12px;
    transition:0.3s;
}

.nav-links li a:hover{
    background:#fff;
    color:#000;
    border-radius:5px;
}

/* DROPDOWN */
.dropdown{
    position:relative;
}

.dropdown-menu{
    position:absolute;
    top:30px;
    left:0;
    background:#222;
    display:none;
    flex-direction:column;
    min-width:180px;
    border-radius:6px;
    overflow:hidden;
    z-index:100;
}

.dropdown-menu a{
    padding:10px;
    color:#fff;
}

.dropdown-menu a:hover{
    background:#444;
}

.dropdown:hover .dropdown-menu{
    display:flex;
}

/* BUTTONS */
.btn{
    padding:6px 10px;
    border:none;
    cursor:pointer;
    border-radius:5px;
    font-size:14px;
}

.btn-login{
    background:#28a745;
    color:#fff;
}

.btn-register{
    background:#17a2b8;
    color:#fff;
}

.btn-logout{
    background:#17a2b8;
    color:#fff;
}

/* CART */
.cart-btn{
    background:#fff;
    color:#000;
    padding:6px 10px;
    border-radius:5px;
    text-decoration:none;
}

/* USER ICON STYLE */
.user-area i{
    font-size:18px;
    margin-right:5px;
}

/* HAMBURGER */
.hamburger{
    display:none;
    flex-direction:column;
    cursor:pointer;
}

.hamburger span{
    height:3px;
    width:25px;
    background:#fff;
    margin:4px;
}

#topBtn{
    position: fixed;
    bottom: 50px;
    right: 20px;

    font-size: 50px;
    border: none;

   
    color: rgb(0, 0, 0);
    cursor: pointer;
    display: none;
    z-index: 999;
}

#topBtn:hover{
    transform: scale(1.1);
    transition: 0.3s;
}
/* RESPONSIVE */
@media(max-width:768px){

    .nav-links{
        position:absolute;
        top:60px;
        left:-100%;
        background:#111;
        flex-direction:column;
        width:100%;
        text-align:center;
        transition:0.3s;
        padding:20px 0;
    }

    .nav-links.active{
        left:0;
    }

    .hamburger{
        display:flex;
    }

    .dropdown-menu{
        position:static;
        background:#222;
    }
}
</style>
</head>

<body>

<nav class="navbar">

    <!-- LOGO -->
    <div class="logo">MyWebsite</div>

    <!-- LINKS -->
    <ul class="nav-links" id="navLinks">

        <li><a href="/">Home</a></li>

        <!-- PRODUCTS DROPDOWN -->
        <li class="dropdown">
            <a href="#">Products ▾</a>
            <div class="dropdown-menu">
                <a href="/mobile">Mobile</a>
                <a href="/cover_models">Select Cover Models</a>
                <a href="/Power_bank">Power Bank</a>
                <a href="/Air_burds">Air Buds</a>
                <a href="/headphones">Headphones</a>
            </div>
        </li>

        <li><a href="#">Contact</a></li>

        <!-- CART -->
        <li>
            <a href="/cart" class="cart-btn">
                <i class="bi bi-cart4"></i> Cart
            </a>
        </li>

        <!-- AUTH -->
        <li class="user-area">

            @if(Auth::check())

                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        <i class="bi bi-person-circle"></i> Logout
                    </button>
                </form>

            @else

                <a href="{{ route('login') }}" class="btn btn-login">
                    <i class="bi bi-person-circle"></i> Login
                </a>

                <a href="{{ route('register') }}" class="btn btn-register">
                    <i class="bi bi-person-plus"></i> Register
                </a>

            @endif

        </li>

    </ul>

    <!-- HAMBURGER -->
    <div class="hamburger" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>

</nav>

<button id="topBtn">^</button>

<script>
function toggleMenu(){
    document.getElementById("navLinks").classList.toggle("active");
}











let topBtn = document.getElementById("topBtn");

window.onscroll = function () {

    if (document.documentElement.scrollTop > 200) {
        topBtn.style.display = "block";
    } 
    else {
        topBtn.style.display = "none";
    }
};

topBtn.onclick = function () {

    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });

};
</script>

</body>
</html>