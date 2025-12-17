<?php
include __DIR__ . "/../Config/connect.php";

$sql = "SELECT utilisateurs.nom, utilisateurs.email, reservation.date_reservation from utilisateurs
        inner join reservation on reservation.id_sportif = utilisateurs.id_user";

$result = mysqli_query($connect, $sql);

$all = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Coach - CoachPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Icons -->
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
    <nav class="bg-brand-card border-b border-white/10 py-4 mb-8 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <span class="text-xl font-bold">COACH<span class="text-brand-orange">PRO</span> <span class="text-xs font-normal text-brand-gray ml-2">| Espace Coach</span></span>
            <div class="flex items-center gap-4">
                <img src="https://i.pravatar.cc/150?img=11" class="w-10 h-10 rounded-full border-2 border-brand-orange">
                <a href="login.php" class="text-sm text-red-500 hover:text-red-400">Sortir</a>
            </div>
        </div>
    </nav>

    <!-- BANNER WELCOME COACH -->
    <div class="max-w-7xl mx-auto px-4 mb-8">
        <div class="relative w-full h-48 md:h-64 rounded-3xl overflow-hidden shadow-2xl group">
            <!-- Image de fond avec effet de zoom au survol -->
            <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?q=80&w=2575&auto=format&fit=crop"
                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">

            <!-- Dégradé sombre pour lisibilité du texte -->
            <div class="absolute inset-0 bg-gradient-to-r from-brand-dark via-brand-dark/80 to-transparent"></div>

            <!-- Contenu Texte -->
            <div class="relative z-10 h-full flex flex-col justify-center px-8 md:px-12">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-3 py-1 bg-brand-orange text-white text-xs font-bold uppercase tracking-wider rounded-full">Espace Pro</span>
                    <span class="text-brand-gray text-xs flex items-center gap-1">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div> En ligne
                    </span>
                </div>
                <h1 class="text-2xl md:text-4xl font-bold text-white mb-2">
                    Ravi de vous revoir, <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-orange to-yellow-500">Jean !</span>
                </h1>
                <p class="text-gray-300 text-[10px] md:text-base max-w-lg mb-6">
                    Vous avez <strong class="text-white">3 demandes</strong> en attente et votre prochaine séance commence dans <strong class="text-white">2 heures</strong>.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- COLONNE GAUCHE: Stats & Profil -->
        <div class="lg:col-span-1 space-y-8">

            <!-- Carte Profil -->
            <div class="bg-brand-card p-6 rounded-2xl border border-white/10">
                <h3 class="text-lg font-bold mb-4 border-l-4 border-brand-orange pl-3">Mon Profil</h3>
                <form class="space-y-4">
                    <div class="flex justify-center mb-4 relative">
                        <img src="/Public/Images/noprofile.jpeg" class="image-profile w-24 h-24 rounded-full object-cover border-4 border-brand-surface">
                    </div>
                    <div>
                        <label class="text-xs text-brand-gray">Nom Complet</label>
                        <input type="text" value="FULL NAME HERE!" class="w-full bg-brand-surface p-2 rounded text-sm border border-white/5 focus:border-brand-orange outline-none">
                    </div>
                    <div>
                        <label class="text-xs text-brand-gray">Spécialité</label>
                        <input type="text" value="SPECIALITE !" class="w-full bg-brand-surface p-2 rounded text-sm border border-white/5 focus:border-brand-orange outline-none">
                    </div>
                    <div>
                        <label class="text-xs text-brand-gray">Bio</label>
                        <input type="text" value="BIO..." class="w-full bg-brand-surface p-2 rounded text-sm border border-white/5 focus:border-brand-orange outline-none">
                    </div>
                    <div>
                        <label class="text-xs text-brand-gray">Url Image</label>
                        <input type="url" value="URl IMAGE" class="url-image w-full bg-brand-surface p-2 rounded text-sm border border-white/5 focus:border-brand-orange outline-none">
                    </div>
                    <button class="w-full py-2 bg-brand-surface border border-brand-orange/50 text-brand-orange text-sm rounded hover:bg-brand-orange hover:text-white transition-colors">Enregistrer les modifications</button>
                </form>
            </div>

            <!-- Tableau Descriptif (Stats) -->
            <div class="bg-brand-card p-6 rounded-2xl border border-white/10">
                <h3 class="text-lg font-bold mb-4 border-l-4 border-brand-orange pl-3">Statistiques</h3>
                <div class="grid grid-cols-2 gap-4 text-center">
                    <div class="bg-brand-surface p-4 rounded-xl">
                        <p class="text-3xl font-bold text-brand-orange">142</p>
                        <p class="text-xs text-brand-gray">Séances Données</p>
                    </div>
                    <div class="bg-brand-surface p-4 rounded-xl">
                        <p class="text-3xl font-bold text-white">28</p>
                        <p class="text-xs text-brand-gray">Clients Actifs</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- COLONNE DROITE: Gestion -->
        <div class="lg:col-span-2 space-y-8">

            <!-- Gestion des demandes (Acceptation) -->
            <div class="bg-brand-card p-6 rounded-2xl border border-white/10">
                <h3 class="text-lg font-bold mb-6 flex justify-between items-center">
                    <span class="border-l-4 border-brand-orange pl-3">Demandes de Réservation</span>
                    <span class="bg-brand-orange/20 text-brand-orange text-xs px-2 py-1 rounded">3 En attente</span>
                </h3>

                <?php
                foreach($all as $row){
                    echo "
                    <div class='space-y-4'>
                        <!-- Item -->
                        <div class='flex items-center justify-between bg-brand-surface p-4 rounded-xl border border-white/5'>
                            <div class='flex items-center gap-3'>
                                <img src='https://i.pravatar.cc/150?img=2' class='w-10 h-10 rounded-full'>
                                <div>
                                    <p class='font-semibold text-sm'>". $row["nom"] ."</p>
                                    <p class='text-xs text-brand-gray'>". $row["date_reservation"] ."</p>
                                </div>
                            </div>
                            <div class='flex gap-2'>
                                <button class='p-2 bg-green-500/20 text-green-500 rounded hover:bg-green-500 hover:text-white transition'><i data-lucide='check' class='w-4 h-4'></i></button>
                                <button class='p-2 bg-red-500/20 text-red-500 rounded hover:bg-red-500 hover:text-white transition'><i data-lucide='x' class='w-4 h-4'></i></button>
                            </div>
                        </div>  
                    </div> <br>";
                }
                ?>
            </div>
        </div>

        <!-- Création de Disponibilité -->
        <div class="bg-brand-card p-6 rounded-2xl border border-white/10">
            <h3 class="text-lg font-bold mb-4 border-l-4 border-brand-orange pl-3">Ajouter une Disponibilité</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                <div>
                    <label class="text-xs text-brand-gray mb-1 block">Date</label>
                    <input type="date" class="w-full bg-brand-surface p-3 rounded-lg border border-white/10 text-white scheme-dark">
                </div>
                <div>
                    <label class="text-xs text-brand-gray mb-1 block">Heure</label>
                    <input type="time" class="w-full bg-brand-surface p-3 rounded-lg border border-white/10 text-white scheme-dark">
                </div>
                <button class="bg-brand-orange hover:bg-orange-600 text-white font-bold py-3 rounded-lg transition-colors flex items-center justify-center gap-2">
                    <i data-lucide="plus-circle" class="w-4 h-4"></i> Ajouter
                </button>
            </div>

            <!-- Liste des créneaux actuels -->
            <div class="mt-6">
                <h4 class="text-sm font-semibold text-brand-gray mb-3">Créneaux ouverts :</h4>
                <div class="flex flex-wrap gap-2">
                    <span class="h-[60px] px-3 py-1 bg-brand-surface border border-brand-orange/30 text-xs rounded-full flex items-center gap-2">
                        Lun 24 Oct - 10:00 <i data-lucide="trash-2" class="w-4 h-4 text-red-600 cursor-pointer"></i>
                    </span>
                    <span class="px-3 py-1 bg-brand-surface border border-brand-orange/30 text-xs rounded-full flex items-center gap-2">
                        Mer 26 Oct - 14:00 <i data-lucide="trash-2" class="w-4 h-4 text-red-600 cursor-pointer"></i>
                    </span>
                </div>
            </div>
        </div>

    </div>
    </div>

    <script src="/Public/Js/imageview.js"></script>
</body>

</html>