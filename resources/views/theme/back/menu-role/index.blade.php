@extends('theme.back.layout')
@section('title')
Sistema de Menús - Role
@endsection

@push('styles')

@endpush
@push('scripts')
<script src="{{asset("assets/back/js/pages/scripts/menu-role/index.js")}}" type="text/javascript"></script>
@endpush

@section('page-breadcrumb')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Sistema de Menús - Role</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("admin")}}">Admin</a></li>
                        <li class="breadcrumb-item"><a href="{{route("dashboard")}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sistema de Menús - Role</li>
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
                <h5 class="text-white float-left">Sistema de Menús - Role</h5>
            </div>
            <div class="border-top">
                <div class="card-body">
                    @csrf
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover table-sm">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Menú</th>
                                    @foreach ($roles as $rol)
                                    <th class="text-center" scope="col">{{ $rol->name}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $key => $menu)
                                    @if ($menu["menu_id"] != null)
                                        @break
                                    @endif
                                    @include('theme.back.menu-role.item-menu', ['menu' => $menu, 'hijo' => 'no'])
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
