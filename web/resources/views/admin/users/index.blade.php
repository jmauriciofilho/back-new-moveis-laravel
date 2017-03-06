@extends('layouts.admin')

@section('title')
    Usuários
@endsection

@section('styles')
@endsection

@section('header')
    <h1>
        Usuários
        <small>Listagem de Usuários</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-users"></i> Usuários</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="/admin/users/create" class="btn btn-sm btn-flat btn-success">
                            <i class="fa fa-plus"></i> &nbsp; Novo Usuário
                        </a>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">

                            <table id="usersTable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Regra</th>
                                    <th>Ativo?</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{!! $user->name !!}</td>
                                            <td>{!! $user->email !!}</td>
                                            <td>{!! $user->getDisplayNameRoles() !!}</td>
                                            <td>
                                                <span class="label label-{!! $user->activated ? 'success' : 'danger' !!}">
                                                    {!! $user->activated ? 'Sim' : 'Não' !!}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="/admin/users/{!! $user->id !!}/edit" class="btn btn-xs btn-flat btn-default">
                                                    <i class="fa fa-pencil fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-md-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#usersTable').DataTable({
                language: { url: '/assets/admin/js/dataTables.pt-BR.json' },
                order: [[ 0, "asc" ]],
                columnDefs: [{ orderable: false, targets: [4] }]
            });
        });
    </script>
@endsection