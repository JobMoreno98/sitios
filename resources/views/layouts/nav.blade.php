<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{route('inicio')}}">Inicio Sitios</a>
        <a class="navbar-brand" href="{{route('index',['nombre'=>$nombre])}}">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @foreach ($menu as $key => $value)                  
                    @if (count($value) > 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ ucfirst($key) }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @for ($i = 0; $i < count($value); $i++)
                                <li><a class="dropdown-item" href="{{route('seccion01',
                                ['nombre'=>$nombre,'menu'=>$value[$i]['nombre']])}}">{{ucfirst($value[$i]['nombre'])}}</a></li>
                                @endfor
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('seccion01',
                                ['nombre'=>$nombre,'menu'=>$key])}}">{{ ucfirst($key) }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>