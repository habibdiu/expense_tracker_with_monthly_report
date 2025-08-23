<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('/') }}" class="sidebar-brand">
            Expense<span>Tracker</span>
        </a>
        <div class="sidebar-toggler ">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
                <li class="nav-item nav-category">Admin</li>
                <!--   Expense Tracking   -->
                <li class="nav-item {{ $data['active_menu'] == 'category' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.category') }}">
                        <i class="fa-regular fa-user"></i>
                        <span class="link-title">Add Category</span>
                    </a>
                </li>

                <li
                    class="nav-item {{ $data['active_menu'] == 'expense' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.expense') }}">
                        <i class="fa-regular fa-user"></i>
                        <span class="link-title">Add Expense</span>
                    </a>

                </li>
                <li class="nav-item {{ $data['active_menu'] == 'expense_list' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.expense_list') }}">
                        <i class="fa-regular fa-user"></i>
                        <span class="link-title">List Expense</span>
                    </a>
                </li>

        </ul>
</nav>