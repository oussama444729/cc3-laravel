<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Authentification</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-sm p-4" style="min-width: 350px; max-width: 400px; width: 100%;">
        <h3 class="text-center mb-4">Authentification</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" id="login" name="login" class="form-control @error('login') is-invalid @enderror" value="{{ old('login') }}" required autofocus>
                @error('login')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
