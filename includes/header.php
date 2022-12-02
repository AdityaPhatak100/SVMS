    <style>
        body {
            font-family: sans-serif;
            background-color: <?php echo $_COOKIE['theme']; ?>;
        }

        .navbar-brand {
            font-size: 36px;
        }

        .navbar-nav .nav-item:hover {
            background-color: rgba(180, 190, 203, 0.4);
        }
        a {
            text-decoration: none;
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="dashboard.php">
                <h1 class="navbar-brand mb-0">SVMS</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-md-auto gap-2">
                    <li class="nav-item rounded">
                        <a class="nav-link active" aria-current="page" href="dashboard.php"><i class="bi bi-house-fill me-2"></i>Home</a>
                    </li>
                    <li class="nav-item rounded">
                        <a class="nav-link" href="newvisitor.php">New Visitor</a>
                    </li>
                    <li class="nav-item rounded">
                        <a class="nav-link" href="managevisitors.php">Manage Visitors</a>
                    </li>
                    <li class="nav-item rounded">
                        <a class="nav-link" href="expectingguests.php">Expecting Guests</a>
                    </li>
                    <li class="nav-item rounded">
                        <a class="nav-link" href="societymembers.php">Society Members</a>
                    </li>
                    <li class="nav-item dropdown rounded">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill me-4"></i>Admin</a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="viewprofile.php">View Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>