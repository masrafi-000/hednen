<?php

/**
 * Template Name: Agent Dashboard
 * Enqueue parent and child theme stylesheets, Tailwind CSS, and custom dashboard JS.
 */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        :root {
            --header-height: 60px;
            --sidebar-width: 250px;
            --primary-color: #368038;
            --secondary-color: #368038;
            --text-light: #ecf0f1;
            --bg-light: #f4f6f7;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }


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


        header {
            grid-area: header;
            background-color: var(--primary-color);
            color: var(--text-light);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 101;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .menu-btn {
            display: none;
            cursor: pointer;
            font-size: 24px;
            user-select: none;
        }


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


        main {
            grid-area: main;
            background-color: var(--bg-light);
            padding: 20px;
            overflow-y: auto;
            position: relative;
        }

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


        @media (max-width: 768px) {
            .dashboard-container {
                grid-template-columns: 1fr;

                grid-template-areas:
                    "header"
                    "main";
            }

            .menu-btn {
                display: block;
            }


            aside {
                position: fixed;
                top: var(--header-height);
                left: 0;
                bottom: 0;
                width: var(--sidebar-width);
                transform: translateX(-100%);

                box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
            }


            aside.show {
                transform: translateX(0);

            }


            .overlay.show {
                display: block;
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="dashboard-container ">


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

                    <li onclick="loadPage('dashboard', this)" class="active">Dashboard</li>
                    <li onclick="loadPage('property_listing', this)">Property Listing</li>
                    <li onclick="loadPage('messages', this)">Messages</li>
                    <li onclick="loadPage('settings', this)">Settings</li>
                </ul>
            </nav>
        </aside>

        <!-- Overlay for Mobile -->
        <div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

        <!-- Main Content -->
        <main id="main-content">

        </main>

    </div>

    <script>
        const pages = {
            dashboard: `
              
               <?php get_template_part('template-parts/dashboard/dashboard'); ?>
            `,
            property_listing: `
                <?php get_template_part('template-parts/dashboard/property_listing'); ?>
                <?php get_template_part('template-parts/dashboard/agent_property_listing_form'); ?>
            `,
            messages: `
                <?php get_template_part('template-parts/dashboard/messages'); ?>
            `,
            settings: `
                <?php get_template_part('template-parts/dashboard/settings'); ?>
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

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Image Preview
            $('#dropzone-file').on('change', function() {
                var files = this.files;
                $('#image-preview-container').empty();
                if (files.length > 5) {
                    alert("Max 5 images allowed");
                    this.value = '';
                    return;
                }
                $.each(files, function(i, file) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image-preview-container').append('<img src="' + e.target.result + '" class="preview-img">');
                    }
                    reader.readAsDataURL(file);
                });
            });

            // AJAX Submit
            $('#property-listing-form').on('submit', function(e) {
                e.preventDefault();
                var $btn = $('#submit-btn');
                var $msg = $('#form-message');
                var formData = new FormData(this);
                formData.append('action', 'submit_property_listing'); // Must match PHP action

                $btn.prop('disabled', true).text('Processing...');
                $msg.text('');

                $.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>', // AJAX URL inside Template Part works fine
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.success) {
                            $msg.css('color', 'green').text(res.data.message);
                            $('#property-listing-form')[0].reset();
                            $('#image-preview-container').empty();
                        } else {
                            $msg.css('color', 'red').text(res.data.message);
                        }
                    },
                    error: function() {
                        $msg.css('color', 'red').text('Server Error');
                    },
                    complete: function() {
                        $btn.prop('disabled', false).text('Submit Listing');
                    }
                });
            });
        });
    </script>
</body>

</html>