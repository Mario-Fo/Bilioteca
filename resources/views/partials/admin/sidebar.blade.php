<!-- Navegación -->
<nav class="p-4 space-y-4" aria-label="Navegación lateral">
  <!-- PRINCIPAL -->
  <div>
    <p class="px-3 text-xs font-semibold tracking-wider text-slate-500">PRINCIPAL</p>
    <div class="mt-2 space-y-1">
      <a href="{{ route('home') }}"
        class="group flex items-center gap-3 rounded-2xl px-4 py-3 font-medium
               bg-blue-50 text-blue-700 border border-blue-100 glow hover-lift">
        <i class="fa-solid fa-chart-line w-5 text-blue-600"></i>
        <span>Dashboard</span>
        <span class="ml-auto text-xs bg-blue-600 text-white px-2 py-0.5 rounded-full">Activo</span>
      </a>

      <a href="#reportes"
        class="group flex items-center gap-3 rounded-2xl px-4 py-3 font-medium
               text-slate-700 hover:text-blue-700 hover:bg-blue-50 hover-lift">
        <i class="fa-solid fa-file-lines w-5 text-slate-400 group-hover:text-blue-600"></i>
        <span>Reportes</span>
      </a>
    </div>
  </div>

  <!-- GESTIÓN -->
  <div>
    <p class="px-3 text-xs font-semibold tracking-wider text-slate-500">GESTIÓN</p>
    <div class="mt-2 space-y-1">
      <a href="#libros"
        class="group flex items-center gap-3 rounded-2xl px-4 py-3 font-medium
               text-slate-700 hover:text-blue-700 hover:bg-blue-50 hover-lift">
        <i class="fa-solid fa-book-open w-5 text-slate-400 group-hover:text-blue-600"></i>
        <span>Libros</span>
      </a>

      <a href="{{ route('usuarios.index') }}"
        class="group flex items-center gap-3 rounded-2xl px-4 py-3 font-medium
               text-slate-700 hover:text-blue-700 hover:bg-blue-50 hover-lift">
        <i class="fa-solid fa-users w-5 text-slate-400 group-hover:text-blue-600"></i>
        <span>Usuarios</span>
      </a>

      <a href="#prestamos"
        class="group flex items-center gap-3 rounded-2xl px-4 py-3 font-medium
               text-slate-700 hover:text-blue-700 hover:bg-blue-50 hover-lift">
        <i class="fa-solid fa-arrows-rotate w-5 text-slate-400 group-hover:text-blue-600"></i>
        <span>Préstamos</span>
      </a>
    </div>
  </div>
</nav>

<!-- Tarjeta de estadísticas -->
<div class="px-4">
  <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 custom-shadow hover-lift">
    <div class="flex items-center justify-between">
      <p class="text-sm font-semibold text-slate-800">Estadísticas</p>
      <span class="text-xs text-slate-500">Hoy</span>
    </div>

    <div class="mt-4 space-y-4">
      <div>
        <div class="flex items-center justify-between text-xs text-slate-600">
          <span>Libros prestados</span>
          <span class="font-semibold text-slate-700">62%</span>
        </div>
        <div class="mt-2 h-2 rounded-full bg-slate-200 overflow-hidden">
          <div class="h-full w-[62%] bg-blue-600 rounded-full"></div>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between text-xs text-slate-600">
          <span>Capacidad de catálogo</span>
          <span class="font-semibold text-slate-700">45%</span>
        </div>
        <div class="mt-2 h-2 rounded-full bg-slate-200 overflow-hidden">
          <div class="h-full w-[45%] bg-blue-600 rounded-full"></div>
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between text-xs text-slate-600">
          <span>Usuarios activos</span>
          <span class="font-semibold text-slate-700">78%</span>
        </div>
        <div class="mt-2 h-2 rounded-full bg-slate-200 overflow-hidden">
          <div class="h-full w-[78%] bg-blue-600 rounded-full"></div>
        </div>
      </div>
    </div>

    <div class="mt-4 rounded-2xl bg-white border border-slate-200 p-3">
      <p class="text-xs text-slate-500">Tip</p>
      <p class="text-sm font-medium text-slate-800">Genera reportes semanales para detectar retrasos.</p>
    </div>
  </div>
</div>
