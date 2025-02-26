@inject('request', 'Illuminate\Http\Request')
<!-- BEGIN: Sidebar -->
<div class="sidebar-wrapper group">
  <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
  <div class="logo-segment">
    <a class="flex items-center" href="{{ url('/admin/') }}">
      <img src="{{ asset('images/logo/iso_activos360.png') }}" class="black_logo w-12" alt="logo">
      <img src="{{ asset('images/logo/iso_activos360_white.png') }}" class="white_logo w-12" alt="logo">
      <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">activos360</span>
    </a>
    <!-- Sidebar Type Button -->
    <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
      <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200" icon="fa-regular:dot-circle"></iconify-icon>
      <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200" icon="material-symbols:circle-outline"></iconify-icon>
    </div>
    <button class="sidebarCloseIcon text-2xl">
      <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
    </button>
  </div>
  <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0"></div>
  <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50" id="sidebar_menus">

    <ul class="sidebar-menu">

      @if (auth()->user()->is_admin)
      <!-- BEGIN: ENTIDADES -->
      <li class="">
        <a href="javascript:void(0)" class="navItem">
          <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:building-office"></iconify-icon>
            <span>ENTIDADES</span>
          </span>
          <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="{{ route('tracking_time.create') }}" class="{{ ($request->segment(2) == 'entidades' and $request->segment(3) == 'create') ? 'active' : '' }}">New Tracking</a>
          </li>
          <li>
            <a href="{{ route('dashboard') }}" class="{{ ($request->segment(2) == 'entidades' and $request->segment(3) == '') ? 'active' : '' }}">Lista de Entidades</a>
          </li>
        </ul>
      </li>
      <!-- END: ENTIDADES -->

      <!-- BEGIN: ENCARGADOS -->
      <li class="">
        <a href="javascript:void(0)" class="navItem">
          <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:user-circle"></iconify-icon>
            <span>ENCARGADOS</span>
          </span>
          <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="{{ route('dashboard') }}" class="{{ ($request->segment(2) == 'users' and $request->segment(3) == 'create') ? 'active' : '' }}">Nuevo encargado</a>
          </li>
          <li>
            <a href="{{ route('dashboard') }}" class="{{ ($request->segment(2) == 'users' and $request->segment(3) == '') ? 'active' : '' }}">Lista de encargados</a>
          </li>
          <li>
            <a href="{{ route('dashboard') }}" class="{{ ($request->segment(2) == 'encargado-entidad') ? 'active' : '' }}">Asignar Encargado Entidad</a>
          </li>
        </ul>
      </li>
      <!-- END: ENCARGADOS -->

      <!-- BEGIN: PAGOS -->
      <li class="">
        <a href="javascript:void(0)" class="navItem">
          <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:banknotes"></iconify-icon>
            <span>PAGOS</span>
          </span>
          <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
        </a>
        <ul class="sidebar-submenu">
          <li>
            <a href="{{ route('dashboard') }}" class="{{ ($request->segment(2) == 'pagos' and $request->segment(3) == 'create') ? 'active' : '' }}">Nuevo pago</a>
          </li>
          <li>
            <a href="{{ route('dashboard') }}" class="{{ ($request->segment(2) == 'pagos' and $request->segment(3) == '') ? 'active' : '' }}">Lista de pagos</a>
          </li>
        </ul>
      </li>
      <!-- END: PAGOS -->
      @else
      <li class="">
        <a href="javascript:void(0)" class="navItem">
          <span class="flex items-center">
            <iconify-icon class=" nav-icon" icon="heroicons-outline:banknotes"></iconify-icon>
            <span>TRACKING TIME</span>
          </span>
          <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
        </a>

        <ul class="sidebar-submenu">
          <li>
            <a href="{{ route('tracking.create') }}" class="{{ ($request->segment(2) == 'pagos' and $request->segment(3) == 'create') ? 'active' : '' }}">New Tracking</a>
          </li>
          <li>
            <a href="{{ route('dashboard') }}" class="{{ ($request->segment(1) == 'dashboard') ? 'active' : '' }}">Tracking List</a>
          </li>
        </ul>
      </li>
      @endif

    </ul>
  </div>
</div>
<!-- End: Sidebar -->