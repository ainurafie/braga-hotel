<a href="{{ route('index') }}" class="logo"> <i class="fas fa-hotel"></i> hotel </a>

<nav class="navbar">
    <a href="#home">home</a>
    <a href="#about">about</a>
    <a href="#room">room</a>
    @guest
        <a href="{{ route('login') }}" class="btn">Sign In</a>
    @else
        <a href="#reservation" class="btn">Book Now</a>
    @endguest
</nav>

<div id="menu-btn" class="fas fa-bars"></div>
