 
        const pages = {
            dashboard: `
              
               <?php get_template_part('template-parts/dashboard/dashboard'); ?>
            `,
            property_listing: `
                <?php get_template_part('template-parts/dashboard/property_listing'); ?>
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

      
        loadPage('dashboard', document.querySelector('aside li'));
