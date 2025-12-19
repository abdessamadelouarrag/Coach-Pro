<?php 
include __DIR__ . "/../Config/connect.php";
session_start();

$nomuser = $_SESSION["nom"];

if(isset($_GET["idcoach"])){
    $idcoach = $_GET["idcoach"];
    $sqlcoach = "SELECT * FROM user WHERE id_user = '$idcoach'";

    $results = mysqli_query($connect, $sqlcoach);

    if($coach = mysqli_fetch_assoc($results)){
        $nom = $coach["nom"];
        $specialite = $coach["specialite"];
        $experience = $coach["experience"];
        $certifications = $coach["certifications"];
        $image = $coach["image"];
        $bio = $coach["bio"];
    }

    $sqldispo = "SELECT * FROM disponibilite WHERE id_user = '$idcoach'";
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
                    fontFamily: { sans: ['Poppins', 'sans-serif'] } 
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
                    <h2 class="text-2xl font-bold mb-2">Réserver votre séance</h2>
                    <p class="text-brand-gray text-sm mb-8">Choisissez le créneau qui vous convient le mieux pour atteindre vos objectifs.</p>

                    <form action="process_reservation.php" method="POST" class="space-y-6">
                        <input type="hidden" name="id_coach" value="<?= $id_coach ?>">

                        <!-- Date Selection -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-brand-gray mb-2">Choisir une date</label>
                                <div class="relative">
                                    <i data-lucide="calendar" class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-brand-gray"></i>
                                    <input type="date" required name="date_rdv" class="w-full bg-brand-surface border border-white/10 rounded-xl py-3 pl-10 pr-4 focus:border-brand-orange outline-none transition">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-brand-gray mb-2">Type de séance</label>
                                <select name="type_session" class="w-full bg-brand-surface border border-white/10 rounded-xl py-3 px-4 focus:border-brand-orange outline-none transition">
                                    <option>Perte de poids</option>
                                    <option>Prise de masse</option>
                                    <option>Remise en forme</option>
                                    <option>Cardio Training</option>
                                </select>
                            </div>
                        </div>

                        <!-- Time Slots (Dynamic from DB) -->
                        <div>
                            <label class="block text-sm font-medium text-brand-gray mb-3">Créneaux disponibles</label>
                            <div class="grid grid-cols-3 md:grid-cols-4 gap-3">
                                <?php if(empty($slots)): ?>
                                    <p class="text-xs text-red-400 col-span-full">Aucun créneau configuré pour le moment.</p>
                                <?php else: ?>
                                    <?php foreach($slots as $slot): ?>
                                        <label class="relative cursor-pointer group">
                                            <input type="radio" name="id_dispo" value="<?= $slot['id_dispo'] ?>" class="peer sr-only" required>
                                            <div class="text-center p-3 bg-brand-surface border border-white/5 rounded-xl peer-checked:border-brand-orange peer-checked:bg-brand-orange/10 group-hover:border-white/20 transition">
                                                <span class="block text-sm font-bold"><?= $slot['heure_debut'] ?></span>
                                                <span class="block text-[10px] text-brand-gray"><?= $slot['date'] ?></span>
                                            </div>
                                        </label>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                            <label class="block text-sm font-medium text-brand-gray mb-2">Message ou objectif spécifique (Optionnel)</label>
                            <textarea name="notes" rows="4" placeholder="Ex: Je souhaite me concentrer sur le bas du corps..." class="w-full bg-brand-surface border border-white/10 rounded-xl p-4 focus:border-brand-orange outline-none transition"></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-brand-orange hover:bg-orange-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-brand-orange/20 transition-all transform hover:scale-[1.01] active:scale-95 flex items-center justify-center gap-2">
                            <i data-lucide="check-circle" class="w-5 h-5"></i>
                            Confirmer la réservation
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