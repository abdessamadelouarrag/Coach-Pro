<?php
include __DIR__ . "/../Config/connect.php";
session_start();

$nomuser = $_SESSION["nom"];
$iduser = $_SESSION["id_user"];

if (isset($_GET["idcoach"])) {
    $idcoach = $_GET["idcoach"];
    $sqlcoach = "SELECT * FROM user WHERE id_user = '$idcoach'";

    $results = mysqli_query($connect, $sqlcoach);

    if ($coach = mysqli_fetch_assoc($results)) {
        $nom = $coach["nom"];
        $specialite = $coach["specialite"];
        $experience = $coach["experience"];
        $certifications = $coach["certifications"];
        $image = $coach["image"];
        $bio = $coach["bio"];
    }

    $sqldispo = "SELECT * FROM disponibilite WHERE id_coach = '$idcoach'";
    $results = mysqli_query($connect, $sqldispo);

    $all = mysqli_fetch_all($results, MYSQLI_ASSOC);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $iddispo = $_POST["id_disponibilite"];

    $sqldispo = "INSERT INTO reservation ";
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            orange: '#FF6B00',
                            dark: '#0a0a0a',
                            card: '#121212',
                            gray: '#A1A1AA',
                            surface: '#1E1E1E'
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

<body class="bg-brand-dark text-white pb-10">

    <!-- Navbar -->
    <nav class="bg-brand-card border-b border-white/10 py-4 mb-8 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <a href="user.php" class="text-xl font-bold">COACH<span class="text-brand-orange">PRO</span></a>
            <div class="flex items-center gap-4">
                <span class="text-sm text-brand-gray hidden md:block">Session : <?= $nomuser ?></span>
                <img src="/Public/Images/noprofile.jpeg" class="w-10 h-10 rounded-full border-2 border-brand-orange">
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4">

        <!-- Back Button -->
        <a href="user.php" class="inline-flex items-center text-brand-gray hover:text-brand-orange mb-6 transition">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i> Retour aux coachs
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- LEFT COLUMN: COACH INFO -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-brand-card border border-white/10 rounded-3xl p-6 text-center">
                    <img src="<?= $image ?>" class="w-32 h-32 rounded-full border-4 border-brand-orange mx-auto mb-4 object-cover">
                    <h1 class="text-2xl font-bold"><?= $nom ?></h1>
                    <p class="text-brand-orange font-medium mb-4"><?= $bio ?></p>

                    <div class="flex justify-center gap-4 py-4 border-t border-white/5">
                        <div class="text-center">
                            <p class="text-xl font-bold">120+</p>
                            <p class="text-[10px] text-brand-gray uppercase">Séances</p>
                        </div>
                        <div class="w-[1px] bg-white/10"></div>
                        <div class="text-center">
                            <p class="text-xl font-bold">4.9</p>
                            <p class="text-[10px] text-brand-gray uppercase">Avis</p>
                        </div>
                    </div>
                </div>

                <!-- Experience & Certifications -->
                <div class="bg-brand-card border border-white/10 rounded-3xl p-6">
                    <h3 class="font-bold mb-4 flex items-center gap-2">
                        <i data-lucide="award" class="text-brand-orange w-5 h-5"></i>
                        Expertise & Diplômes
                    </h3>
                    <ul class="space-y-4">
                        <li class="flex gap-3">
                            <div class="mt-1"><i data-lucide="check-circle" class="w-4 h-4 text-green-500"></i></div>
                            <div>
                                <p class="text-sm font-semibold">Cetification</p>
                                <p class="text-xs text-brand-gray"><?= $certifications ?></p>

                            </div>
                        </li>
                        <li class="flex gap-3">
                            <div class="mt-1"><i data-lucide="check-circle" class="w-4 h-4 text-green-500"></i></div>
                            <div>
                                <p class="text-sm font-semibold">Spécialisation Nutrition Sportive</p>
                                <p class="text-xs text-brand-gray"><?= $specialite ?></p>
                            </div>
                        </li>
                        <li class="flex gap-3">
                            <div class="mt-1"><i data-lucide="briefcase" class="w-4 h-4 text-brand-orange"></i></div>
                            <div>
                                <p class="text-sm font-semibold">Expérience</p>
                                <p class="text-xs text-brand-gray"><?= $experience ?></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- RIGHT COLUMN: RESERVATION FORM -->
            <div class="lg:col-span-2">
                <div class="bg-brand-card border border-white/10 rounded-3xl p-8">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="p-2 bg-brand-orange/10 rounded-lg">
                            <i data-lucide="calendar-days" class="w-6 h-6 text-brand-orange"></i>
                        </div>
                        <h2 class="text-2xl font-bold">Réserver votre séance</h2>
                    </div>
                    <p class="text-brand-gray text-sm mb-8">Sélectionnez un créneau disponible parmi les propositions ci-dessous.</p>

                    <form action="after.php" method="POST" class="space-y-8">
                        <input type="hidden" name="id_coach" value="<?= $idcoach ?>">

                        <!-- Date & Time Slot Selection -->
                        <div>
                            <label class="block text-sm font-medium text-brand-gray mb-4 uppercase tracking-wider">Créneaux Disponibles</label>
                                <!-- Grid of Slots -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                    <?php foreach ($all as $dispo): ?>
                                        <label class="relative cursor-pointer group">

                                            <input type="radio" name="id_disponibilite" value="<?= $dispo['id_disponibilite'] ?>" class="peer sr-only" required>

                                            <!-- Styled Card -->
                                            <div class="h-full bg-brand-surface border border-white/10 rounded-2xl p-4 transition-all duration-200 
                                            peer-checked:border-brand-orange peer-checked:bg-brand-orange/5 peer-checked:ring-1 peer-checked:ring-brand-orange
                                            group-hover:border-white/30">

                                                <div class="flex justify-between items-start mb-2">
                                                    <span class="text-[10px] font-bold uppercase py-1 px-2 bg-white/5 rounded text-brand-gray">Session</span>
                                                    <!-- Checkmark icon that appears when selected -->
                                                    <div class="opacity-0 peer-checked:opacity-100 transition-opacity">
                                                        <i data-lucide="check-circle-2" class="w-5 h-5 text-brand-orange"></i>
                                                    </div>
                                                </div>

                                                <div class="text-white font-semibold flex items-center gap-2 mb-1">
                                                    <i data-lucide="calendar" class="w-4 h-4 text-brand-orange"></i>
                                                    <?= $dispo["date"] ?>
                                                </div>

                                                <div class="text-brand-gray text-sm flex items-center gap-2">
                                                    <i data-lucide="clock" class="w-4 h-4"></i>
                                                    <?= $dispo["heure_debut"] ?> - <?= $dispo["heure_fin"] ?>
                                                </div>
                                            </div>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                        </div>

                        <!-- Message Area -->
                        <div>
                            <label class="block text-sm font-medium text-brand-gray mb-2 uppercase tracking-wider">Message ou objectif (Optionnel)</label>
                            <textarea name="notes" rows="4"
                                placeholder="Ex: Je souhaite me concentrer sur le cardio et la perte de poids..."
                                class="w-full bg-brand-surface border border-white/10 rounded-2xl p-4 focus:border-brand-orange focus:ring-1 focus:ring-brand-orange outline-none transition duration-200 text-sm"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-brand-orange hover:bg-orange-600 text-white font-bold py-4 rounded-2xl shadow-lg shadow-brand-orange/20 transition-all transform hover:scale-[1.01] active:scale-95 flex items-center justify-center gap-3">
                            <i data-lucide="send" class="w-5 h-5"></i>
                            Confirmer la séance avec <?= $nom ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>

</html>