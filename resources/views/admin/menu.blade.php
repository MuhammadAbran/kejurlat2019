@section('menu_bar')
<nav class="navbar-default navbar-static-side" role="navigation">
   <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
          <li class="nav-header">
             @component('component.menu_profile')
               @slot('name', Auth::user()->nama_manager)
               @slot('jabatan', 'Administrator')
             @endcomponent
              <div class="logo-element">
                  <img alt="image" src="https://pbs.twimg.com/profile_images/909399057/Lambang_MP_400x400.jpg" width="50px" height="50px" />
              </div>
          </li>
          @yield('menus')
      </ul>
 </div>
</nav>
@endsection
