@section('menu_bar')
<nav class="navbar-default navbar-static-side" role="navigation">
   <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
          <li class="nav-header">
             @component('component.menu_profile')
               @slot('name', substr(Auth::user()->nama_manager, 0, 22))
               @slot('jabatan', 'Manager Kolat')
             @endcomponent
              <div class="logo-element">
                  IN+
              </div>
          </li>
          @yield('menus')
      </ul>
 </div>
</nav>
@endsection
