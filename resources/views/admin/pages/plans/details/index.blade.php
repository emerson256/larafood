@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item "><a href="{{route('plans.index')}}">Planos</a></li>
        <li class="breadcrumb-item "><a href="{{route('plans.show',['url' => $plan->url])}}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active "><a href="{{route('details.plan.index',['url' => $plan->url])}}">Detalhes</a></li>
    </ol>

    <h1>Detalhes do Plano {{$plan->name}} <a href="{{route('details.plan.create',$plan->url)}}" class="btn btn-dark">Adicionar </a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <table class="table table-condesend">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="150px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td>
                                {{$detail->name}}
                            </td>
                            <td>
                                <a href="{{route('details.plan.edit',['url' => $plan->url,'idDetail' => $detail->id])}}" class="btn btn-info">Editar</a>
                                <a href="{{route('details.plan.show',['url' => $plan->url, 'idDetail' => $detail->id])}}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif

        </div>
    </div>
@stop
