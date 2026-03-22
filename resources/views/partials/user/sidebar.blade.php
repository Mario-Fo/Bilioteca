<!-- Navegacion -->
<nav class="p-4 space-y-4" aria-label="Navegacion lateral usuario">
  <div>
    <p class="px-3 text-xs font-semibold tracking-wider text-slate-500">PRINCIPAL</p>
    <div class="mt-2 space-y-1">
      <a href="{{ route('home') }}"
        class="group flex items-center gap-3 rounded-2xl px-4 py-3 font-medium
               bg-blue-50 text-blue-700 border border-blue-100 glow hover-lift">
        <i class="fa-solid fa-chart-line w-5 text-blue-600"></i>
        <span>Inicio</span>
      </a>

      <a href="#prestamos"
        class="group flex items-center gap-3 rounded-2xl px-4 py-3 font-medium
               text-slate-700 hover:text-blue-700 hover:bg-blue-50 hover-lift">
        <i class="fa-solid fa-arrows-rotate w-5 text-slate-400 group-hover:text-blue-600"></i>
        <span>Prestamos</span>
      </a>
    </div>
  </div>
</nav>
