<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($notas as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->descripcion }}</td>

        </tr>
    @endforeach
    </tbody>
</table>

@if ( session('mensaje') )
    <div class="alert alert-success">{{ session('mensaje') }}</div>
@endif
<form method="POST" action="{{ route('notas.crear') }}">
    @csrf
    <input
        type="text"
        name="nombre"
        placeholder="Nombre"
        class="form-control mb-2"
    />
    <input
        type="text"
        name="descripcion"
        placeholder="Descripcion"
        class="form-control mb-2"
    />
    <button class="btn btn-primary btn-block" type="submit">Agregar</button>
</form>


@error('nombre')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    El nombre es requerido
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@enderror @if ($errors->has('descripcion'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        La descripción es requerida
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
