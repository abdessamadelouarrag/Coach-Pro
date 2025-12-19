<?php
include __DIR__ . "/../Config/connect.php";
session_start();

$msg = "";

if (isset($_POST['submit'])) {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM user WHERE email = '$email'";
    
    $all = mysqli_query($connect, $sql);
    
    if(empty($email) || empty($password)) {
        $msg = "<p class='text-red-700 bg-red-400/20 p-2 rounded-[10px] shadow-[0_2px_2px_rgba(250,0,1,0.7)] transition-all duration-300 ease-in-out'>Veuillez remplir tous les champs</p>";
    }

    if(mysqli_num_rows($all) == 1){

        $result = mysqli_fetch_assoc($all);

    
        $hashpassword = $result['mot_de_passe'];
        $rolecheck = $result['role'];


        if (password_verify($password, $hashpassword)) {

            $_SESSION["nom"] = $result["nom"];
            $_SESSION["id_user"] = $result["id_user"];
            
            if ($rolecheck == "Coach") {
                header("Location: coach.php");
                exit();
            }
            if($rolecheck == "Sportif"){
                header("Location: user.php");
                exit();
            }
        }

        else{
            $msg = "<p class='msg-error text-red-700 bg-red-400/20 p-2 rounded-[10px] shadow-[0_2px_2px_rgba(250,0,1,0.7)] transition-all duration-300 ease-in-out'>Mot De Passe !!!</p>";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
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

<body class="bg-gradient-to-br from-black via-gray-900 to-orange-600 text-white flex items-center justify-center h-screen">

    <div class="m-7 md:m-0 w-full max-w-md p-8 bg-brand-card rounded-2xl border border-white/10 shadow-2xl">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-brand-orange">Connexion</h1>
            <p class="text-brand-gray text-sm mt-2">Accédez à votre espace personnel</p>
        </div>

        <form action="" method="POST" class="space-y-6">
            <?= $msg ?>
            <div>
                <label class="block text-sm font-medium text-brand-gray mb-2">Email</label>
                <input type="email" name="email" class="w-full px-4 py-3 bg-brand-dark border border-white/10 rounded-lg focus:outline-none focus:border-brand-orange text-white placeholder-gray-600" placeholder="exemple@mail.com">
            </div>
            <div>
                <label class="block text-sm font-medium text-brand-gray mb-2">Mot de passe</label>
                <input type="password" name="password" class="w-full px-4 py-3 bg-brand-dark border border-white/10 rounded-lg focus:outline-none focus:border-brand-orange text-white placeholder-gray-600" placeholder="••••••••">
            </div>

            <button type="submit" name="submit" class="w-full py-3 bg-brand-orange hover:bg-orange-600 rounded-lg font-bold text-white transition-colors">
                Se connecter
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-brand-gray">
            <a href="/index.php" class="text-brand-orange hover:underline">Reteurn Ou Accueil ⭢</a>
        </p>
        <p class="mt-6 text-center text-sm text-brand-gray">
            Pas encore de compte ? <a href="signup.php" class="text-brand-orange hover:underline">S'inscrire</a>
        </p>
    </div>
</body>

</html>