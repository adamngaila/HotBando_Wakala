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
              <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
            <li class="nav-item nav-category"><span class="nav-link">WAKALA</span></li>
            <li class="nav-item">
              <a class="nav-link" href="wakala_mauzo">
                <span class="menu-title">Mauzo</span>
                <i class="icon-basket-loaded menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="wakala_wateja">
                <span class="menu-title">Wateja   </span>
                <i class="icon-people menu-icon"></i>
              </a>
            </li>
         
            <li class="nav-item">
              <a class="nav-link" href="">
                <span class="menu-title">Report   </span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic-vifurushi" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">PACKAGES</span>
                <i class=" icon-notebook menu-icon"></i>
              </a>
            <div class="collapse" id="ui-basic-vifurushi">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="wakala_vifurushi">
                <span class="menu-title">Vifurushi   </span>
                <i class="icon-feed menu-icon">  </i>
              </a>
            </li>
            <li class="nav-item"><a class="nav-link" href="{{ route('admin_show_vifurushi') }}">
                <span class="menu-title">Vocha</span>
                <i class="icon-gift menu-icon"></i>
              </a>
            </li>
            </ul>
              </div>
</li>
          </ul>
        </nav>