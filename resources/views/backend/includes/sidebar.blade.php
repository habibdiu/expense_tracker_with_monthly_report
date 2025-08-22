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
                <li
                    class="nav-item {{ $data['active_menu'] == 'category' || $data['active_menu'] == 'subcategory' || $data['active_menu'] == 'room_type' ? 'active' : '' }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="{{route('admin.category')}}" role="button" aria-expanded="false"
                        aria-controls="room_features">
                        <i class="fa-regular fa-user"></i>
                        <span class="link-title">Add Category</span>
                    </a>
                </li>
                <li
                    class="nav-item {{ $data['active_menu'] == 'category' || $data['active_menu'] == 'subcategory' || $data['active_menu'] == 'room_type' ? 'active' : '' }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="{{route('admin.expense')}}" role="button" aria-expanded="false"
                        aria-controls="room_features">
                        <i class="fa-regular fa-user"></i>
                        <span class="link-title">Add Expense</span>
                    </a>
                </li>
                <li
                    class="nav-item {{ $data['active_menu'] == 'category' || $data['active_menu'] == 'subcategory' || $data['active_menu'] == 'room_type' ? 'active' : '' }}">
                    <a class="nav-link" data-bs-toggle="collapse" href="{{route(admin.expense_list)}}" role="button" aria-expanded="false"
                        aria-controls="room_features">
                        <i class="fa-regular fa-user"></i>
                        <span class="link-title">List Expense</span>
                    </a>
                </li>
        </ul>
</nav>