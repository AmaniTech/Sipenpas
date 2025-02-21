<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sipenpas | Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="RideMediaCorporindo" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous"/>
    <link rel="stylesheet" href="/dist/css/adminlte.css" />
    <link rel="icon" href="/storage/logo/{{DB::table('setting')->where('id', 1)->value('logo')}}" type="image/x-icon">
    <style>
        body {
            background-image: url('/background.jpg'); 
            background-size: cover; 
            background-position: center; 
        }
    </style>

  </head>
  <body class="login-page bg-body-secondary">
    @include('sweetalert::alert')
    <div class="login-box">
      <div class="card card-outline card-primary">
        <div class="card-header d-flex flex-column align-items-center justify-content-center">
          <a href="/" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
            <img src="/storage/logo/{{DB::table('setting')->where('id', 1)->value('logo')}}" alt="Logo" class="img-fluid mb-3" style="max-width: 130px;">
            <h3 class="mb-0"><b>SIMPENPAS</b></h3>
          </a>
        </div>
        <div class="card-body login-card-body">
          <form action="/login" method="POST">
            @csrf 
            <div class="input-group mb-1">
                <div class="form-floating">
                    <input id="loginEmail" type="text" class="form-control" name="name"/>
                    <label for="loginEmail">Username</label>
                </div>
                <div class="input-group-text"><i class="bi bi-person"></i></div>
            </div>
            <div class="input-group mb-1">
                <div class="form-floating">
                    <input id="loginPassword" type="password" class="form-control"  name="password"/>
                    <label for="loginPassword">Password</label>
                </div>
                <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
            </div>
            <div class="row mt-3">
                <div class="col d-flex justify-content-center">
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                </div>
            </div>

          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js" integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="/dist/js/adminlte.js"></script>
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
  </body>
</html>
