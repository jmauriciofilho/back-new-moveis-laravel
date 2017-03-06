<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{!! trans('admin/login.page_title') !!}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/assets/admin/css/admin.css">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>{!! trans('admin/login.title') !!}</b> {!! trans('admin/login.title_sub') !!}</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">{!! trans('admin/login.box_message_description') !!}</p>

            {!! Form::open(['url' => '/login', 'method' => 'post']) !!}

                <div class="form-group has-feedback">
                    <input type="email" id="email" name="email" class="form-control" placeholder="E-mail" autofocus="autofocus" value="{!! old('email') !!}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Senha">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox">
                            <label><input type="checkbox" id="remember" name="remember" class="checkboxBlue"> &nbsp; Lembrar-me</label>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                    </div>
                </div>

            {!! Form::close() !!}

            <div class="text-center">
                <br />
                <a href="{!! url('/password/email') !!}">Esqueci minha senha</a>
            </div>

            @if($errors->has('email'))
                <br />
                <div class="form-group text-center has-error">
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                </div>
            @endif

        </div>
    </div>
    <script src="/assets/admin/js/admin.js"></script>
</body>
</html>
