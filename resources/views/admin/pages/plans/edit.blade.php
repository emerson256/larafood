@extends('adminlte::page')

@section('title', 'Editar o Plano')

@section('content_header')
    <h1>Editar Plano <strong>{{$plan->name}}</strong></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('plans.update',['url' => $plan->url])}}" method="POST" class="form">
                @csrf
                @method('PUT')
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@endsection
