 @extends('layout.auth')

@section('content')
 <!-- Header simple (opcional) -->
  <header id="top" class="border-b border-slate-200 bg-white/90 backdrop-blur">
    <div class="mx-auto max-w-6xl px-4 sm:px-6">
      <div class="h-16 flex items-center justify-between">
        <a href="#" class="flex items-center gap-3 rounded-2xl px-2 py-1 hover:bg-slate-100">
          <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-blue-600 text-white custom-shadow">
            <i class="fa-solid fa-book"></i>
          </span>
          <div class="leading-tight">
            <p class="font-semibold text-lg">AdminBiblioteca</p>
            <p class="text-xs text-slate-500 -mt-1">Acceso al sistema</p>
          </div>
        </a>

        <nav class="hidden sm:flex items-center gap-2">
          <a href="#login" class="px-4 py-2 rounded-xl hover:bg-slate-100 font-medium text-slate-700">Login</a>
          <a href="#registro" class="px-4 py-2 rounded-xl hover:bg-slate-100 font-medium text-slate-700">Registro</a>
        </nav>
      </div>
    </div>
  </header>

  <main>
    @if ($errors->any())
      <section class="mx-auto max-w-6xl px-4 sm:px-6 pt-6">
        <div class="rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
          <p class="font-semibold">No se pudo completar la solicitud:</p>
          <ul class="mt-2 list-disc pl-5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </section>
    @endif
    <!-- ===================== LOGIN FORM ===================== -->
    <section id="login" class="mx-auto max-w-6xl px-4 sm:px-6 py-10">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
        <!-- Panel info (decorativo / reutilizable) -->
        <aside class="hidden lg:flex flex-col justify-between rounded-3xl bg-gradient-to-br from-blue-600 to-blue-800 p-10 text-white custom-shadow">
          <div>
            <div class="flex items-center gap-3">
              <span class="inline-flex h-11 w-11 items-center justify-center rounded-2xl bg-white/15">
                <i class="fa-solid fa-book"></i>
              </span>
              <div class="leading-tight">
                <p class="text-lg font-semibold">AdminBiblioteca</p>
                <p class="text-sm text-white/80 -mt-1">Panel de acceso</p>
              </div>
            </div>

            <h1 class="mt-10 text-3xl font-semibold tracking-tight">Bienvenido de vuelta</h1>
            <p class="mt-3 text-white/85 leading-relaxed">
              Inicia sesiÃ³n para administrar libros, usuarios y prÃ©stamos.
            </p>
          </div>

          <ul class="space-y-3 text-sm text-white/90">
            <li class="flex items-start gap-2">
              <span class="mt-1 inline-flex h-2 w-2 rounded-full bg-white"></span>
              GestiÃ³n de catÃ¡logo y disponibilidad
            </li>
            <li class="flex items-start gap-2">
              <span class="mt-1 inline-flex h-2 w-2 rounded-full bg-white"></span>
              Control de prÃ©stamos y devoluciones
            </li>
            <li class="flex items-start gap-2">
              <span class="mt-1 inline-flex h-2 w-2 rounded-full bg-white"></span>
              Reportes y mÃ©tricas
            </li>
          </ul>
        </aside>

        <!-- Form Login -->
        <article class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 custom-shadow">
          <header class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-semibold tracking-tight">Login</h2>
            <p class="mt-1 text-slate-600">Ingresa tu correo y contraseÃ±a para acceder.</p>
          </header>

          <form class="space-y-4" action="/login" method="POST">
            @csrf
            <!-- Email -->
            <div class="space-y-1">
              <label for="loginEmail" class="text-sm font-medium text-slate-700">Email</label>
              <input
                id="loginEmail"
                name="email"
                type="email"
                autocomplete="email"
                required
                placeholder="tuemail@correo.com"
                value="{{ old('email') }}"
                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                       text-slate-900 placeholder:text-slate-400
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
              <p class="text-xs text-slate-500">Ejemplo: admin@biblioteca.com</p>
            </div>

            <!-- Password -->
            <div class="space-y-1">
              <label for="loginPassword" class="text-sm font-medium text-slate-700">Password</label>
              <input
                id="loginPassword"
                name="password"
                type="password"
                autocomplete="current-password"
                required
                placeholder="â€¢â€¢â€¢â€¢â€¢â€¢â€¢â€¢"
                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                       text-slate-900 placeholder:text-slate-400
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
              <p class="text-xs text-slate-500">Usa tu contrasena registrada.</p>
            </div>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 pt-2">
              <label class="inline-flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" class="h-4 w-4 rounded border-slate-300 text-blue-600 focus:ring-blue-500" />
                Mantener sesiÃ³n
              </label>

              <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-700">
                Â¿Olvidaste tu contraseÃ±a?
              </a>
            </div>

            <button
              type="submit"
              class="w-full rounded-2xl bg-blue-600 px-6 py-3 font-medium text-white
                     hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 hover-lift"
            >
              Acceder
            </button>

            <p class="text-sm text-slate-600">
              Â¿No tienes cuenta?
              <a href="#registro" class="font-medium text-blue-600 hover:text-blue-700">RegÃ­strate</a>
            </p>
          </form>
        </article>
      </div>
    </section>

    <!-- ===================== REGISTER FORM ===================== -->
    <section id="registro" class="mx-auto max-w-6xl px-4 sm:px-6 pb-12" >
      <article class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 custom-shadow">
        <header class="mb-6">
          <h2 class="text-2xl sm:text-3xl font-semibold tracking-tight">Registro</h2>
          <p class="mt-1 text-slate-600">Crea tu cuenta con datos bÃ¡sicos para poder acceder despuÃ©s.</p>
        </header>

        <form class="space-y-4" action="/register" method="POST">
          @csrf
          <!-- Nombre + Apellido -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="space-y-1">
              <label for="name" class="text-sm font-medium text-slate-700">Nombre</label>
              <input
                id="name"
                name="name"
                type="text"
                autocomplete="given-name"
                required
                placeholder="Tu nombre"
                value="{{ old('name') }}"
                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                       text-slate-900 placeholder:text-slate-400
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
          </div>

          <!-- Email -->
          <div class="space-y-1">
            <label for="email" class="text-sm font-medium text-slate-700">Email</label>
            <input
              id="email"
              name="email"
              type="email"
              autocomplete="email"
              required
              placeholder="tuemail@correo.com"
              value="{{ old('email') }}"
              class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                     text-slate-900 placeholder:text-slate-400
                     focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
          </div>

          <!-- Password + Repetir Password -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="space-y-1">
              <label for="password" class="text-sm font-medium text-slate-700">Password</label>
              <input
                id="password"
                name="password"
                type="password"
                autocomplete="new-password"
                required
                placeholder="Minimo 6 caracteres"
                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                       text-slate-900 placeholder:text-slate-400
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
              <p class="text-xs text-slate-500">Usa una contraseÃ±a segura.</p>
            </div>

            <div class="space-y-1">
              <label for="password_confirmation" class="text-sm font-medium text-slate-700">Repetir password</label>
              <input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                required
                placeholder="Repite tu password"
                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3
                       text-slate-900 placeholder:text-slate-400
                       focus:outline-none focus:ring-2 focus:ring-blue-500"
              />
            </div>
          </div>

          <!-- BotÃ³n -->
          <div class="pt-2 flex flex-col sm:flex-row gap-3">
            <button
              type="submit"
              class="w-full sm:w-auto rounded-2xl bg-blue-600 px-6 py-3 font-medium text-white
                     hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 hover-lift"
            >
              Crear cuenta
            </button>

            <a
              href="#login"
              class="w-full sm:w-auto inline-flex items-center justify-center rounded-2xl border border-slate-200 bg-white px-6 py-3
                     font-medium text-slate-700 hover:bg-slate-100"
            >
              Volver a Login
            </a>
          </div>

          <p class="text-sm text-slate-600">
            Â¿Ya tienes cuenta?
            <a href="#login" class="font-medium text-blue-600 hover:text-blue-700">Inicia sesiÃ³n</a>
          </p>
        </form>
      </article>
    </section>
  </main>

  <footer class="border-t border-slate-200 bg-white">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 py-6">
      <p class="text-sm text-slate-500">Â© <span id="year"></span> AdminBiblioteca</p>
    </div>
  </footer>

  <!-- JS mÃ­nimo SOLO para el aÃ±o dinÃ¡mico (no toca formularios) -->
  <script>
    document.getElementById("year").textContent = new Date().getFullYear();
  </script>
</body>
</html>
@endsection


