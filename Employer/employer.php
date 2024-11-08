<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlexMatch</title>
    <style>
        /* General styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header */
        header {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .logo {
            margin: 0 10px;
            border-radius: 50%;
        }

        h1 {
            font-size: 2rem;
            letter-spacing: 2px;
        }

        /* Right-side links */
        .header-links {
            display: flex;
            gap: 20px;
        }

        .header-links a {
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .header-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #0097a7; /* Light Blue */
        }

        /* Sidebar toggle button */
        .toggle-btn {
            background-color: #37474f; /* Dark Greyish Blue */
            border: none;
            color: #fff;
            padding: 0.3rem 0.8rem;
            margin: 20px;
            cursor: pointer;
            position: absolute;
            left: 10px;
            border-radius: 5px;
            transition: background 0.3s;
            font-size: 1.3rem;
        }

        .toggle-btn:hover {
            background-color: #263238; /* Darker greyish blue */
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: #1a2a3a; /* Dark Techy Blue */
            color: #fff;
            position: fixed;
            top: 0;
            left: -280px;
            height: 100%;
            overflow-y: auto;
            transition: left 0.4s ease, box-shadow 0.4s ease;
            padding-top: 60px;
            box-shadow: 10px 0 30px rgba(0, 0, 0, 0.3);
            border-right: 3px solid #444;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 1.2rem;
            text-align: left;
            font-weight: 600;
            font-size: 1.2rem;
            margin: 10px;
            transition: transform 0.3s ease, background-color 0.3s ease;
            border-radius: 8px;
            position: relative;
            overflow: hidden;
            border-left: 3px solid transparent;
            cursor: pointer;
        }

        /* Accent colors adjusted to match sidebar */
        .sidebar ul li:nth-child(1) {
            border-color: #0097a7; /* Lighter Blue */
            background-color: rgba(0, 151, 167, 0.1);
        }
        .sidebar ul li:nth-child(2) {
            border-color: #388e3c; /* Muted Green */
            background-color: rgba(56, 142, 60, 0.1);
        }
        .sidebar ul li:nth-child(3) {
            border-color: #f50057; /* Soft Neon Pink */
            background-color: rgba(245, 0, 87, 0.1);
        }
        .sidebar ul li:nth-child(4) {
            border-color: #8e24aa; /* Muted Purple */
            background-color: rgba(142, 36, 170, 0.1);
        }

        /* Link and icon styles */
        .sidebar ul li a {
            text-decoration: none;
            color: #e0e0e0;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 2px;
            transition: color 0.3s ease;
        }

        .sidebar ul li a:hover {
            color: #ffffff;
        }

        /* Sidebar icon styling */
        .sidebar-icon {
            font-size: 1.8rem;
            color: #a8b0b9;
        }

        /* Bottom pattern or line decoration */
        .sidebar ul li::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: rgba(255, 255, 255, 0.3);
            transition: background-color 0.3s;
        }

        .sidebar ul li:hover::after {
            background-color: #ffffff;
        }

        /* Hover effect */
        .sidebar ul li:hover {
            background-color: rgba(0, 151, 167, 0.2);
            transform: scale(1.05);
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.3);
        }

        /* Close button in sidebar */
        .close-btn {
            background-color: transparent;
            border: none;
            color: #a8b0b9;
            padding: 0.3rem 0.8rem;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            transition: color 0.3s;
        }

        .close-btn:hover {
            color: #ffffff;
        }

        /* Main content */
        .content {
            flex: 1;
            padding: 2rem;
            margin-left: 0;
            transition: margin-left 0.3s ease;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }

        /* Active sidebar styles */
        .sidebar-visible .sidebar {
            left: 0;
        }

        .sidebar-visible .content {
            margin-left: 280px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .sidebar {
                width: 220px;
                left: -220px;
            }

            .sidebar-visible .content {
                margin-left: 220px;
            }
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <div style="display: flex; align-items: center;">
            <!-- Replace the hamburger icon with the logo image, but still clickable -->
            <img class="logo" src="../images/logo.jpg" alt="FlexMatch" width="50" height="44" onclick="toggleSidebar()" style="cursor: pointer;">
            <h1>FlexMatch</h1>
        </div>
        <!-- Right-side links -->
        <div class="header-links">
            <a href="#">Report</a>
            <a href="#">Message</a>
            <a href="#">Profile</a>
        </div>
    </header>

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <button class="close-btn" onclick="toggleSidebar()">×</button>
        <ul>
            <li><a href="#">+ Create Job</a></li>
            <li><a href="#">Job Application</a></li>
            <li><a href="#">Job-Seeker Wall</a></li>
        </ul>
    </nav>

    <!-- JavaScript for Sidebar Toggle -->
    <script>
        function toggleSidebar() {
            document.body.classList.toggle('sidebar-visible');
        }
    </script>
</body>
</html>
