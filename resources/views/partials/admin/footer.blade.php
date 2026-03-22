      <!-- FOOTER minimalista -->
      <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 py-8">
          <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="flex items-center gap-3">
              <span class="inline-flex h-9 w-9 items-center justify-center rounded-2xl bg-blue-600 text-white">
                <i class="fa-solid fa-book"></i>
              </span>
              <div class="leading-tight">
                <p class="font-semibold">AdminBiblioteca</p>
                <p class="text-xs text-slate-500">Panel de administración</p>
              </div>
            </div>

            <nav class="flex flex-wrap gap-2" aria-label="Enlaces rápidos">
              <a href="{{ route('home') }}" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100">Dashboard</a>
              <a href="#libros" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100">Libros</a>
              <a href="{{ route('usuarios.index') }}" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100">Usuarios</a>
              <a href="#prestamos" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100">Préstamos</a>
              <a href="{{ route('logout') }}" class="px-3 py-2 rounded-xl text-sm font-medium text-slate-700 hover:bg-slate-100">logout</a>
            </nav>
          </div>

          <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 border-t border-slate-200 pt-6">
            <p class="text-sm text-slate-500">
              © <span id="footerYear"></span> AdminBiblioteca. Todos los derechos reservados.
            </p>
            <p class="text-xs text-slate-500">Hecho con Tailwind CSS + HTML</p>
          </div>
        </div>
      </footer>
    </div>
  </div>