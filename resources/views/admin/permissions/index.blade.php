@extends('layouts.admin')

@section('title')
    Permissões
@endsection

@section('styles')
@endsection

@section('header')
    <h1>
        Permissões
        <small>Listagem de Permissões</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-users"></i> Permissões</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <a href="/admin/permissions/create" class="btn btn-sm btn-flat btn-success">
                            <i class="fa fa-plus"></i> &nbsp; Nova Permissão
                        </a>
                    </h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">

                            <table id="permissionsTable" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>Nome</th>
                                    <th>Nome de Exibição</th>
                                    <th>Descrição</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td>{!! $permission->name !!}</td>
                                            <td>{!! $permission->display_name !!}</td>
                                            <td>{!! $permission->description !!}</td>
                                            <td>
                                                <a href="/admin/permissions/{!! $permission->id !!}/edit" class="btn btn-xs btn-flat btn-default">
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
            $('#permissionsTable').DataTable({
                language: { url: '/assets/admin/js/dataTables.pt-BR.json' },
                order: [[ 0, "asc" ]],
                columnDefs: [{ orderable: false, targets: [3] }]
            });
        });
    </script>
@endsection