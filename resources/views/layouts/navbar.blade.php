<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="..\css\navbar.css">
    @yield('css')
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img width="200px"
                src="https://licorhouse.com/cdn/shop/files/3_Logo_Front_a14bbf09-db24-4dfe-afb7-7be242fe57d4_180x.jpg?v=1613573449"
                alt="Logo de la empresa">
        </div>
        <ul class="nav-list">
            <li class="nav-item"><a href="/principal">Inicio</a></li>
            <li class="nav-item"><a href="{{ route('productos.indexCliente') }}">Productos</a></li>
            <li class="nav-item"><a href="#">Servicios</a></li>
            <li class="nav-item"><a href="#">Contacto</a></li>
        </ul>
    </nav>
    <div class="contenedor">
        @yield('content') <!-- Esta es la sección que se reemplazará en otras vistas -->
    </div>
</body>

</html>
