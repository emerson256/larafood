@extends('adminlte::page')

@section('title', "Editar o Detalhe {$detail->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item "><a href="{{route('plans.show',['url' => $plan->url])}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active">
            <a href="{{route('details.plan.edit',['url' => $plan->url,'idDetail' => $detail->id])}}">Editar</a>
        </li>
    </ol>

    <h1>Editar o detalhe {{$plan->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('details.plan.update',[$plan->url,$detail->id])}}" method="POST">
                @method('PUT')
                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@stop
