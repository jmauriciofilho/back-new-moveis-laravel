@extends('layouts.admin')

@section('title')
    Editar Permissão
@endsection

@section('styles')
@endsection

@section('header')
    <h1>
        Editar Permissão
        <small>Editar Permissão</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/admin/permissions"><i class="fa fa-users"></i> Permissões</a></li>
        <li class="active"><i class="fa fa-users"></i> Editar Permissão</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                {!! Form::open(['url' => '/admin/permissions/' . $permission->id, 'method' => 'put']) !!}

                <div class="box-header with-border">
                    <h3 class="box-title">
                        Editar Permissão
                    </h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.permissions.form')
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-flat btn-default" href="/admin/permissions">Voltar</a>
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