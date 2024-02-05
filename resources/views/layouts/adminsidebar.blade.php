<div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Auth::user()->name }}</p>
                  <p class="designation">{{ Auth::user()->Usertype }}</p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Dashboard</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('admin_dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">ADMIN</span></li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic-users" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">USERS MANAGER</span>
                <i class="icon-people menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic-users">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('show_admin') }}">Admin</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('show_wakala') }}">Wakala</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('internaldb_customers') }}">Cusomers</a></li>
                  <li class="nav-item"> <a class="nav-link" href="{{ route('local_customer_list') }}">Router Cusomers</a></li>
                </ul>
              </div>
</li>
              <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">REVENUES</span>
                <i class=" icon-notebook menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="{{ route('show_sales') }}">Sales</a></li>
                  <li class="nav-item"> <a class="nav-link" href="">Transactions</a></li>
                  <li class="nav-item"> <a class="nav-link" href="">Report</a></li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">
                <span class="menu-title">Vifurushi</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link" href="">
                <span class="menu-title">Report   </span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="pages/icons/simple-line-icons.html">
                <span class="menu-title">Connect   </span>
                <i class="icon-feed menu-icon">  </i>
              </a>
            </li>
           
          </ul>
        </nav>