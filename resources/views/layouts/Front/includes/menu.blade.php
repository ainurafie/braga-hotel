<a href="{{ route('index') }}" class="logo w-24 h-auto"> <img src="../assets/images/logo.svg" alt="">

<nav class="navbar">
    <a href="#home">home</a>
    <a href="#about">about</a>
    <a href="#room">room</a>
    <a href="#event">event</a>
    @guest
        <a href="{{ route('login') }}" class="btn">Sign In</a>
    @else
        <a href="/dashboard" class="btn">Dashboard</a>
    @endguest
</nav>

<div id="menu-btn" class="fas fa-bars"></div>
