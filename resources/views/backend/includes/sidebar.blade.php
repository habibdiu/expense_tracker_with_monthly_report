<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ url('/') }}" class="sidebar-brand">
            H<span>OTEL</span>
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
                    <a class="nav-link" data-bs-toggle="collapse" href="#room_features" role="button" aria-expanded="false"
                        aria-controls="room_features">
                        <i class="fa-regular fa-user"></i>
                        <span class="link-title">Expense Tracking</span>
                        <i class="fa-solid fa-chevron-down link-arrow"></i>
                    </a>
                    <div class="collapse" id="room_features">
                        <ul class="nav sub-menu">
                            <li class="nav-item ">
                                <a href=""
                                    class="nav-link {{ $data['active_menu'] == 'room_type' ? 'active' : '' }}">Category Add
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href=""
                                    class="nav-link {{ $data['active_menu'] == 'category' ? 'active' : '' }}">
                                    Add Expenses
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href=""
                                    class="nav-link {{ $data['active_menu'] == 'subcategory' ? 'active' : '' }}">
                                    Expenses List
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                
        </ul>
</nav>