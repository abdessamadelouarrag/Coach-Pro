<?php
include __DIR__ . "/../Config/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $password = password_hash($_POST["motDePasse"], PASSWORD_DEFAULT);
    $role = $_POST["role"];

    $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe, role) VALUES ('$nom', '$email', '$password', '$role')";

    if (mysqli_query($connect, $sql)) {
        header("Location: login.php");
        exit();
    } else {
        echo "ERROR:" . mysqli_error($connect);
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - CoachPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            orange: '#FF6B00',
                            dark: '#0a0a0a',
                            card: '#121212',
                            gray: '#A1A1AA'
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-brand-dark text-white flex items-center justify-center min-h-screen py-10">

    <div class="w-full max-w-md p-8 bg-brand-card rounded-2xl border border-white/10 shadow-2xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-white">Créer un <span class="text-brand-orange">Compte</span></h1>
        </div>

        <form class="space-y-4" method="POST" onsubmit="return validInputs()">
            <p class="msg-error opacity-0 text-red-700 bg-red-400/20 p-2 rounded-[10px] shadow-[0_2px_2px_rgba(250,0,1,0.7)] transition-all duration-300 ease-in-out"></p>
            <input type="text" name="nom" placeholder="Nom" class="nom w-full px-4 py-3 bg-brand-dark border border-white/10 rounded-lg focus:border-brand-orange outline-none">

            <input type="email" name="email" placeholder="Email" class="email w-full px-4 py-3 bg-brand-dark border border-white/10 rounded-lg focus:border-brand-orange outline-none">

            <input type="password" name="motDePasse" placeholder="Mot de passe" class="motDePasse w-full px-4 py-3 bg-brand-dark border border-white/10 rounded-lg focus:border-brand-orange outline-none">

            <div class="pt-2">
                <label class="block text-sm text-brand-gray mb-2">Je suis un :</label>
                <div class="flex gap-4">
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" value="Coach" name="role" class="peer sr-only">
                        <div class="text-center py-2 rounded-lg border border-white/20 peer-checked:bg-brand-orange peer-checked:border-brand-orange transition-all">
                            Coach
                        </div>
                    </label>
                    <label class="flex-1 cursor-pointer">
                        <input type="radio" value="Sportif" name="role" class="peer sr-only">
                        <div class="text-center py-2 rounded-lg border border-white/20 peer-checked:bg-brand-orange peer-checked:border-brand-orange transition-all">
                            Sportif
                        </div>
                    </label>
                </div>
            </div>

            <button class="w-full py-3 mt-4 bg-brand-orange hover:bg-orange-600 rounded-lg font-bold text-white">S'inscrire</button>
        </form>
        <p class="mt-6 text-center text-sm text-brand-gray">
            Déjà un compte ? <a href="login.html" class="text-brand-orange hover:underline">Connexion</a>
        </p>
    </div>

    <script src="/Public/Js/validation.js"></script>
</body>

</html>