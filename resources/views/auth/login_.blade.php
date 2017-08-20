<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema nuticionista | Login</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div style="margin-top: 200px">

        </div>
        <div style="background-color: #E5E5E6; padding: 15px; border-radius: 15px">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    Por favor corrige los siguientes errores:<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h3>Bienvenida</h3>
            <p>
            </p>
            <p>Ingresa</p>
                <form class="m-t" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" name="email" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            </form>
            <p class="m-t"> <small>&copy; Zangles</small> </p>
        </div>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('/js/bootstrap.min.js') }}"></script>

</body>

</html>