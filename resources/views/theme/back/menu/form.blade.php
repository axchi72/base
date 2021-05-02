<div class="form-group row">
    <label for="name" class="col-sm-3 text-right control-label requerido">Nombre</label>
    <div class="col-sm-5">
        <input type="text" name="name" id="name" class="form-control" value="{{old("name", $data->name ?? '')}}" maxlength="50" required>
    </div>
</div>
<div class="form-group row">
    <label for="url" class="col-sm-3 text-right control-label requerido">Url</label>
    <div class="col-sm-5">
        <input type="text" name="url" id="url" class="form-control" value="{{old("url", $data->url ?? '')}}" maxlength="100" required>
    </div>
</div>
<div class="form-group row">
    <label for="icono" class="col-sm-3 text-right control-label">Icono</label>
    <div class="col-sm-5">
        <input type="text" name="icono" id="icono" class="form-control" value="{{old("icono", $data->icono ?? '')}}" maxlength="50">
    </div>
    <div class="col-sm-1">
        <span id="mostrar-icono" class="{{old("icono")}}"></span>
    </div>
</div>
