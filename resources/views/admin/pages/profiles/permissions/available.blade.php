@extends('adminlte::page')

@section('title', "Permissões disponíveis para {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.index')}}">Permissões</a></li>
    </ol>
    <h1>Permissões do perfil <strong>{{$profile->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('permissions.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" id="" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark ml-1">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condesend">
                <thead>
                    <tr>
                        <th width="50px" >#</th>
                        <th >Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('profiles.permissions.attach',$profile->id)}}" method="POST">
                        @csrf
                        @include('admin.includes.alerts')
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" id="" value="{{$permission->id}}">
                            </td>
                            <td>
                                {{$permission->name}}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="500">
                            <button type="submit" class="btn btn-success">Vincular</button>
                        </td>
                    </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif

        </div>
    </div>
@stop
