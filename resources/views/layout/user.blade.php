<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AdminBiblioteca | Panel</title>

  <!-- Tailwind CSS (CDN) -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome 6.4.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!-- Estilos personalizados requeridos -->
  <style>
    .custom-shadow { box-shadow: 0 12px 30px rgba(2, 6, 23, 0.10); }
    .hover-lift { transition: transform .18s ease, box-shadow .18s ease; }
    .hover-lift:hover { transform: translateY(-2px); box-shadow: 0 14px 34px rgba(2, 6, 23, 0.14); }
    .glow { box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15), 0 14px 30px rgba(2, 6, 23, 0.10); }
  </style>
</head>
 
<body class="bg-slate-50 text-slate-900">
  <!-- Overlay (solo mÃ³vil) -->
  <div id="overlay" class="fixed inset-0 bg-slate-900/50 hidden z-40"></div>

  <!-- HEADER fijo -->
  <header class="fixed top-0 inset-x-0 z-50 bg-white/90 backdrop-blur border-b border-slate-200">
    <div class="mx-auto max-w-7xl px-4 sm:px-6">
      <div class="h-16 flex items-center justify-between">
        <!-- Brand -->
        <div class="flex items-center gap-3">
          <!-- BotÃ³n hamburguesa (mÃ³vil) -->
          <button id="btnOpenSidebar"
            class="lg:hidden inline-flex items-center justify-center rounded-xl p-2 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
            aria-label="Abrir menÃº lateral"
            aria-controls="sidebar"
            aria-expanded="false"
            type="button">
            <i class="fa-solid fa-bars text-slate-700"></i>
          </button>

          <a href="#"
            class="flex items-center gap-3 rounded-2xl px-2 py-1 hover:bg-slate-100">
            <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-600 text-white custom-shadow">
              <i class="fa-solid fa-book"></i>
            </span>
            <div class="leading-tight">
              <p class="font-semibold text-lg">AdminBiblioteca</p>
              <p class="text-xs text-slate-500 -mt-1">Panel de administraciÃ³n</p>
            </div>
          </a>
        </div>

        <!-- Menú horizontal (desktop) -->
        <nav class="hidden lg:flex items-center gap-1" aria-label="Navegación superior">
          <a href="{{ route('home') }}" class="px-4 py-2 rounded-xl hover:bg-slate-100 font-medium text-slate-700 hover:text-slate-900">
            Dashboard
          </a>
          <a href="#prestamos" class="px-4 py-2 rounded-xl hover:bg-slate-100 font-medium text-slate-700 hover:text-slate-900">
            Préstamos
          </a>
        </nav>

        <!-- Perfil -->
        <div class="flex items-center gap-3">
          <div class="hidden sm:flex items-center gap-3 rounded-2xl border border-slate-200 bg-white px-3 py-2 custom-shadow">
            <img
              src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?auto=format&fit=crop&w=96&q=80"
              alt="Avatar usuario"
              class="h-9 w-9 rounded-xl object-cover"
              loading="lazy"
            />
            <div class="leading-tight">
              <p class="text-sm font-semibold">Administrador</p>
              <p class="text-xs text-slate-500">admin@biblioteca.com</p>
            </div>
          </div>

          <button
            class="inline-flex items-center gap-2 rounded-2xl border border-slate-200 bg-white px-4 py-2 font-medium text-slate-700 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
            type="button"
            aria-label="Cerrar sesión">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="hidden sm:inline">Logout</span>
          </button>
        </div>
      </div>
    </div>
  </header>

  <!-- Layout general -->
  <div class="pt-16 min-h-screen flex">
    <!-- SIDEBAR -->
    <aside id="sidebar"
      class="fixed lg:static inset-y-0 left-0 z-50 w-72 bg-white border-r border-slate-200
             transform -translate-x-full lg:translate-x-0 transition-transform duration-200 ease-out
             flex flex-col"
      aria-label="Barra lateral">

      <!-- Header del sidebar -->
        <div class="h-16 px-5 flex items-center justify-between border-b border-slate-200">
          <p class="font-semibold text-slate-800">Menu</p>
        



          <!-- Cerrar sidebar (mÃ³vil) -->
          <button id="btnCloseSidebar"
            class="lg:hidden inline-flex items-center justify-center rounded-xl p-2 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
            aria-label="Cerrar menú lateral"
            type="button">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>

      @hasSection('sidebar')
        @yield('sidebar')
      @else
        @include('partials.user.sidebar')
      @endif


      <!-- Cerrar sesiÃ³n (al final) -->
      <div class="mt-auto p-4 border-t border-slate-200">
        <a href="#logout"
          class="group flex items-center gap-3 rounded-2xl px-4 py-3 font-medium
                 text-rose-700 hover:bg-rose-50 hover-lift">
          <i class="fa-solid fa-right-from-bracket w-5 text-rose-600"></i>
          <span>Cerrar sesion</span>
        </a>
      </div>
    </aside>

    
    <!-- MAIN -->
    <div class="flex-1 lg:ml-0">
      <main class="mx-auto max-w-7xl px-4 sm:px-6 py-6">
        @yield("content")
      </main>



  <!-- JS vanilla requerido -->
  <script>
    (function () {
      const sidebar = document.getElementById("sidebar");
      const overlay = document.getElementById("overlay");
      const btnOpen = document.getElementById("btnOpenSidebar");
      const btnClose = document.getElementById("btnCloseSidebar");
      const yearEl = document.getElementById("footerYear");

      // AÃ±o dinÃ¡mico
      if (yearEl) yearEl.textContent = new Date().getFullYear();

      const openSidebar = () => {
        sidebar.classList.remove("-translate-x-full");
        overlay.classList.remove("hidden");
        btnOpen?.setAttribute("aria-expanded", "true");
        document.body.classList.add("overflow-hidden"); // evita scroll detrÃ¡s en mÃ³vil
      };

      const closeSidebar = () => {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
        btnOpen?.setAttribute("aria-expanded", "false");
        document.body.classList.remove("overflow-hidden");
      };

      btnOpen?.addEventListener("click", openSidebar);
      btnClose?.addEventListener("click", closeSidebar);
      overlay?.addEventListener("click", closeSidebar);

      // Cerrar con Escape
      window.addEventListener("keydown", (e) => {
        if (e.key === "Escape") closeSidebar();
      });

      // En desktop (lg+), sidebar siempre visible y sin overlay
      const mq = window.matchMedia("(min-width: 1024px)");
      mq.addEventListener("change", (e) => {
        if (e.matches) {
          overlay.classList.add("hidden");
          document.body.classList.remove("overflow-hidden");
          btnOpen?.setAttribute("aria-expanded", "false");
          // en lg, Tailwind ya aplica lg:translate-x-0, no forzamos estados extra
        } else {
          // en mÃ³vil, dejar sidebar cerrado por defecto
          closeSidebar();
        }
      });
    })();
  </script>
</body>
</html>
@include('partials.admin.footer')
