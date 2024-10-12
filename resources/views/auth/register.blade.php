<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Register Rumah Tahfiz</title>
        <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
    </head>
    <body>
        <div class="blop"></div>
        <div class="wrapper">
            <form id="registerForm" method="POST" action="{{ route('register') }}">
                @csrf
                <h2>REGISTER</h2>
                <!-- Name -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="name" name="name" required value="{{ old('name') }}" />
                    <label for="name">Name</label>
                </div>
                <!-- Email Address -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" id="email" name="email" required value="{{ old('email') }}" />
                    <label for="email">Email</label>
                </div>
                <!-- Password -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" name="password" required />
                    <label for="password">Password</label>
                </div>
        <!-- Confirm Password -->
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password_confirmation" name="password_confirmation" required />
                    <label for="password_confirmation">Confirm Password</label>
                </div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li style="margin-left: 53px; margin-top: -3px; color: red;">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <button type="submit" ><p>REGISTER</p></button>

                <div class="register-link">
                    <p style="margin-top: -1rem;">Sudah memiliki akun? <a href="{{ route('login') }}">Login di sini</a></p>
                </div>
            </form>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>
</html>
