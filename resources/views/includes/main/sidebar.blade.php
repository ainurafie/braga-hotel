<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('index') }}">Braga Hotel</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('index') }}">BH</a>
    </div>
    <ul class="sidebar-menu">
      @if (Auth::user()->role == 'USER')

        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('user.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

        {{-- <li class="menu-header">RUANGAN</li>
        <li class="{{ request()->is('room*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('room-list.index') }}">
            <i class="fas fa-door-open"></i> <span>List Ruangan</span>
          </a>
        </li> --}}

        <li class="menu-header">BOOKING</li>
        <li class="{{ request()->is('my-booking-list*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('my-booking-list.index') }}">
            <i class="fas fa-list"></i> <span>My Booking List</span>
          </a>
        </li>

        <li class="menu-header">SETTING</li>
        <li class="{{ request()->is('change-pass*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('user.change-pass.index') }}">
            <i class="fas fa-key"></i> <span>Ganti Password</span>
          </a>
        </li>

      @endif

      @if (Auth::user()->role == 'ADMIN')

        <li class="menu-header">Dashboard</li>
        <li><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

        <li class="menu-header">DATA KAMAR</li>
        <li class="{{ request()->is('admin/room*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('room.index') }}">
            <i class="fas fa-door-open"></i> <span>Ruangan</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/category*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('category.index') }}">
            <i class="fas fa-door-open"></i> <span>Kategori</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/events*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('events.index') }}">
            <i class="fas fa-door-open"></i> <span>Event</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/user*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('user.index') }}">
            <i class="fas fa-user"></i> <span>User</span>
          </a>
        </li>

        <li class="menu-header">BOOKING</li>
        <li class="{{ request()->is('admin/booking-list*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('booking-list.index') }}">
            @inject('booking_list', 'App\Models\BookingList')
            <i class="fas fa-list"></i> <span>{{ $booking_list->where("status", "PENDING")->count() > 0 ? '('.$booking_list->where("status", "PENDING")->count().')' : '' }} Booking List</span>
          </a>
        </li>

        <li class="menu-header">SETTING</li>
        <li class="{{ request()->is('admin/change-pass*') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('admin.change-pass.index') }}">
            <i class="fas fa-key"></i> <span>Ganti Password</span>
          </a>
        </li>

      @endif

      </ul>

  </aside>
</div>