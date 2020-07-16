@extends('adminlte::page')

@section('title', "Editar Permissão {$permission->name}")

@section('content_header')
    <h1>Editar Permissão <strong>{{$permission->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('permissions.update',['permission' => $permission->id])}}" method="POST" class="form">
                @csrf
                @method('PUT')
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@endsection
