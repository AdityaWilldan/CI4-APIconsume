<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Willkomik Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #1a1a1a;
            color: #d1d1d1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #111;
            border-bottom: 2px solid #0d6efd;
            height: 56px;
            padding: 0;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: #fff !important;
            letter-spacing: 0.5px;
        }
        .navbar-brand img {
            filter: drop-shadow(0 0 4px rgba(13,110,253,0.5));
        }
        main {
            flex: 1;
        }
        footer {
            background-color: #111;
            border-top: 1px solid #2a2a2a;
            color: #888;
            padding: 1rem 0;
            margin-top: 2rem;
        }
        h1, h2, h3, h4 {
            color: #fff;
            font-weight: 600;
        }
        .form-control {
            background-color: #222;
            border: 1px solid #333;
            color: #fff;
            border-radius: 4px;
        }
        .form-control:focus {
            background-color: #222;
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.15rem rgba(13,110,253,0.25);
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
            font-weight: 600;
            border-radius: 4px;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
        .btn-secondary {
            background-color: #333;
            border-color: #444;
            border-radius: 4px;
        }
        .btn-secondary:hover {
            background-color: #444;
            border-color: #555;
        }
        .komik-card {
            background-color: #222;
            border: 1px solid #333;
            border-radius: 6px;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
            cursor: pointer;
            height: 100%;
        }
        .komik-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            border-color: #0d6efd;
        }
        .komik-thumb {
            width: 100%;
            height: 260px;
            object-fit: cover;
            display: block;
        }
        .badge-chapter {
            position: absolute;
            top: 8px;
            right: 8px;
            background-color: #0d6efd;
            color: #fff;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 3px 7px;
            border-radius: 3px;
            z-index: 2;
        }
        .card-title {
            font-weight: 600;
            color: #fff;
            font-size: 0.9rem;
            margin-bottom: 4px;
        }
        .card-text {
            font-size: 0.75rem;
            color: #aaa;
        }
        .pagination .page-link {
            background-color: #222;
            border: 1px solid #333;
            color: #ccc;
            border-radius: 4px;
            margin: 0 2px;
        }
        .pagination .page-link:hover {
            background-color: #0d6efd;
            border-color: #0d6efd;
            color: #fff;
        }
        .modal-content {
            background-color: #1e1e1e;
            color: #d1d1d1;
            border: 1px solid #333;
            border-radius: 8px;
        }
        .modal-header, .modal-footer {
            border-color: #333;
        }
        .btn-close {
            filter: invert(1);
        }
        .alert-info {
            background-color: #1b2a3a;
            border-color: #0d6efd;
            color: #9ec5fe;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                <img src="<?= base_url('asset/image/icon16-Photoroom.png'); ?>" alt="Logo" width="36" height="36">
                Willkomik
            </a>
        </div>
    </nav>

    <main class="container py-4">
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="text-center">
        <small>&copy; Willkomik Web</small>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>