<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .login-content {
            margin-left: 150px;
        }
        .wave {
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: -1;
        }
        .img img {
            width: 100%;
        }input:focus {
            background-color: transparent; 
            outline: none;
            border-bottom: 2px solid #3CB371; 
            transition: border-bottom 0.3s ease; 
        }
        
        

        

        
    </style>
</head>
<body>
    <img class="wave" src="{{ asset('images/wave.png') }}" alt="Wave">
    <div class="container">
        <div class="img">
            <img src="{{ asset('images/bg.svg') }}" alt="Background">
        </div>
        <div class="login-content">
            <form method="POST" action="{{ route('login') }}">
                @csrf 
                <img src="{{ asset('images/avatar.svg') }}" alt="Avatar">
                <h2 class="title">Login</h2>

                <!-- Pesan Error -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Input Email -->
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5 class="teksinput">Email</h5>
                        <input type="email" name="email" class="input" required>
                    </div>
                </div>

                <!-- Input Password -->
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5 class="teksinput">Password</h5>
                        <input type="password" name="password" class="input" required>
                    </div>
                </div>

                <!-- Tombol Login -->
                <div style="margin-top:30px" class="logindong">
                    <input type="submit" class="btn" value="Login">
                    <div class="login-link">
                        <b><p><a href="{{ route('register') }}" style="color:#3CB371;">Register</a></p></b>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
