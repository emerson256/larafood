@include('admin.includes.alerts')
@csrf
<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" class="form-control" name="name" id="" placeholder="Nome" value="{{$detail->name ?? old('name')}}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-info">Salvar</button>
</div>
