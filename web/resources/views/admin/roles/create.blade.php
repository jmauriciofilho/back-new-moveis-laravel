@extends('layouts.admin')

@section('title')
    Criar Regra
@endsection

@section('styles')
@endsection

@section('header')
    <h1>
        Criar Regra
        <small>Criar Regra</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/admin/roles"><i class="fa fa-list"></i> Regras</a></li>
        <li class="active"><i class="fa fa-plus"></i> &nbsp; Criar Regra</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                {!! Form::open(['url' => '/admin/roles', 'method' => 'post']) !!}

                <div class="box-header with-border">
                    <h3 class="box-title">
                        Criar Regra
                    </h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.roles.form')
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-flat btn-default" href="/admin/roles">Voltar</a>
                            <div class="pull-right">
                                {!! Form::submit('Salvar', ['class' => 'btn btn-flat btn-success']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @yield('formScripts')
@endsection