<!DOCTYPE html><html lang="en" data-bs-theme="light" data-pwa="true">
<!-- Mirrored from finder-html.createx.studio/account-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jan 2025 11:31:12 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

@include('head')

  <!-- Body -->
  <body>

    <!-- Customizer offcanvas -->
    <div class="offcanvas offcanvas-end" id="customizer" tabindex="-1">
      <div class="offcanvas-header border-bottom">
        <h4 class="h5 offcanvas-title">Customize theme</h4>
        <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">

        <!-- Customizer settings -->
        <div class="customizer-collapse collapse show" id="customizerSettings">

          <!-- Colors -->
          <div class="pb-4 mb-2">
            <div class="d-flex align-items-center mb-3">
              <i class="fi-swatches text-body-tertiary fs-5 me-2"></i>
              <h5 class="fs-lg mb-0">Colors</h5>
            </div>
            <div class="row row-cols-2 g-3" id="theme-colors">
              <div class="col">
                <h6 class="fs-sm mb-2">Primary</h6>
                <div class="color-swatch d-flex border rounded gap-3 p-2" id="theme-primary" data-color-labels="[&quot;theme-primary&quot;, &quot;primary&quot;, &quot;primary-rgb&quot;]">
                  <input type="text" class="form-control bg-transparent border-0 rounded-0 p-1" value="#d85151">
                  <label for="primary" class="ratio ratio-1x1 flex-shrink-0 w-100 cursor-pointer rounded-circle" style="max-width: 38px; background-color: #d85151"></label>
                  <input type="color" class="visually-hidden" id="primary" value="#d85151">
                </div>
              </div>
              <div class="col">
                <h6 class="fs-sm mb-2">Success</h6>
                <div class="color-swatch d-flex border rounded gap-3 p-2" id="theme-success" data-color-labels="[&quot;theme-success&quot;, &quot;success&quot;, &quot;success-rgb&quot;]">
                  <input type="text" class="form-control bg-transparent border-0 rounded-0 p-1" value="#33b36b">
                  <label for="success" class="ratio ratio-1x1 flex-shrink-0 w-100 cursor-pointer rounded-circle" style="max-width: 38px; background-color: #33b36b"></label>
                  <input type="color" class="visually-hidden" id="success" value="#33b36b">
                </div>
              </div>
              <div class="col">
                <h6 class="fs-sm mb-2">Warning</h6>
                <div class="color-swatch d-flex border rounded gap-3 p-2" id="theme-warning" data-color-labels="[&quot;theme-warning&quot;, &quot;warning&quot;, &quot;warning-rgb&quot;]">
                  <input type="text" class="form-control bg-transparent border-0 rounded-0 p-1" value="#fc9231">
                  <label for="warning" class="ratio ratio-1x1 flex-shrink-0 w-100 cursor-pointer rounded-circle" style="max-width: 38px; background-color: #fc9231"></label>
                  <input type="color" class="visually-hidden" id="warning" value="#fc9231">
                </div>
              </div>
              <div class="col">
                <h6 class="fs-sm mb-2">Danger</h6>
                <div class="color-swatch d-flex border rounded gap-2 p-2" id="theme-danger" data-color-labels="[&quot;theme-danger&quot;, &quot;danger&quot;, &quot;danger-rgb&quot;]">
                  <input type="text" class="form-control bg-transparent border-0 rounded-0 p-1" value="#f03d3d">
                  <label for="danger" class="ratio ratio-1x1 flex-shrink-0 w-100 cursor-pointer rounded-circle" style="max-width: 38px; background-color: #f03d3d"></label>
                  <input type="color" class="visually-hidden" id="danger" value="#f03d3d">
                </div>
              </div>
              <div class="col">
                <h6 class="fs-sm mb-2">Info</h6>
                <div class="color-swatch d-flex border rounded gap-2 p-2" id="theme-info" data-color-labels="[&quot;theme-info&quot;, &quot;info&quot;, &quot;info-rgb&quot;]">
                  <input type="text" class="form-control bg-transparent border-0 rounded-0 p-1" value="#3d7a81">
                  <label for="info" class="ratio ratio-1x1 flex-shrink-0 w-100 cursor-pointer rounded-circle" style="max-width: 38px; background-color: #3d7a81"></label>
                  <input type="color" class="visually-hidden" id="info" value="#3d7a81">
                </div>
              </div>
            </div>
          </div>

          <!-- Direction -->
          <div class="pb-4 mb-2">
            <div class="d-flex align-items-center pb-1 mb-2">
              <i class="fi-sort text-body-tertiary fs-lg me-2" style="transform: rotate(90deg)"></i>
              <h5 class="fs-lg mb-0">Direction</h5>
            </div>
            <div class="d-flex align-items-center justify-content-between border rounded p-3">
              <div class="me-3">
                <h6 class="mb-1">RTL</h6>
                <p class="fs-sm mb-0">Change text direction</p>
              </div>
              <div class="form-check form-switch m-0">
                <input type="checkbox" class="form-check-input" role="switch" id="rtl-switch">
              </div>
            </div>
            <div class="alert alert-info p-2 mt-2 mb-0">
              <div class="d-flex text-body-emphasis fs-xs py-1 pe-1">
                <i class="fi-info text-info fs-lg mb-2 mb-sm-0" style="margin-top: .125rem"></i>
                <div class="ps-2">To switch the text direction of your webpage from LTR to RTL, please consult the detailed instructions provided in the relevant section of our documentation.</div>
              </div>
            </div>
          </div>

          <!-- Border width -->
          <div class="pb-4 mb-2">
            <div class="d-flex align-items-center pb-1 mb-2">
              <i class="fi-menu text-body-tertiary fs-lg me-2"></i>
              <h5 class="fs-lg mb-0">Border width, px</h5>
            </div>
            <div class="slider-input d-flex align-items-center gap-3 border rounded p-3" id="border-input">
              <input type="range" class="form-range" min="0" max="10" step="1" value="1">
              <input type="number" class="form-control" id="border-width" min="0" max="10" value="1" style="max-width: 5.5rem">
            </div>
          </div>

          <!-- Rounding -->
          <div class="d-flex align-items-center pb-1 mb-2">
            <i class="fi-maximize text-body-tertiary fs-lg me-2"></i>
            <h5 class="fs-lg mb-0">Rounding, rem</h5>
          </div>
          <div class="slider-input d-flex align-items-center gap-3 border rounded p-3">
            <input type="range" class="form-range" min="0" max="5" step=".05" value="0.5">
            <input type="number" class="form-control" id="border-radius" min="0" max="5" step=".05" value="0.5" style="max-width: 5.5rem">
          </div>
        </div>

        <!-- Customizer code -->
        <div class="customizer-collapse collapse" id="customizerCode">
          <div class="nav mb-3">
            <a class="nav-link position-relative fs-base p-0" href=".html" data-bs-toggle="collapse" aria-expanded="true" aria-controls="customizerSettings customizerCode">
              <i class="fi-chevron-left fs-lg ms-n1 me-1"></i>
              <span class="hover-effect-underline stretched-link">Back to settings</span>
            </a>
          </div>
          <p class="fs-sm pb-1">To apply the provided styles to your webpage, enclose them within a <code>&lt;style&gt;</code> tag and insert this tag into the <code>&lt;head&gt;</code> section of your HTML document after the following link to the main stylesheet:<br><code>&lt;link href="assets/css/theme.min.css"&gt;</code></p>
          <div class="position-relative bg-body-tertiary rounded overflow-hidden pt-3">
            <div class="position-absolute top-0 start-0 w-100 p-3">
              <button type="button" class="btn btn-sm btn-outline-dark w-100" data-copy-text-from="#generated-styles" data-done-label="Code copied">
                <i class="fi-copy fs-sm me-1"></i>
                Copy code
              </button>
            </div>
            <pre class="text-wrap bg-transparent border-0 fs-xs text-body-emphasis p-4 pt-5" id="generated-styles"></pre>
          </div>
        </div>
      </div>

      <!-- Offcanvas footer (Action buttons) -->
      <div class="offcanvas-header border-top gap-3 d-none" id="customizer-btns">
        <button type="button" class="btn btn-lg btn-secondary w-100 fs-sm" id="customizer-reset">
          <i class="fi-trash fs-lg me-2 ms-n1"></i>
          Reset
        </button>
        <button class="btn btn-lg btn-primary hiding-collapse-toggle w-100 fs-sm collapsed" type="button" data-bs-toggle="collapse" data-bs-target=".customizer-collapse" aria-expanded="false" aria-controls="customizerSettings customizerCode">
          <i class="fi-code fs-lg me-2 ms-n1"></i>
          Show code
        </button>
      </div>
    </div>


    <!-- Page content -->
    <main class="content-wrapper w-100 px-3 ps-lg-5 pe-lg-4 mx-auto" style="max-width: 1920px">
      <div class="d-lg-flex">

        <!-- Login form + Footer -->
        <div class="d-flex flex-column min-vh-100 w-100 py-4 mx-auto me-lg-5" style="max-width: 416px">

          <!-- Logo -->
          <header class="navbar px-0 pb-4 mt-n2 mt-sm-0 mb-2 mb-md-3 mb-lg-4">
            <a class="navbar-brand pt-0" href="index.html">
              <span class="d-flex flex-shrink-0 text-primary rtl-flip me-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34"><path d="M34.5 16.894v10.731c0 3.506-2.869 6.375-6.375 6.375H17.5h-.85C7.725 33.575.5 26.138.5 17c0-9.35 7.65-17 17-17s17 7.544 17 16.894z" fill="currentColor"></path><g fill-rule="evenodd"><path d="M17.5 13.258c-3.101 0-5.655 2.554-5.655 5.655s2.554 5.655 5.655 5.655 5.655-2.554 5.655-5.655-2.554-5.655-5.655-5.655zm-9.433 5.655c0-5.187 4.246-9.433 9.433-9.433s9.433 4.246 9.433 9.433a9.36 9.36 0 0 1-1.569 5.192l2.397 2.397a1.89 1.89 0 0 1 0 2.671 1.89 1.89 0 0 1-2.671 0l-2.397-2.397a9.36 9.36 0 0 1-5.192 1.569c-5.187 0-9.433-4.246-9.433-9.433z" fill="#000" fill-opacity=".05"></path><g fill="#fff"><path d="M17.394 10.153c-3.723 0-6.741 3.018-6.741 6.741s3.018 6.741 6.741 6.741 6.741-3.018 6.741-6.741-3.018-6.741-6.741-6.741zM7.347 16.894A10.05 10.05 0 0 1 17.394 6.847 10.05 10.05 0 0 1 27.44 16.894 10.05 10.05 0 0 1 17.394 26.94 10.05 10.05 0 0 1 7.347 16.894z"></path><path d="M23.025 22.525c.645-.645 1.692-.645 2.337 0l3.188 3.188c.645.645.645 1.692 0 2.337s-1.692.645-2.337 0l-3.187-3.187c-.645-.646-.645-1.692 0-2.337z"></path></g></g><path d="M23.662 14.663c2.112 0 3.825-1.713 3.825-3.825s-1.713-3.825-3.825-3.825-3.825 1.713-3.825 3.825 1.713 3.825 3.825 3.825z" fill="#fff"></path><path fill-rule="evenodd" d="M23.663 8.429a2.41 2.41 0 0 0-2.408 2.408 2.41 2.41 0 0 0 2.408 2.408 2.41 2.41 0 0 0 2.408-2.408 2.41 2.41 0 0 0-2.408-2.408zm-5.242 2.408c0-2.895 2.347-5.242 5.242-5.242s5.242 2.347 5.242 5.242-2.347 5.242-5.242 5.242-5.242-2.347-5.242-5.242z" fill="currentColor"></path></svg>
              </span>
              Gudnet ManPower Services
            </a>
          </header>

          <h1 class="h2 mt-auto">Welcome back</h1>
          <div class="nav fs-sm mb-4">
            Don't have an account?
            <a class="nav-link text-decoration-underline p-0 ms-2" href="{{ route('register.form') }}">Create an account</a>
          </div>

          <!-- Form -->
          <form class="needs-validation" novalidate="" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="position-relative mb-4">
        <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
        <div class="invalid-tooltip bg-transparent py-0">Enter a valid email address!</div>
    </div>
    <div class="mb-4">
        <div class="password-toggle">
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
            <div class="invalid-tooltip bg-transparent py-0">Password is incorrect!</div>
            <label class="password-toggle-button fs-lg" aria-label="Show/hide password">
                <input type="checkbox" class="btn-check">
            </label>
        </div>
    </div>
            <div class="d-flex align-items-center justify-content-between mb-4">
              <div class="form-check me-2">
                <input type="checkbox" class="form-check-input" id="remember-30">
                <label for="remember-30" class="form-check-label">Remember for 30 days</label>
              </div>
              <div class="nav">
                <a class="nav-link animate-underline p-0" href="account-password-recovery.html">
                  <span class="animate-target">Forgot password?</span>
                </a>
              </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary w-100">Sign In</button>
          </form>



          <!-- Footer -->
          <footer class="mt-auto">
            <!-- <div class="nav mb-4">
              <a class="nav-link text-decoration-underline p-0" href="help-topics-v1.html">Need help?</a>
            </div>
            <p class="fs-xs mb-0">
              © All rights reserved. Made by <a class="hover-effect-underline text-dark-emphasis text-decoration-none" href="https://createx.studio/" target="_blank" rel="noreferrer">Createx Studio</a>
            </p> -->
          </footer>
        </div>


        <!-- Cover image visible on screens > 992px wide (lg breakpoint) -->
        <div class="d-none d-lg-block w-100 py-4 ms-auto" style="max-width: 1034px">
          <div class="d-flex flex-column justify-content-end h-100 bg-info-subtle rounded-5">
            <div class="ratio" style="--fn-aspect-ratio: calc(1030 / 1032 * 100%)">
              <img src="assets/img/account/account-cover.png" alt="Girl">
            </div>
          </div>
        </div>
      </div>
    </main>


    <!-- Customizer toggle -->
    <div class="floating-buttons position-fixed top-50 end-0 z-sticky me-3 me-xl-4 pb-4">
     
    </div>


    <!-- Bootstrap + Theme scripts -->
    <script src="assets/js/theme.min.js"></script>
  

</body>
<!-- Mirrored from finder-html.createx.studio/account-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 17 Jan 2025 11:31:13 GMT -->
</html>