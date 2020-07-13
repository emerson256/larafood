@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{route('plans.create')}}" class="btn btn-dark">Adicionar </a></h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.index')}}">Planos</a></li>
    </ol>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" id="" placeholder="Nome" class="form-control" value="{{$filters['filter'] ?? ''}}">
                <button type="submit" class="btn btn-dark ml-1">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condesend">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="250px">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{$plan->name}}
                            </td>
                            <td>
                                R$ {{number_format($plan->price,2,',','.')}}
                            </td>
                            <td>
                                <a href="{{route('details.plan.index',['url' => $plan->url])}}" class="btn btn-secondary">Detalhes</a>
                                <a href="{{route('plans.edit',['url' => $plan->url])}}" class="btn btn-info">Editar</a>
                                <a href="{{route('plans.show',['url' => $plan->url])}}" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif

        </div>
    </div>
@stop
