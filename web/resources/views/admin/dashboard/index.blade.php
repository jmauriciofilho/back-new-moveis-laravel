@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('styles')
@endsection

@section('header')
    <h1>
        DASHBOARD
        <small>Dashboard</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> &nbsp; Dashboard</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{!! $countUsers !!}</h3>
                    <p>Usuário(s)</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="javascript:void(0);" class="small-box-footer">
                    Mais informações <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{!! $countRoles !!}</h3>
                    <p>Regra(s)</p>
                </div>
                <div class="icon">
                    <i class="fa fa-list-ol"></i>
                </div>
                <a href="javascript:void(0);" class="small-box-footer">
                    Mais informações <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{!! $countPermissions !!}</h3>
                    <p>Permissão(ões)</p>
                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
                <a href="javascript:void(0);" class="small-box-footer">
                    Mais informações <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>0</h3>
                    <p>Erros</p>
                </div>
                <div class="icon">
                    <i class="fa fa-times"></i>
                </div>
                <a href="javascript:void(0);" class="small-box-footer">
                    Mais informações <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Olá {!! $auth->name !!}!</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            Você possui as seguintes regras: {!! $auth->getDisplayNameRoles() !!}
                        </div>
                    </div>
                </div>
                <div class="box-footer" style="display: block;">
                    <div class="row">
                        <div class="col-md-12">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection