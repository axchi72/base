@extends('theme.back.layout')
@section('title')
Sistema Menús
@endsection
@push('scripts')
<script src="{{asset("assets/back/js/pages/scripts/menu/crear.js")}}" type="text/javascript"></script>
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
                        <li class="breadcrumb-item active" aria-current="page">Editar Menú</li>
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
        @if ($errors->any())
            <x-alert tipo="danger" :mensaje="$errors" />
            @endif
        <div class="card">
            <div class="card-header bg-success">
                <h5 class="text-white float-left">Editar Menú {{$data->name}}</h5>
                <a href="{{route('menu')}}" class="btn btn-outline-light btn-sm float-right">Volver al listado</a>
            </div>
            <form action="{{route("menu.update", $data->id)}}" id="form-general" class="form-horizontal" method="POST"
                autocomplete="off">
                @csrf @method('put')
                <div class="card-body">
                    @include('theme.back.menu.form')
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-success"><i class="mdi mdi-download"></i>
                                    Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
