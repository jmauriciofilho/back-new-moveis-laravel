<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! trans('translate/layout.login.pageTitle') !!}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/assets/admin/css/admin.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>{!! trans('admin/login.title') !!}</b> {!! trans('admin/login.title_sub') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">
                Digite seu email e receba um link para resetar sua senha.
            </p>

            {!! Form::open(['url' => '/password/email', 'method' => 'post']) !!}

            <div class="row">
                <div class="col-md-12">
                    <br />
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-12 control-label">E-mail</label>
                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <br /><br />
                    <a href="/login" class="btn btn-flat btn-default">Ir para Login</a>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-flat">Enviar</button>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    <script src="/assets/admin/js/admin.js"></script>
</body>
</html>