<html lang="{{ app()->getLocale() }}">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link href="{{ asset('public/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <title>Login - Megatech</title>
    </head>
    <body>
        <div class="container" style="margin-top: 50px;">
            @if($errors->count() > 0)
                <div class="alert alert-danger">Dados inválidos</div>
            @endif

            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login</div>

                        <div class="panel-body">
                                {{ Form::open(['route' => 'login', 'class' => 'form-horizontal']) }}

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    {{ Form::label('username', 'Username', ['class' => 'col-md-4 control-label']) }}

                                    <div class="col-md-6">
                                        {{ Form::input('text', 'username', old('username'), ['id' => 'username', 'class' => 'form-control', 'required', 'autofocus']) }}
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {{ Form::label('password', 'Senha', ['class' => 'col-md-4 control-label']) }}

                                    <div class="col-md-6">
                                        {{ Form::input('password', 'password', null, ['id' => 'password', 'class' => 'form-control', 'required']) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('public/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>
