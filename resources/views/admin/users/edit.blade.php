@extends('layouts.admin')

@section('title')
    Editar Usuário
@endsection

@section('styles')
@endsection

@section('header')
    <h1>
        Editar Usuário
        <small>Editar Usuário</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/admin/users"><i class="fa fa-users"></i> Usuários</a></li>
        <li class="active"><i class="fa fa-pencil"></i> &nbsp; Editar Usuário</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                {!! Form::open(['url' => '/admin/users/' . $user->id, 'method' => 'put', 'files' => true]) !!}

                <div class="box-header with-border">
                    <h3 class="box-title">
                        Editar Usuário
                    </h3>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            @include('admin.users.form')
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-flat btn-default" href="/admin/users">Voltar</a>
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