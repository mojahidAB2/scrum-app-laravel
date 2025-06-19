@extends('layouts.guest')

@section('guest-content')
    <style>
        body {
            background-color: #F9FAFB;
        }

        .login-box {
            max-width: 420px;
            width: 100%;
            margin: auto;
            padding: 40px;
            border-radius: 12px;
            background-color: #ffffff;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            color: #111827;
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #3B82F6;
        }

        .form-label {
            font-weight: 600;
            color: #111827;
            margin-bottom: 5px;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background-color: #F9FAFB;
            font-size: 15px;
            color: #111827;
        }

        .form-input:focus {
            border-color: #3B82F6;
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            background-color: #3B82F6;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .login-btn:hover {
            background-color: #2563eb;
        }

        .register-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #6366F1;
            font-weight: 500;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-box" data-aos="zoom-in">
            <h2>Connexion</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label for="email" class="form-label">Adresse e-mail</label>
                <input id="email" type="email" name="email" required autofocus class="form-input">

                <label for="password" class="form-label">Mot de passe</label>
                <input id="password" type="password" name="password" required class="form-input">

                <button type="submit" class="login-btn">Connexion</button>
            </form>

            <a href="{{ route('register') }}" class="register-link">Pas encore de compte ? S’inscrire</a>
        </div>
    </div>
@endsection
