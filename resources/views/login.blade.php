<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/style-login.css')}}"/>
</head>
<body>
    <div class="container-login">
        <div class="left"></div>
        <div class="right">
            <form method="POST" action="{{route('authenticate')}}">
                @csrf
                <div class="form-control">
                    <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}">
                    @error('email')
                        <sapn class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-control">
                    <input type="password" name="password" placeholder="Senha">
                    @error('password')
                        <sapn class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-control">
                    <input type="submit" value="Logar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>