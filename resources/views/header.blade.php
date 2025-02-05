<header class="navbar navbar-expand-lg bg-body navbar-sticky sticky-top z-3000 px-0" data-sticky-element="">
      <div class="container">

        <!-- Mobile offcanvas menu toggler (Hamburger) -->
        <button type="button" class="navbar-toggler me-3 me-lg-0" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar brand (Logo) -->
        <a class="navbar-brand py-1 py-md-2 py-xl-1 me-2 me-sm-n4 me-md-n5 me-lg-0" href="home-real-estate.html">
          <span class="d-none d-sm-flex flex-shrink-0 text rtl-flip me-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34"><path d="M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z" fill="currentColor"></path><g fill-rule="evenodd"><path d="M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z" fill="#000" fill-opacity=".05"></path><g fill="#fff"><path d="M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z"></path><path d="M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z"></path></g></g><path d="M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z" fill="#fff"></path><path fill-rule="evenodd" d="M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z" fill="currentColor"></path></svg>
          </span>
          Gudnet ManPower Services
        </a>

 <!-- Main navigation -->
<nav class="offcanvas offcanvas-start" id="navbarNav" tabindex="-1" aria-labelledby="navbarNavLabel">
  <div class="offcanvas-header py-3">
    <h5 class="offcanvas-title" id="navbarNavLabel">Browse gudnetmanpowerservices</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body pt-2 pb-4 py-lg-0 mx-lg-auto">
    <ul class="navbar-nav position-relative">
      <!-- Home menu without submenus -->
      <li class="nav-item py-lg-2 me-lg-n1 me-xl-0">
        <a class="nav-link" href="{{ route('home') }} ">Home</a>
      </li>
      <!-- Account menu remains unchanged -->
      <li class="nav-item  py-lg-2 me-lg-n1 me-xl-0">
      <a class="nav-link active " href="{{ route ('user.edit') }}" role="button"  data-bs-trigger="hover" aria-expanded="false">Edit Profile</a>

      </li>
    </ul>
  </div>
</nav>


        <!-- Button group -->
        <div class="d-flex gap-sm-1">



          <!-- Account dropdown (Logged in state) -->
          <div class="dropdown pe-1 me-2">
            <a class="btn btn-icon hover-effect-scale position-relative bg-body-secondary border rounded-circle overflow-hidden" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="My account">
              @if (auth()->user()->photo)
                <img src="{{ Storage::url(auth()->user()->photo) }}" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Avatar">
              @else
                <img src="assets/img/account/avatar-sm.jpg" class="hover-effect-target position-absolute top-0 start-0 w-100 h-100 object-fit-cover" alt="Avatar">
              @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end" style="--fn-dropdown-spacer: .5rem">
              <li><span class="h6 dropdown-header">{{ auth()->user()->name }}</span></li>
              <li>
                <a class="dropdown-item" href="{{ route('account-profile.user') }}">
                  <i class="fi-user opacity-75 me-2"></i>
                  My profile  
                </a>
              </li>
              
              <li>
                <a class="dropdown-item" href="account-settings.html">
                  <i class="fi-settings opacity-75 me-2"></i>
Edit profile                </a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}">
                  <i class="fi-log-out opacity-75 me-2"></i>
                  Sign out
                </a>
              </li>
            </ul>
          </div>


        </div>
      </div>
    </header>