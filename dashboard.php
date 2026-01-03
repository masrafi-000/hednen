<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* --- CSS Reset & Variables --- */
        :root {
            --header-height: 60px;
            --sidebar-width: 250px;
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --text-light: #ecf0f1;
            --bg-light: #f4f6f7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        /* --- Layout Grid --- */
        .dashboard-container {
            display: grid;
            grid-template-columns: var(--sidebar-width) 1fr;
            grid-template-rows: var(--header-height) 1fr;
            grid-template-areas:
                "header header"
                "aside main";
            height: 100vh;
            width: 100vw;
            overflow: hidden;
        }

        /* --- Header --- */
        header {
            grid-area: header;
            background-color: var(--primary-color);
            color: var(--text-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 101;
            /* সাইডবারের উপরে থাকার জন্য */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .menu-btn {
            display: none;
            /* ডেস্কটপে হাইড থাকবে */
            cursor: pointer;
            font-size: 24px;
            user-select: none;
        }

        /* --- Sidebar (Aside) --- */
        aside {
            grid-area: aside;
            background-color: var(--secondary-color);
            color: var(--text-light);
            display: flex;
            flex-direction: column;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease-in-out;
            z-index: 100;
        }

        aside ul {
            list-style: none;
            padding-top: 10px;
        }

        aside li {
            padding: 15px 20px;
            cursor: pointer;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            transition: background 0.2s;
        }

        aside li:hover,
        aside li.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #3498db;
        }

        /* --- Main Content --- */
        main {
            grid-area: main;
            background-color: var(--bg-light);
            padding: 20px;
            overflow-y: auto;
            /* কন্টেন্ট বাড়লে স্ক্রল হবে */
            position: relative;
        }

        /* কন্টেন্ট কার্ড ডিজাইন */
        .content-card {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            animation: fadeIn 0.4s ease-in;
        }

        h1 {
            margin-bottom: 15px;
            color: #333;
        }

        p {
            line-height: 1.6;
            color: #666;
        }

        /* এনিমেশন */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* --- Mobile Overlay (Black Shade) --- */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 99;
            opacity: 0;
            transition: opacity 0.3s;
        }

        /* --- Responsive Design (Mobile) --- */
        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;
                /* সাইডবারের কলাম বাদ */
                grid-template-areas:
                    "header"
                    "main";
            }

            .menu-btn {
                display: block;
            }

            /* মোবাইল মেনু বাটন শো */

            /* সাইডবার লুকানো এবং ফিক্সড পজিশন */
            aside {
                position: fixed;
                top: var(--header-height);
                left: 0;
                bottom: 0;
                width: var(--sidebar-width);
                transform: translateX(-100%);
                /* স্ক্রিনের বাইরে */
                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
            }

            /* যখন মেনু ওপেন হবে */
            aside.show {
                transform: translateX(0);
                /* স্ক্রিনের ভেতরে */
            }

            /* ওভারলে ভিজিবল করা */
            .overlay.show {
                display: block;
                opacity: 1;
            }
        }
    </style>
</head>

<body>

    <div class="dashboard-container ">

        <!-- Header -->
        <header>
            <div class="brand">
                <span class="menu-btn" onclick="toggleSidebar()">☰</span>
                <h3>AdminPanel</h3>
            </div>
            <div class="user-info">User: <b>Admin</b></div>
        </header>

        <!-- Sidebar -->
        <aside id="sidebar">
            <nav>
                <ul>
                    <!-- onclick ফাংশন দিয়ে আমরা কন্টেন্ট লোড করবো -->
                    <li onclick="loadPage('dashboard', this)" class="active">Dashboard</li>
                    <li onclick="loadPage('analytics', this)">Analytics</li>
                    <li onclick="loadPage('messages', this)">Messages</li>
                    <li onclick="loadPage('settings', this)">Settings</li>
                </ul>
            </nav>
        </aside>

        <!-- Overlay for Mobile -->
        <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

        <!-- Main Content -->
        <main id="main-content">
            <!-- ডিফল্ট কন্টেন্ট লোড হবে জাভাস্ক্রিপ্ট দিয়ে -->
        </main>

    </div>

    <script>
        // ১. কন্টেন্ট ডাটাবেস (সিমুলেশন)
        // প্রফেশনাল ক্ষেত্রে এগুলো সার্ভার থেকে আসবে, কিন্তু এখানে আমরা অবজেক্ট ব্যবহার করছি
        const pages = {
            dashboard: `
                <h1>Dashboard Overview</h1>
               <?php get_template_part('template-parts/dashboard/dashboard'); ?>
            `,
            analytics: `
                <h1>Analytics Reports</h1>
                <div class="content-card">
                    <h3>Traffic Stats</h3>
                    <p>Visitors: 12,000 <br> Bounce Rate: 45%</p>
                </div>
                <div class="content-card" style="height: 400px;">
                    <h3>Graph View</h3>
                    <p>Detailed graph showing monthly growth.</p>
                </div>
            `,
            messages: `
                <h1>Messages</h1>
                <div class="content-card">
                    <h3>Inbox (2)</h3>
                    <p><strong>John Doe:</strong> Hey, is the dashboard ready?</p>
                    <hr style="margin: 10px 0; border: 0; border-top: 1px solid #eee;">
                    <p><strong>Jane Smith:</strong> Please update the sidebar menu.</p>
                </div>
            `,
            settings: `
                <h1>Settings</h1>
                <div class="content-card">
                    <h3>Profile Settings</h3>
                    <p>Change your password or update email.</p>
                    <button style="padding: 8px 15px; margin-top: 10px; cursor: pointer;">Update</button>
                </div>
                <div class="content-card">
                    <h3>Appearance</h3>
                    <p>Toggle Dark/Light mode.</p>
                </div>
            `
        };

        // DOM Elements
        const mainContent = document.getElementById('main-content');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const menuItems = document.querySelectorAll('aside li');

        // ২. পেজ লোড ফাংশন
        function loadPage(pageName, element) {
            // কন্টেন্ট চেঞ্জ করা
            if (pages[pageName]) {
                mainContent.innerHTML = pages[pageName];
            } else {
                mainContent.innerHTML = "<h1>404</h1><p>Page not found</p>";
            }

            // একটিভ ক্লাস হ্যান্ডেল করা (Sidebar highlight)
            menuItems.forEach(item => item.classList.remove('active'));
            if (element) element.classList.add('active');

            // মোবাইলে থাকলে পেজ চেঞ্জ হওয়ার পর মেনু বন্ধ করে দেওয়া
            if (window.innerWidth <= 768) {
                closeSidebar();
            }
        }

        // ৩. সাইডবার টগল ফাংশন (মোবাইলের জন্য)
        function toggleSidebar() {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        }

        function closeSidebar() {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        }

        // ৪. ডিফল্ট লোড (প্রথমবার পেজ ওপেন হলে)
        // Dashboard পেজটি লোড হবে
        loadPage('dashboard', document.querySelector('aside li'));
    </script>
</body>

</html>