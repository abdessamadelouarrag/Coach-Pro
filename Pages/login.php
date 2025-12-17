<?php
include __DIR__ . "/../Config/connect.php";


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - CoachPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: { extend: { colors: { brand: { orange: '#FF6B00', dark: '#0a0a0a', card: '#121212', gray: '#A1A1AA' } }, fontFamily: { sans: ['Poppins', 'sans-serif'] } } }
        }
    </script>
</head>
<body class="bg-brand-dark text-white flex items-center justify-center h-screen">

    <div class="w-full max-w-md p-8 bg-brand-card rounded-2xl border border-white/10 shadow-2xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-brand-orange">Connexion</h1>
            <p class="text-brand-gray text-sm mt-2">Accédez à votre espace personnel</p>
        </div>

        <form action="coach.html" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-brand-gray mb-2">Email</label>
                <input type="email" class="w-full px-4 py-3 bg-brand-dark border border-white/10 rounded-lg focus:outline-none focus:border-brand-orange text-white placeholder-gray-600" placeholder="exemple@mail.com">
            </div>
            <div>
                <label class="block text-sm font-medium text-brand-gray mb-2">Mot de passe</label>
                <input type="password" class="w-full px-4 py-3 bg-brand-dark border border-white/10 rounded-lg focus:outline-none focus:border-brand-orange text-white placeholder-gray-600" placeholder="••••••••">
            </div>
            
            <button type="button" onclick="window.location.href='coach.php'" class="w-full py-3 bg-brand-orange hover:bg-orange-600 rounded-lg font-bold text-white transition-colors">
                Se connecter (Démo Coach)
            </button>
            <button type="button" onclick="window.location.href='user.php'" class="w-full py-3 bg-transparent border border-brand-orange text-brand-orange hover:bg-brand-orange/10 rounded-lg font-bold transition-colors">
                Se connecter (Démo Sportif)
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-brand-gray">
            Pas encore de compte ? <a href="signup.html" class="text-brand-orange hover:underline">S'inscrire</a>
        </p>
    </div>

</body>
</html>