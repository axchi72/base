@if ($item["submenu"] == [])
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:void(0);" ? "font-weight-bold" : ""}}">
        <a href="{{route("menu.edit", $item["id"])}}">{{$item["name"] . " | Url -> " . $item["url"]}} | Icono -> <i style=""></i></a>
        <form action="{{route("menu.destroy", $item["id"])}}" class="form-eliminar-menu d-inline" method="POST">
            @csrf @method('delete')
            <button type="button" class="btn-accion-tabla float-right boton-eliminar-menu" data-toggle="tooltip" title="Eliminar este registro"><i class="fas fas fa-trash-alt text-danger"></i></button>
        </form>
    </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:void(0);" ? "font-weight-bold" : ""}}">
        <a href="{{route("menu.edit", $item["id"])}}">{{$item["name"] . " | Url -> " . $item["url"]}} | Icono -> <i style=""></i></a>
        <form action="{{route("menu.destroy", $item["id"])}}" class="form-eliminar-menu d-inline" method="POST">
            @csrf @method('delete')
            <button type="button" class="btn-accion-tabla float-right boton-eliminar-menu" data-toggle="tooltip" title="Eliminar este registro"><i class="fas fas fa-trash-alt text-danger"></i></button>
        </form>
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
            @include("theme.back.menu.menu-item",[ "item" =>$submenu])
        @endforeach
    </ol>
</li>
@endif
