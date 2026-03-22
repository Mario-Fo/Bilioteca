<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AdminBiblioteca | Login</title>

  <!-- Tailwind CSS (CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- (Opcional) Font Awesome si quieres íconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!-- (Opcional) Clases personalizadas del layout previo -->
  <style>
    .custom-shadow { box-shadow: 0 12px 30px rgba(2, 6, 23, 0.10); }
    .hover-lift { transition: transform .18s ease, box-shadow .18s ease; }
    .hover-lift:hover { transform: translateY(-2px); box-shadow: 0 14px 34px rgba(2, 6, 23, 0.14); }
    .glow { box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15), 0 14px 30px rgba(2, 6, 23, 0.10); }
  </style>
</head>

<body class="bg-slate-50 text-slate-900">
 
@yield('content')
@include('partials.auth.footer') 
      
