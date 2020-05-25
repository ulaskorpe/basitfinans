
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">

                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_pic" style="width: 40px"></div>{{$who['name_surname']}}
                        <span class=" fa fa-angle-down"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{route('profile')}}"> {{__('general.profile')}}</a></li>
                        <li>
                            <a href="javascript:;">
                                <span class="badge bg-red pull-right">50%</span>
                                <span>{{__('general.settings')}}</span>
                            </a>
                        </li>
                        <li><a href="javascript:;">Help</a></li>
                        <form id="logout_form" action="{{route('logout')}}" method="post">{{csrf_field()}}</form>
                        <li><a href="#" onclick="$('#logout_form').submit();"><i class="fa fa-sign-out pull-right"></i>{{__('general.log_out')}}</a></li>
                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                    </a>
                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        @for($i=0;$i<10;$i++)
                        <li>
                            <a>
                                <span class="image"><img src="{{url('images/bastet23325.jpg')}}" alt="Profile Image" /></span>
                                <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                                <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                            </a>
                        </li>
                            @endfor

                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>