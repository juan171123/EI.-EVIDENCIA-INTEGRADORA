<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/229ca0cd03.js" crossorigin="anonymous"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #F8FAFC;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar-custom {
            background: #1E293B;
            border-bottom: 3px solid #0EA5E9;
            padding: 12px 30px;
            box-shadow: 0 2px 15px rgba(0,0,0,0.15);
        }

        .navbar-brand-custom {
            color: #0EA5E9 !important;
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: 2px;
            text-decoration: none;
        }

        .navbar-brand-custom span {
            color: white;
        }

        .navbar-text-custom {
            color: #94A3B8;
            font-size: 0.9rem;
        }

        .badge-admin {
            background-color: #0EA5E9;
            color: white;
            padding: 3px 8px;
            border-radius: 6px;
            font-size: 0.75rem;
            margin-left: 6px;
        }

        /* CONTENEDOR PRINCIPAL */
        .main-container {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 40px;
            margin-top: 30px;
            margin-bottom: 40px;
            border: 1px solid #E2E8F0;
        }

        /* TÍTULOS */
        h1 {
            font-weight: 700;
            color: #1E293B;
            border-left: 5px solid #0EA5E9;
            padding-left: 12px;
            margin-bottom: 24px;
            letter-spacing: 1px;
        }

        /* TABLA */
        .table {
            color: #1E293B;
        }

        .table thead {
            background-color: #1E293B;
            color: white;
        }

        .table thead th {
            font-weight: 600;
            letter-spacing: 0.08em;
            border: none;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #F1F5F9;
        }

        .table tbody tr {
            border-bottom: 1px solid #E2E8F0;
            transition: background 0.2s;
        }

        .table tbody tr:hover {
            background-color: #DBEAFE;
        }

        .table td {
            border: none;
            vertical-align: middle;
            color: #334155;
        }

        /* BOTONES */
        .btn-success {
            background-color: #0EA5E9;
            border-color: #0EA5E9;
            color: white;
            font-weight: 600;
        }

        .btn-success:hover {
            background-color: #0284C7;
            border-color: #0284C7;
        }

        .btn-danger {
            background-color: #EF4444;
            border-color: #EF4444;
        }

        .btn-danger:hover {
            background-color: #DC2626;
        }

        .btn-warning {
            background-color: #F59E0B;
            border-color: #F59E0B;
            color: white;
        }

        .btn-warning:hover {
            background-color: #D97706;
            color: white;
        }

        .btn-primary {
            background-color: #3B82F6;
            border-color: #3B82F6;
        }

        .btn-primary:hover {
            background-color: #2563EB;
        }

        .btn-secondary {
            background-color: #1E293B;
            border-color: #1E293B;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #334155;
        }

        .btn-info {
            background-color: #3B82F6;
            border-color: #3B82F6;
            color: white;
        }

        .btn-info:hover {
            background-color: #2563EB;
            color: white;
        }

        .btn {
            border-radius: 8px;
        }

        /* INPUTS */
        .input-group-text {
            background-color: #1E293B;
            color: white;
            border: none;
            font-weight: 600;
        }

        .form-control {
            background-color: #F8FAFC;
            border: 1px solid #CBD5E1;
            color: #1E293B;
            border-radius: 8px;
        }

        .form-control:focus {
            background-color: #ffffff;
            border-color: #3B82F6;
            color: #1E293B;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.25);
        }

        .form-control::placeholder {
            color: #94A3B8;
        }

        /* ALERTAS */
        .alert-success {
            background-color: #DCFCE7;
            border-color: #22C55E;
            color: #15803D;
        }

        .alert-danger {
            background-color: #FEE2E2;
            border-color: #EF4444;
            color: #B91C1C;
        }

        .alert-warning {
            background-color: #FEF3C7;
            border-color: #F59E0B;
            color: #B45309;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar-custom d-flex justify-content-between align-items-center">
        <a class="navbar-brand-custom" href="#">
            <i class="fa-solid fa-store me-2"></i>TIENDA<span>SinNombre</span>
        </a>
        @auth
            <span class="navbar-text-custom">
                <i class="fa-solid fa-circle-user me-1"></i>
                {{ auth()->user()->name }}
                @if(auth()->user()->is_admin)
                    <span class="badge-admin">Admin</span>
                @endif
            </span>
        @endauth
    </nav>

    <!-- CONTENIDO -->
    <div class="container main-container">
        @yield('content')
    </div>
    
</body>
</html>