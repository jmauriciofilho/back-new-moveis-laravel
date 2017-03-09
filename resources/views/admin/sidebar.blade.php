<div class="user-panel">
    <div class="pull-left image">
        <img src="/assets/site/img/no-photo.gif" class="img-circle" alt="User Image">
    </div>
    <?php $auth = \Illuminate\Support\Facades\Auth::user()?>
    <div class="pull-left info">
        <p>{!! $auth->name !!}</p>
        <a href="javascript:void(0);">
            {!! $auth->email !!}
        </a>
    </div>
</div>

<ul class="sidebar-menu">
    <li class="header">MENU</li>
    <li>
        <a href="/admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="/admin/users">
            <i class="fa fa-users"></i> <span>Usuários</span>
        </a>
    </li>
    <li>
        <a href="/admin/roles">
            <i class="fa fa-list-ol"></i> <span>Regras</span>
        </a>
    </li>
    <li>
        <a href="/admin/permissions">
            <i class="fa fa-unlock-alt"></i> <span>Permissões</span>
        </a>
    </li>
    {{--<li class="header">NAME</li>--}}
    {{--<li class="treeview">--}}
        {{--<a href="javascript:void(0);">--}}
            {{--<i class="fa fa-dashboard"></i> <span>NAMES</span> <i class="fa fa-angle-left pull-right"></i>--}}
        {{--</a>--}}
        {{--<ul class="treeview-menu" style="display: none;">--}}
            {{--<li>--}}
                {{--<a href="/admin">--}}
                    {{--<i class="fa fa-circle-o"></i> NAME 1--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="javascript:void(0);">--}}
                    {{--<i class="fa fa-circle-o"></i> NAME 2--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</li>--}}
</ul>