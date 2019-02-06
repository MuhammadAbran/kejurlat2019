<div class="dropdown profile-element">
      <div class="col-md-6" style="margin-left: -20px">
         <img alt="image" class="img-circle" src="https://pbs.twimg.com/profile_images/909399057/Lambang_MP_400x400.jpg" width="60px" height="60px" />
      </div>
         <a data-toggle="dropdown" class="dropdown-toggle" href="#">
             <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ $name }}</strong>
             </span> <span class="text-muted text-xs block">{{ $jabatan }}<b class="caret"></b></span> </span> </a>
         <ul class="dropdown-menu animated fadeInRight m-t-xs">
             <li><a href="profile.html"><i class="fa fa-user"></i>  Profil</a></li>
             <li class="divider"></li>
             <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
             </li>
         </ul>
</div>
