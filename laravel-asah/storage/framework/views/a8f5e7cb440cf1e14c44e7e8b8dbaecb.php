<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Manajemen Kampus'); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&display=swap" rel="stylesheet">



    <style>
        :root {
            --bg-color: #F6F3FB;
            --primary-color: #7C3AED;
            --primary-hover: #6D28D9;
            --secondary-color: #E9D8FD;
            --card-bg-color: #FFFFFF;
            --text-color: #4B5563;
            --heading-color: #1F2937;
            --border-color: #D1D5DB;
            --error-bg: #FEE2E2;
            --error-text: #B91C1C;
            --success-bg: #D1FAE5;
            --success-text: #065F46;
        }

        /* Dark mode overrides */
        html.dark {
            --bg-color: #1E1B2E;
            --card-bg-color: #2A213C;
            --text-color: #E2E8F0;
            --heading-color: #F8FAFC;
            --border-color: #4B5563;
            --secondary-color: #3F3A59;
            --error-bg: #7F1D1D;
            --error-text: #FCA5A5;
            --success-bg: #14532D;
            --success-text: #BBF7D0;
        }

        body {
            font-family: 'Sora', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 40px 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 50px;
            background-color: var(--card-bg-color);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.05);
        }

        h1, h2, h3 {
            color: var(--heading-color);
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }

        form label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
        }

        form input[type="text"],
        form select {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: #FAF5FF;
            box-sizing: border-box;
            font-family: inherit;
            font-size: 16px;
            line-height: 1.5;
            appearance: none;
        }

        form input[type="text"]:focus,
        form select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px var(--secondary-color);
            background: white;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background-color: var(--primary-color);
            color: white;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: var(--primary-hover);
        }

        .alert-error {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: var(--error-bg);
            color: var(--error-text);
        }

        .alert-error ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert-success {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: var(--success-bg);
            color: var(--success-text);
            border: 1px solid #A7F3D0;
        }

        .btn-add {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 8px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .btn-add:hover {
            background-color: var(--primary-hover);
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .data-table th, .data-table td {
            padding: 18px 24px;
            border: 1px solid var(--border-color);
            text-align: left;
        }

        .data-table thead {
            background-color: var(--secondary-color);
        }

        .data-table th {
            font-weight: 700;
            color: var(--heading-color);
        }

        .data-table tbody tr:nth-of-type(even) {
            background-color: #F4F3F7;
        }

        html.dark .data-table tbody tr:nth-of-type(even) {
            background-color: #2F2A44;
        }

        .data-table tbody tr:hover {
            background-color: #EDE9FE;
            transition: background-color 0.3s;
        }

        html.dark .data-table tbody tr:hover {
            background-color: #3A3358; 
        }

        html.dark .data-table td,
        html.dark .data-table th {
            color: #E2E8F0;
        }

        .data-table tbody tr {
            transition: background-color 0.3s ease;
        }

        @media (max-width: 768px) {
            .container {
                padding: 24px;
                margin: 20px;
            }

            .data-table th, .data-table td {
                padding: 10px;
                font-size: 14px;
            }
        }

        .theme-toggle {
            position: fixed;
            top: 16px;
            right: 16px;
            z-index: 999;
        }

        .theme-toggle button {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 8px 16px;
            font-weight: 600;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="theme-toggle">
        <button onclick="toggleTheme()">🌗 Ganti Mode</button>
    </div>

    <main class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <script>
        // Saat halaman pertama kali dimuat, cek preferensi
        const html = document.documentElement;
        const savedTheme = localStorage.getItem('theme');

        if (savedTheme === 'dark') {
            html.classList.add('dark');
        } else {
            html.classList.remove('dark');
        }

        // Fungsi toggle saat tombol diklik
        function toggleTheme() {
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }
    </script>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel-asah\resources\views/layout.blade.php ENDPATH**/ ?>