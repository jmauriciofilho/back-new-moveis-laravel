<a href="/" class="logo">
    <span class="logo-mini"><b>New-Móveis</b></span>
    <span class="logo-lg"><b>New-Móveis</b>{!! trans('admin/layout.logo_mini_sub') !!}</span>
</a>

<nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <?php $auth = \Illuminate\Support\Facades\Auth::user()?>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span id="countNotify" class="label label-success">0</span>
                </a>
                <ul class="dropdown-menu">
                    <li id="headerListNotify" class="header">You have 0 messages</li>
                    <li>
                        <ul id="listNotify" class="menu"></ul>
                    </li>
                    <li class="footer"><a href="javascript:void(0);">See All Messages</a></li>
                </ul>
            </li>
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="/assets/site/img/no-photo.gif" class="user-image" alt="User Image" />
                    <span class="hidden-xs">
                        {!! $auth->name !!}
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header">
                        <img src="/assets/site/img/no-photo.gif" class="img-circle" alt="User Image">
                        <p>
                            {!! $auth->name !!}
                            <small>
                                Membro desde
                                {!! $auth->created_at->format('F') . ' de ' . $auth->created_at->format('Y') !!}
                            </small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <div class="pull-left">
                            <a href="/admin/users/{!! $auth->id !!}/edit" class="btn btn-default btn-flat">Perfil</a>
                        </div>
                        <div class="pull-right">
                            <a href="/logout" class="btn btn-default btn-flat">Sair</a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>