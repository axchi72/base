@extends('theme.back.layout')
@section('title')
Sistema de Menús
@endsection

@push('styles')
<link href="{{asset("assets/back/extra-libs/nestable/jquery.nestable.css")}}" rel="stylesheet" type="text/css" />
@endpush

@push('scriptsPlugins')
<script src="{{asset("assets/back/extra-libs/nestable/jquery.nestable.js")}}" type="text/javascript"></script>
@endpush

@push('scripts')
<script src="{{asset("assets/back/js/pages/scripts/menu/index.js")}}" type="text/javascript"></script>
@endpush

@section('page-breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Sistema de Menús</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin")}}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sistema de Menús</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @if ($mensaje = session("mensaje"))
        <x-alert tipo="success" :mensaje="$mensaje" />
        @endif
        <div class="card">
            <div class="card-header bg-info">
                <h5 class="text-white float-left">Sistema de Menús</h5>
                <a href="{{route('menu.create')}}" class="btn btn-outline-light btn-sm float-right">Crear Menú</a>
            </div>
            <div class="border-top">
                <div class="card-body">
                    @csrf
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach ($menus as $key => $item)
                                @if ($item["menu_id"] != 0)
                                    @break
                                @endif
                                @include("theme.back.menu.menu-item",["item" => $item])
                            @endforeach
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="confirmar-eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirme esta acción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿ Seguro desea eliminar este Menú ? Recuerde que sí es menú padre también se eliminarán todos los menú hijos
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                <button type="button" id="accion-eliminar" class="btn btn-danger">Si</button>
            </div>
        </div>
    </div>
</div>
@endsection
