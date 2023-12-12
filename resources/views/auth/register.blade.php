<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-box {
            max-width: 300px;
            background: #f1f7fe;
            overflow: hidden;
            border-radius: 16px;
            color: #010101;
            margin: 50px auto;
        }

        .form {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 32px 24px 24px;
            gap: 16px;
            text-align: center;
        }

        /*Form text*/
        .title {
            font-weight: bold;
            font-size: 1.6rem;
        }

        .subtitle {
            font-size: 1rem;
            color: #666;
        }

        /*Inputs box*/
        .form-container {
            overflow: hidden;
            border-radius: 8px;
            background-color: #fff;
            margin: 1rem 0 .5rem;
            width: 100%;
        }

        .input {
            background: none;
            border: 0;
            outline: 0;
            height: 40px;
            width: 100%;
            border-bottom: 1px solid #eee;
            font-size: .9rem;
            padding: 8px 15px;
        }

        .form-section {
            padding: 16px;
            font-size: .85rem;
            background-color: #e0ecfb;
            box-shadow: rgb(0 0 0 / 8%) 0 -1px;
        }

        .form-section a {
            font-weight: bold;
            color: #0066ff;
            transition: color .3s ease;
        }

        .form-section a:hover {
            color: #005ce6;
            text-decoration: underline;
        }

        /*Button*/
        .form button {
            background-color: #0066ff;
            color: #fff;
            border: 0;
            border-radius: 24px;
            padding: 10px 16px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color .3s ease;
        }

        .form button:hover {
            background-color: #005ce6;
        }

        /* Error messages */
        .error-message {
            color: #dc3545;
            font-size: 0.85rem;
            margin-top: 4px;
        }
    </style>
</head>

<body>
    <div class="form-box">
        <form class="form" method="POST" action="{{ route('register') }}">
            @csrf
            <span class="title">Registro</span>            
            <div class="form-container">
                <input type="text" name="full_name" class="input" placeholder="Nombre Completo" value="{{ old('full_name') }}" required>
                @error('full_name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
                <input type="text" name="ci" class="input" placeholder="CI" value="{{ old('ci') }}" required>
                @error('ci')
                    <span class="error-message">{{ $message }}</span>
                @enderror
                <input type="email" name="email" class="input" placeholder="Email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
                <input type="text" name="phone" class="input" placeholder="Telefono" value="{{ old('Phone') }}" required>
                @error('phone')
                    <span class="error-message">{{ $message }}</span>
                @enderror
                <input type="password" name="password" class="input" placeholder="Contraseña" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
                <input type="password" name="password_confirmation" class="input" placeholder="Confirmar Contraseña" required>
                @error('password_confirmation')
                    <span class="error-message">{{ $message }}</span>
                @enderror
                
                <select name="status" class="input" style="display:none;">
                    <option value="A" selected>Active</option>
                </select>
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="form-section">
            <p>Ya tienes una cuenta? <a href="/login">Iniciar Sesion</a> </p>
        </div>
    </div>
</body>

</html>
