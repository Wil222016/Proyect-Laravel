<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alquimia Restaurante</title>
    @viteReactRefresh
    @vite('resources/js/app.js')

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Alquimia</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menus') }}">Ver Menus</a>
                    </li>
                    
                </ul>
            </div>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservas') }}">Ver Reservas</a>
                    </li>
                    
                    <li class="nav-item primary">
                        <select class="nav-link" onchange="window.location.href=this.value">
                            <option style="color: black;" value="#" selected disabled>Administrar Cruds</option>
                            <option style="color: black;" value="{{ route('people.index') }}">Personas</option>
                            <option style="color: black;" value="{{ route('administrators.index') }}">Administradores</option>
                            <option style="color: black;" value="{{ route('clients.index') }}">Clientes</option>
                            <option style="color: black;" value="{{ route('employees.index') }}">Empleados</option>
                            <option style="color: black;" value="{{ route('semesters.index') }}">Semestres</option>
                            <option style="color: black;" value="{{ route('type_menus.index') }}">Tipos de Menú</option>
                            <option style="color: black;" value="{{ route('drinks.index') }}">Bebidas</option>
                            <option style="color: black;" value="{{ route('dish_types.index') }}">Tipos de Plato</option>
                            <option style="color: black;" value="{{ route('categories.index') }}">Categorías</option>
                            <option style="color: black;" value="{{ route('schedules.index') }}">Horarios</option>
                            <option style="color: black;" value="{{ route('offered_menus.index') }}">Menús Ofrecidos</option>
                            <option style="color: black;" value="{{ route('dishes.index') }}">Platos</option>                            
                            <option style="color: black;" value="{{ route('reservations.index') }}">Reservas</option>
                            <option style="color: black;" value="{{ route('entry_registers.index') }}">Registros de Entrada</option>
                            <option style="color: black;" value="{{ route('payments.index') }}">Pagos</option>                          
                        </select>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Bienvenido, {{ Auth::user()->full_name }}!</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link">Logout</button>
                        </form>
                    </li>
                    @endguest

                    
                </ul>
            </div>

        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <!-- Footer -->
    <footer class="bg-dark text-light text-center py-3 mt-5">
        <p>&copy; 2023 Restaurante Alquimia. Todos los derechos reservados.</p>
    </footer>

    <!-- Bootstrap JS y dependencias (al final del body para mejorar el rendimiento de carga) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>