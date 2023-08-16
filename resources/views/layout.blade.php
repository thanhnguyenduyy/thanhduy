<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column" style="list-style: none; padding: 0 40px 0 0;">
                        <li class="nav-item">
                            <a class="nav-link active text-decoration" href="#">
                                <i class="fas fa-home icon"> {{ Auth::user()->name }}</i>
                            </a>
                        </li>
                        <br>
                        <li class="nav-item">
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            
                                <a class="dropdown-item text-decoration" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"> Logout</i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        
                        
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
                @yield('body')
            </main>
        </div>
    </div>

<style>
        /* Custom CSS for Admin Layout */
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
            padding: 20px;
            background-color: #343a40;
            color: #fff;
        }

        .sidebar a {
            color: #fff;
        }

        .sidebar a:hover {
            color: #ffc107;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
        }

        .sidebar .nav-link .icon {
            margin-right: 10px;
        }

        .sidebar .nav-submenu {
            display: none;
        }

        .main-content {
            margin-left: 240px;
            padding: 20px;
        }

        .border-bottom {
            border-bottom: 1px solid #dee2e6;
        }

        .text-decoration{
            text-decoration: none;
        }
        
        .margin10{
            margin-top: 10px;
        }
    </style>
</body>

</html>
