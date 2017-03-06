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
                Resete sua senha.
            </p>

            {!! Form::open(['url' => '/password/reset', 'method' => 'post']) !!}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row">

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-mail</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="control-label">Senha</label>
                        <input id="password" type="password" class="form-control" name="password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm" class="control-label">Confirme sua senha</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-12">
                    <br />
                    <a href="/admin" class="btn btn-flat btn-default">Ir para Admin</a>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-flat">Salvar</button>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    <script src="/assets/admin/js/admin.js"></script>
</body>
</html>