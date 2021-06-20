<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel" style="padding: 22px;">
            <div class="pull-left image">
                <img
                    src="https://www.placecage.com/640/360"
                    class="img-circle"
                    alt="User Image"></div>
            <div class="pull-left info">
                <p>
                    @if(auth()->user())
                        {{(auth()->user()->name)}}</p>
                @endif
                <a href="#">
                    <i class="fa fa-circle text-success"></i>
                    Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="/admin">
                    <i class="fa fa-home"r></i>
                    <span>Admin Panel</span>
                </a>
            </li>

                <li>
                    <a href="{{ route('admin.companies.index') }}">
                        <i class="fa fa-building"></i>
                        <span>Companies</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.employees.index') }}">
                        <i class="fa fa-users"></i>
                        <span>Employees</span>
                    </a>
                </li>
                <li>





        </ul>

    </section>

</aside>
