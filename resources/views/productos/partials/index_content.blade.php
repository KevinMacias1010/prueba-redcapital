<div class="section">
    <div class="right-align" style="margin-bottom: 12px;">
        <a class="btn waves-effect waves-light" href="{{ route('productos.create') }}">
            <span class="material-icons left">add</span>
            Nuevo producto
        </a>
    </div>

    <div class="card">
        <div class="card-content">
            <table class="striped responsive-table">
                <thead>
                    <tr>
                        <th>SKU</th>
                        <th>Nombre</th>
                        <th class="right-align">Precio unitario</th>
                        <th class="center-align">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $p)
                        <tr>
                            <td>{{ $p->sku }}</td>
                            <td>{{ $p->nombre }}</td>
                            <td class="right-align">${{ number_format($p->precio_unitario, 2) }}</td>
                            <td class="center-align">
                                <a class="btn-small blue waves-effect waves-light" href="{{ route('productos.edit', $p) }}">
                                    <span class="material-icons left">edit</span>
                                    Editar
                                </a>
                                <form style="display:inline-block" method="POST" action="{{ route('productos.destroy', $p) }}" onsubmit="return confirm('¿Eliminar producto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-small red waves-effect waves-light" type="submit">
                                        <span class="material-icons left">delete</span>
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="section">{{ $productos->links() }}</div>
        </div>
    </div>
</div>



