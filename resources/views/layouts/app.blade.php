<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi App</title>
    {{-- You might want to include your CSS framework here, e.g., Bootstrap or Tailwind CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif; /* Using Inter as per instructions */
            background-color: #f8f9fa;
        }
        .attendance-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #343a40;
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            text-align: center;
            color: #6c757d;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }
        .form-control, .btn {
            border-radius: 8px; /* Rounded corners for form elements */
        }
        .btn-primary, .btn-success, .btn-danger, .btn-secondary {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Add shadow */
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 8px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        video {
            border: 1px solid #ddd;
            border-radius: 8px;
            display: block;
            margin-top: 10px;
            width: 100%; /* Make video responsive */
            height: auto;
        }
        .text-danger {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 5px;
        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .attendance-container {
                margin: 20px;
                padding: 20px;
            }
            .d-flex {
                flex-direction: column;
                gap: 10px !important; /* Ensure gap works on small screens */
            }
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    {{-- You might want to include your JavaScript framework here --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>