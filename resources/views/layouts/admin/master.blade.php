<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link
      rel="shortcut icon"
      href="{{ asset('crud/admin/assets/compiled/svg/favicon.svg') }}"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAEs2lUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iWE1QIENvcmUgNS41LjAiPgogPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4KICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iCiAgICB4bWxuczp0aWZmPSJodHRwOi8vbnMuYWRvYmUuY29tL3RpZmYvMS4wLyIKICAgIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIKICAgIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIKICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIKICAgZXhpZjpQaXhlbFhEaW1lbnNpb249IjMzIgogICBleGlmOlBpeGVsWURpbWVuc2lvbj0iMzQiCiAgIGV4aWY6Q29sb3JTcGFjZT0iMSIKICAgdGlmZjpJbWFnZVdpZHRoPSIzMyIKICAgdGlmZjpJbWFnZUxlbmd0aD0iMzQiCiAgIHRpZmY6UmVzb2x1dGlvblVuaXQ9IjIiCiAgIHRpZmY6WFJlc29sdXRpb249Ijk2LjAiCiAgIHRpZmY6WVJlc29sdXRpb249Ijk2LjAiCiAgIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiCiAgIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJzUkdCIElFQzYxOTY2LTIuMSIKICAgeG1wOk1vZGlmeURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiCiAgIHhtcDpNZXRhZGF0YURhdGU9IjIwMjItMDMtMzFUMTA6NTA6MjMrMDI6MDAiPgogICA8eG1wTU06SGlzdG9yeT4KICAgIDxyZGY6U2VxPgogICAgIDxyZGY6bGkKICAgICAgc3RFdnQ6YWN0aW9uPSJwcm9kdWNlZCIKICAgICAgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWZmaW5pdHkgRGVzaWduZXIgMS4xMC4xIgogICAgICBzdEV2dDp3aGVuPSIyMDIyLTAzLTMxVDEwOjUwOjIzKzAyOjAwIi8+CiAgICA8L3JkZjpTZXE+CiAgIDwveG1wTU06SGlzdG9yeT4KICA8L3JkZjpEZXNjcmlwdGlvbj4KIDwvcmRmOlJERj4KPC94OnhtcG1ldGE+Cjw/eHBhY2tldCBlbmQ9InIiPz5V57uAAAABgmlDQ1BzUkdCIElFQzYxOTY2LTIuMQAAKJF1kc8rRFEUxz9maORHo1hYKC9hISNGTWwsRn4VFmOUX5uZZ36oeTOv954kW2WrKLHxa8FfwFZZK0WkZClrYoOe87ypmWTO7dzzud97z+nec8ETzaiaWd4NWtYyIiNhZWZ2TvE946WZSjqoj6mmPjE1HKWkfdxR5sSbgFOr9Ll/rXoxYapQVik8oOqGJTwqPL5i6Q5vCzeo6dii8KlwpyEXFL519LjLLw6nXP5y2IhGBsFTJ6ykijhexGra0ITl5bRqmWU1fx/nJTWJ7PSUxBbxJkwijBBGYYwhBgnRQ7/MIQIE6ZIVJfK7f/MnyUmuKrPOKgZLpEhj0SnqslRPSEyKnpCRYdXp/9++msneoFu9JgwVT7b91ga+LfjetO3PQ9v+PgLvI1xkC/m5A+h7F32zoLXug38dzi4LWnwHzjeg8UGPGbFfySvuSSbh9QRqZ6H+Gqrm3Z7l9zm+h+iafNUV7O5Bu5z3L/wAdthn7QIme0YAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAJTSURBVFiF7Zi9axRBGIefEw2IdxFBRQsLWUTBaywSK4ubdSGVIY1Y6HZql8ZKCGIqwX/AYLmCgVQKfiDn7jZeEQMWfsSAHAiKqPiB5mIgELWYOW5vzc3O7niHhT/YZvY37/swM/vOzJbIqVq9uQ04CYwCI8AhYAlYAB4Dc7HnrOSJWcoJcBS4ARzQ2F4BZ2LPmTeNuykHwEWgkQGAet9QfiMZjUSt3hwD7psGTWgs9pwH1hC1enMYeA7sKwDxBqjGnvNdZzKZjqmCAKh+U1kmEwi3IEBbIsugnY5avTkEtIAtFhBrQCX2nLVehqyRqFoCAAwBh3WGLAhbgCRIYYinwLolwLqKUwwi9pxV4KUlxKKKUwxC6ZElRCPLYAJxGfhSEOCz6m8HEXvOB2CyIMSk6m8HoXQTmMkJcA2YNTHm3congOvATo3tE3A29pxbpnFzQSiQPcB55IFmFNgFfEQeahaAGZMpsIJIAZWAHcDX2HN+2cT6r39GxmvC9aPNwH5gO1BOPFuBVWAZue0vA9+A12EgjPadnhCuH1WAE8ivYAQ4ohKaagV4gvxi5oG7YSA2vApsCOH60WngKrA3R9IsvQUuhIGY00K4flQG7gHH/mLytB4C42EgfrQb0mV7us8AAMeBS8mGNMR4nwHamtBB7B4QRNdaS0M8GxDEog7iyoAguvJ0QYSBuAOcAt71Kfl7wA8DcTvZ2KtOlJEr+ByyQtqqhTyHTIeB+ONeqi3brh+VgIN0fohUgWGggizZFTplu12yW8iy/YLOGWMpDMTPXnl+Az9vj2HERYqPAAAAAElFTkSuQmCC"
      type="image/png"
    />
    <link
      rel="stylesheet"
      href="{{ asset('crud/admin/assets/extensions/simple-datatables/style.css') }}"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- data table printout --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('crud/admin/assets/compiled/css/table-datatable.css') }}" />
    <link rel="stylesheet" href="{{ asset('crud/admin/assets/compiled/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('crud/admin/assets/compiled/css/app-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('crud/admin/assets/compiled/css/iconly.css') }}" />
  </head>

  <body>
    <script src="{{ asset('crud/admin/assets/static/js/initTheme.js') }}"></script>
    <div id="app">

        {{-- Sidebar --}}
        <div id="sidebar">
          <div class="sidebar-wrapper active">
            <div class="sidebar-header position-relative">
              <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                  <a href="index.html"
                    ><img
                      src="./assets/compiled/svg/logo.svg"
                      alt="Logo"
                      srcset=""
                  /></a>
                </div>
                <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    aria-hidden="true"
                    role="img"
                    class="iconify iconify--system-uicons"
                    width="20"
                    height="20"
                    preserveAspectRatio="xMidYMid meet"
                    viewBox="0 0 21 21"
                  >
                    <g
                      fill="none"
                      fill-rule="evenodd"
                      stroke="currentColor"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    >
                      <path
                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                        opacity=".3"
                      ></path>
                      <g transform="translate(-210 -1)">
                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                        <circle cx="220.5" cy="11.5" r="4"></circle>
                        <path
                          d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"
                        ></path>
                      </g>
                    </g>
                  </svg>
                  <div class="form-check form-switch fs-6">
                    <input
                      class="form-check-input me-0"
                      type="checkbox"
                      id="toggle-dark"
                      style="cursor: pointer"
                    />
                    <label class="form-check-label"></label>
                  </div>
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    aria-hidden="true"
                    role="img"
                    class="iconify iconify--mdi"
                    width="20"
                    height="20"
                    preserveAspectRatio="xMidYMid meet"
                    viewBox="0 0 24 24"
                  >
                    <path
                      fill="currentColor"
                      d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"
                    ></path>
                  </svg>
                </div>
                <div class="sidebar-toggler x">
                  <a href="#" class="sidebar-hide d-xl-none d-block"
                    ><i class="bi bi-x bi-middle"></i
                  ></a>
                </div>
              </div>
            </div>
            <div class="sidebar-menu">
              <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item">
                  <a href="index.html" class="sidebar-link">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                  </a>
                </li>

                <li class="sidebar-item has-sub">
                  <a href="#" class="sidebar-link">
                    <i class="bi bi-stack"></i>
                    <span>Components</span>
                  </a>

                  <ul class="submenu">
                    <li class="submenu-item">
                      <a href="{{ url('products') }}" class="submenu-link"
                        >Products</a
                      >
                    </li>

                    <li class="submenu-item">
                      <a href="{{ url('suppliers') }}" class="submenu-link"
                        >Suppliers</a
                      >
                    </li>
                    <li class="submenu-item">
                        <a href="{{ url('customers') }}" class="submenu-link"
                          >Customers</a
                        >
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
        {{-- @include('layouts/admin/sidebar') --}}

        {{-- Navbar --}}
        <div id="main" class="layout-navbar navbar-fixed">
            {{-- Header --}}
          <header>
            <nav class="navbar navbar-expand navbar-light navbar-top">
              <div class="container-fluid">
                <a href="#" class="burger-btn d-block">
                  <i class="bi bi-justify fs-3"></i>
                </a>

                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-lg-0">
                    <li class="nav-item dropdown me-1">
                      <a
                        class="nav-link active dropdown-toggle text-gray-600"
                        href="#"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                      >
                        <i class="bi bi-envelope bi-sub fs-4"></i>
                      </a>
                      <ul
                        class="dropdown-menu dropdown-menu-end"
                        aria-labelledby="dropdownMenuButton"
                      >
                        <li>
                          <h6 class="dropdown-header">Mail</h6>
                        </li>
                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                      </ul>
                    </li>
                    <li class="nav-item dropdown me-3">
                      <a
                        class="nav-link active dropdown-toggle text-gray-600"
                        href="#"
                        data-bs-toggle="dropdown"
                        data-bs-display="static"
                        aria-expanded="false"
                      >
                        <i class="bi bi-bell bi-sub fs-4"></i>
                        <span class="badge badge-notification bg-danger">7</span>
                      </a>
                      <ul
                        class="dropdown-menu dropdown-menu-end notification-dropdown"
                        aria-labelledby="dropdownMenuButton"
                      >
                        <li class="dropdown-header">
                          <h6>Notifications</h6>
                        </li>
                        <li class="dropdown-item notification-item">
                          <a class="d-flex align-items-center" href="#">
                            <div class="notification-icon bg-primary">
                              <i class="bi bi-cart-check"></i>
                            </div>
                            <div class="notification-text ms-4">
                              <p class="notification-title font-bold">
                                Successfully check out
                              </p>
                              <p class="notification-subtitle font-thin text-sm">
                                Order ID #256
                              </p>
                            </div>
                          </a>
                        </li>
                        <li class="dropdown-item notification-item">
                          <a class="d-flex align-items-center" href="#">
                            <div class="notification-icon bg-success">
                              <i class="bi bi-file-earmark-check"></i>
                            </div>
                            <div class="notification-text ms-4">
                              <p class="notification-title font-bold">
                                Homework submitted
                              </p>
                              <p class="notification-subtitle font-thin text-sm">
                                Algebra math homework
                              </p>
                            </div>
                          </a>
                        </li>
                        <li>
                          <p class="text-center py-2 mb-0">
                            <a href="#">See all notification</a>
                          </p>
                        </li>
                      </ul>
                    </li>
                  </ul>
                  <div class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                          <h6 class="mb-0 text-gray-600">John Ducky</h6>
                          <p class="mb-0 text-sm text-gray-600">Administrator</p>
                        </div>
                        <div class="user-img d-flex align-items-center">
                          <div class="avatar avatar-md">
                            <img src="./assets/compiled/jpg/1.jpg" />
                          </div>
                        </div>
                      </div>
                    </a>
                    <ul
                      class="dropdown-menu dropdown-menu-end"
                      aria-labelledby="dropdownMenuButton"
                      style="min-width: 11rem"
                    >
                      <li>
                        <h6 class="dropdown-header">Hello, John!</h6>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#"
                          ><i class="icon-mid bi bi-person me-2"></i> My
                          Profile</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item" href="#"
                          ><i class="icon-mid bi bi-gear me-2"></i> Settings</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item" href="#"
                          ><i class="icon-mid bi bi-wallet me-2"></i> Wallet</a
                        >
                      </li>
                      <li>
                        <hr class="dropdown-divider" />
                      </li>
                      <li>
                        <a class="dropdown-item" href="#"
                          ><i class="icon-mid bi bi-box-arrow-left me-2"></i>
                          Logout</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </header>

          {{-- Content --}}
          <div id="main-content">

            @yield('content')
            {{-- <div class="page-heading">
              <div class="page-title">
                <div class="row">
                  <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Vertical Layout with Navbar</h3>
                    <p class="text-subtitle text-muted">
                      Navbar will appear on the top of the page.
                    </p>
                  </div>
                  <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav
                      aria-label="breadcrumb"
                      class="breadcrumb-header float-start float-lg-end"
                    >
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                          Layout Vertical Navbar
                        </li>
                      </ol>
                    </nav>
                  </div>
                </div>
              </div>
              <section class="section">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">About Vertical Navbar</h4>
                  </div>
                  <div class="card-body">
                    <p>
                      Vertical Navbar is a layout option that you can use with
                      Mazer.
                    </p>

                    <p>
                      In case you want the navbar to be sticky on top while
                      scrolling, add <code>.navbar-fixed</code> class alongside
                      with <code>.layout-navbar</code> class.
                    </p>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Dummy Text</h4>
                  </div>
                  <div class="card-body">
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. In
                      mollis tincidunt tempus. Duis vitae facilisis enim, at
                      rutrum lacus. Nam at nisl ut ex egestas placerat sodales id
                      quam. Aenean sit amet nibh quis lacus pellentesque venenatis
                      vitae at justo. Orci varius natoque penatibus et magnis dis
                      parturient montes, nascetur ridiculus mus. Suspendisse
                      venenatis tincidunt odio ut rutrum. Maecenas ut urna
                      venenatis, dapibus tortor sed, ultrices justo. Phasellus
                      scelerisque, nibh quis gravida venenatis, nibh mi lacinia
                      est, et porta purus nisi eget nibh. Fusce pretium vestibulum
                      sagittis. Donec sodales velit cursus convallis sollicitudin.
                      Nunc vel scelerisque elit, eget facilisis tellus. Donec id
                      molestie ipsum. Nunc tincidunt tellus sed felis vulputate
                      euismod.
                    </p>
                    <p>
                      Proin accumsan nec arcu sit amet volutpat. Proin non risus
                      luctus, tempus quam quis, volutpat orci. Phasellus commodo
                      arcu dui, ut convallis quam sodales maximus. Aenean
                      sollicitudin massa a quam fermentum, et efficitur metus
                      convallis. Curabitur nec laoreet ipsum, eu congue sem. Nunc
                      pellentesque quis erat at gravida. Vestibulum dapibus
                      efficitur felis, vel luctus libero congue eget. Donec mollis
                      pellentesque arcu, eu commodo nunc porta sit amet. In
                      commodo augue id mauris tempor, sed dignissim nulla
                      facilisis. Ut non mattis justo, ut placerat justo.
                      Vestibulum scelerisque cursus facilisis. Suspendisse velit
                      justo, scelerisque ac ultrices eu, consectetur ac odio.
                    </p>
                    <p>
                      In pharetra quam vel lobortis fermentum. Nulla vel risus ut
                      sapien porttitor volutpat eu ac lorem. Vestibulum porta elit
                      magna, ut ultrices sem fermentum ut. Vestibulum blandit eros
                      ut imperdiet porttitor. Pellentesque tempus nunc sed augue
                      auctor eleifend. Sed nisi sem, lobortis eget faucibus
                      placerat, hendrerit vitae elit. Vestibulum elit orci,
                      pretium vel libero at, imperdiet congue lectus. Praesent
                      rutrum id turpis non aliquam. Cras dignissim, metus vitae
                      aliquam faucibus, elit augue dignissim nulla, bibendum
                      consectetur leo libero a tortor. Vestibulum non tincidunt
                      nibh. Ut imperdiet elit vel vehicula ultricies. Nulla
                      maximus justo sit amet fringilla laoreet. Aliquam malesuada
                      diam in augue mattis aliquam. Pellentesque id eros
                      dignissim, dapibus sem ac, molestie dolor. Mauris purus
                      lacus, tempor sit amet vestibulum vitae, ultrices eu urna.
                    </p>
                  </div>
                </div>
              </section>
            </div> --}}

          </div>

          {{-- Footer --}}
          <footer>
            <div class="footer clearfix mb-0 text-muted">
              <div class="float-start">
                <p>2023 &copy; Mazer</p>
              </div>
              <div class="float-end">
                <p>
                  Crafted with
                  <span class="text-danger"
                    ><i class="bi bi-heart-fill icon-mid"></i
                  ></span>
                  by <a href="https://saugi.me">Saugi</a>
                </p>
              </div>
            </div>
          </footer>
        </div>
      </div>
    <script src="{{ asset('crud/admin/assets/static/js/components/dark.js') }}"></script>
    <script src="{{ asset('crud/admin/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <script src="{{ asset('crud/admin/assets/compiled/js/app.js') }}"></script>

    <!-- Need: Apexcharts -->
    <script src="{{ asset('crud/admin/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('crud/admin/assets/static/js/pages/dashboard.js') }}"></script>

    {{-- data table  --}}
    <script src="{{ asset('crud/admin/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('crud/admin/assets/static/js/pages/simple-datatables.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table2').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>
  </body>
</html>
