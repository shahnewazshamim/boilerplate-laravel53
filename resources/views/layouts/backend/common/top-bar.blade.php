<div id="header" class="header-fixed">
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                Admin.<span class="slogan">panel</span>
            </a>
        </div>
        <div id="navbar-no-collapse" class="navbar-no-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#" class="tipB collapseBtn leftbar" title="Toggle Left Panel"><i class="s16 minia-icon-list-3"></i></a>
                </li>
                <li>
                    <a href="#" class="tipB" title="Backup Database"><i class="s16 icomoon-icon-database-2"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="s16 icomoon-icon-cog-2"></i><span class="txt"> Settings</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu left dropdown-form">
                        <li class="menu">
                            <ul role="menu">
                                <li><strong>Application</strong></li>
                                <li>
                                    <a href="{{ url('preference/site') }}"><i class="s16 icomoon-icon-blog"></i>Site Settings</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-right usernav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                        <img src="{{ asset('assets/img/avatar.jpg') }}" alt="" class="image"/>
                        <span class="txt">Md. Shamim Shahnewaz</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu right">
                        <li class="menu">
                            <ul>
                                <li>
                                    <a href="#"><i class="s16 icomoon-icon-user-plus"></i>My Account</a>
                                </li>
                                <li>
                                    <a href="#"><i class="s16 icomoon-icon-bubble-2"></i>Change Password</a>
                                </li>
                                <li>
                                    <a href="#"><i class="s16 icomoon-icon-lock"></i>Lock Screen</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('dashboard/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="s16 icomoon-icon-exit"></i><span class="txt"> Logout</span></a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <li>
                    <a id="toggle-right-sidebar" href="#" class="tipL" title="Toggle Right Panel"><i class="s16 icomoon-icon-indent-increase"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</div>
