<?php
include __DIR__ . "/../Config/connect.php";
session_start();

if (!isset($_SESSION["id_user"]) ) {
    header("Location: login.php");
    exit();
}

if($_SESSION["role"] !== "Sportif"){
    header("Location: coach.php");
    exit();
}

$nomuser = $_SESSION["nom"];

$sql = "SELECT user.id_user, user.nom, user.specialite, user.image, user.role, disponibilite.id_coach
        FROM user INNER JOIN disponibilite ON disponibilite.id_coach = user.id_user
        WHERE user.role = 'Coach'
        GROUP BY user.id_user, user.nom, user.specialite, user.image, user.role";

$result = mysqli_query($connect, $sql);

$all = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql2 = "SELECT * FROM disponibilite";
$result2 = mysqli_query($connect, $sql2);
$all2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

$dispoDeCoach = [];

foreach($all2 as $dispo){
    $dispoDeCoach[$dispo['id_coach']][] = $dispo;
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Sportif</title>
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
<body class="bg-brand-dark text-white pb-10 relative">

    <!-- Navbar -->
    <nav class="bg-brand-card border-b border-white/10 py-4 mb-8 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <span class="text-xl font-bold">COACH<span class="text-brand-orange">PRO</span> <span class="text-xs font-normal text-brand-gray ml-2">| Espace Sportif</span></span>
            <div class="flex items-center gap-4">
                <span class="text-sm text-brand-gray hidden md:block">Bienvenue, <?= $nomuser ?></span>
                <img src="/Public/Images/noprofile.jpeg" class="w-10 h-10 rounded-full border-2 border-brand-orange">
                <a href="login.php" class="text-sm text-red-500 hover:text-red-400">Sortir</a>
            </div>
        </div>
    </nav>

    <!-- BANNER WELCOME SPORTIF -->
    <div class="m-4 md:m-10 relative group">
        <div class="relative w-full h-56 md:h-72 rounded-3xl overflow-hidden shadow-2xl">
            <!-- Image dynamique (Sport/Action) -->
            <img src="https://images.unsplash.com/photo-1517836357463-d25dfeac3438?q=80&w=2670&auto=format&fit=crop" 
                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-60">
            
            <!-- Filtre dégradé Orange vers Noir -->
            <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-brand-dark via-brand-dark/60 to-brand-orange/20"></div>

            <!-- Contenu -->
            <div class="absolute inset-0 flex flex-col justify-center px-8 md:px-16">
                <span class="inline-block text-brand-orange font-bold tracking-widest text-xs uppercase mb-2">Go Hard or Go Home</span>
                <h1 class="text-2xl md:text-5xl font-bold text-white mb-4 leading-tight">
                    Prêt à dépasser <br>
                    <span class="text-stroke-white text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-400">vos limites ?</span>
                </h1>
                <p class="text-gray-300 max-w-xl text-[9px] md:text-[15px] mb-8">
                    "Le seul mauvais entraînement est celui que tu n'as pas fait." <br>
                    Regardez les créneaux disponibles aujourd'hui.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4">
        
        <!-- SECTION 1: Historique & Gestion Réservations -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6 flex items-center gap-2">
                <i data-lucide="calendar-check" class="text-brand-orange"></i> Mes Réservations
            </h2>
            <div class="bg-brand-card rounded-2xl overflow-hidden border border-white/10">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse min-w-[600px]">
                        <thead>
                            <tr class="bg-brand-surface text-brand-gray text-xs uppercase tracking-wider">
                                <th class="p-4">Coach</th>
                                <th class="p-4">Date & Heure</th>
                                <th class="p-4">Type</th>
                                <th class="p-4">Statut</th>
                                <th class="p-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/5 text-sm" id="reservationTable">
                            <tr class="hover:bg-brand-surface/50 transition group" id="row-1">
                                <td class="p-4 font-semibold flex items-center gap-3">
                                    <img src="https://i.pravatar.cc/150?img=11" class="w-8 h-8 rounded-full">
                                    Jean Dupont
                                </td>
                                <td class="p-4 text-white">24 Oct, 14:00</td>
                                <td class="p-4">Musculation</td>
                                <td class="p-4"><span class="px-2 py-1 bg-green-500/10 text-green-500 rounded-full text-[8px] border border-green-500/20">Confirmé</span></td>
                                <td class="p-4 text-right">
                                    <div class="flex justify-end gap-2 opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button onclick="openEditModal('Jean Dupont', '2023-10-24', '14:00')" class="p-2 bg-brand-surface border border-white/10 rounded-lg hover:bg-blue-500/20 hover:text-blue-400 hover:border-blue-500/50 transition" title="Modifier">
                                            <i data-lucide="pencil" class="w-4 h-4"></i>
                                        </button>
                                        <button onclick="openCancelModal('Jean Dupont', '24 Oct, 14:00')" class="p-2 bg-brand-surface border border-white/10 rounded-lg hover:bg-red-500/20 hover:text-red-500 hover:border-red-500/50 transition" title="Annuler">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Ligne 2 : En attente (Annulable uniquement) -->
                            <tr class="hover:bg-brand-surface/50 transition group" id="row-2">
                                <td class="p-4 font-semibold flex items-center gap-3">
                                    <img src="https://i.pravatar.cc/150?img=5" class="w-8 h-8 rounded-full">
                                    Maria Lopez
                                </td>
                                <td class="p-4 text-white">28 Oct, 09:00</td>
                                <td class="p-4">Yoga</td>
                                <td class="p-4"><span class="px-2 py-1 bg-yellow-500/10 text-yellow-500 rounded-full text-[7px] border border-yellow-500/20">En attente</span></td>
                                <td class="p-4 text-right">
                                    <div class="flex justify-end gap-2 opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity">
                                        <button onclick="openCancelModal('Maria Lopez', '28 Oct, 09:00')" class="p-2 bg-brand-surface border border-white/10 rounded-lg hover:bg-red-500/20 hover:text-red-500 hover:border-red-500/50 transition" title="Annuler">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Ligne 3 : Terminée (Aucune action) -->
                            <tr class="bg-brand-surface/20 opacity-60">
                                <td class="p-4 font-semibold flex items-center gap-3">
                                    <img src="https://i.pravatar.cc/150?img=60" class="w-8 h-8 rounded-full grayscale">
                                    Marc Steel
                                </td>
                                <td class="p-4">10 Oct, 18:00</td>
                                <td class="p-4">Crossfit</td>
                                <td class="p-4"><span class="px-2 py-1 bg-gray-500/20 text-gray-400 rounded-full text-[8px] border border-gray-500/20">Terminé</span></td>
                                <td class="p-4 text-right text-xs text-brand-gray">
                                    Aucune action
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- SECTION 2: Trouver et Réserver un Coach (Gardée identique) -->
        <div id="reservation-section">
            <h2 class="text-3xl font-bold flex items-center gap-2 mb-6">
                <i data-lucide="search" class="text-brand-orange"></i> Réserver une séance
            </h2>        
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            foreach($all as $row){
                echo "
                    <!-- COACH CARD 1 -->
                    <div class='bg-brand-card border border-white/10 rounded-2xl p-6 hover:border-brand-orange/50 transition duration-300'>
                        <div class='flex items-center gap-4 mb-4'>
                            <img src=" . $row["image"] . " class='w-16 h-16 object-cover rounded-full border-2 border-brand-orange'>
                            <div>
                                <h3 class='font-bold text-lg'>". $row["nom"] ."</h3>
                                <p class='text-brand-orange text-sm font-semibold'>". $row["specialite"] ."</p>
                            </div>
                        </div>
                        <div class='border-t border-white/5 pt-4'>
                        <a href='reservation.php?idcoach=". $row["id_coach"] ."'>
                            <button class='btn-reserv p-2 bg-orange-600/50 rounded-md hover:bg-orange-600'>Voir les info</button>
                        </a>
                            <div class='flex flex-wrap gap-2'>
                            </div>
                        </div>
                    </div>";
            }
            ?>
            </div>
        </div>

    </div>

    <!-- ================= MODALS ================= -->

    <!--  MODAL RESERVATION (Création) -->
    <div id="bookingModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md p-6 bg-brand-card border border-white/10 rounded-2xl shadow-2xl">
            <h3 class="text-xl font-bold text-white mb-4">Nouvelle Réservation</h3>
            <div class="bg-brand-surface p-4 rounded-xl border border-white/5 mb-4">
                <p id="bookCoach" class="font-semibold text-brand-orange">Coach : <?= $nomuser ?></p>
                <p id="bookDate" class="text-sm text-white">Date</p>
            </div>
            <textarea class="w-full bg-brand-dark border border-white/10 rounded-lg p-3 text-sm mb-4 h-20" placeholder="Note pour le coach..."></textarea>
            <div class="grid grid-cols-2 gap-4">
                <button class="close-model py-2 border border-white/10 rounded-lg">Annuler</button>
                <button class="py-2 bg-brand-orange rounded-lg font-bold">Confirmer</button>
            </div>
        </div>
    </div>

    <!-- MODAL MODIFICATION (Bleu/Orange) -->
    <div id="editModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="closeAllModals()"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md p-6 bg-brand-card border border-white/10 rounded-2xl shadow-2xl animate-fade-in">
            <div class="flex items-center gap-3 mb-6">
                <div class="p-2 bg-blue-500/10 rounded-lg text-blue-500"><i data-lucide="calendar-days" class="w-6 h-6"></i></div>
                <h3 class="text-xl font-bold text-white">Modifier la séance</h3>
            </div>
            
            <p class="text-sm text-brand-gray mb-4">Avec <span id="editCoachName" class="text-white font-semibold">Coach</span></p>

            <div class="space-y-4 mb-6">
                <div>
                    <label class="text-xs text-brand-gray block mb-1">Nouvelle Date</label>
                    <input type="date" class="w-full bg-brand-surface border border-white/10 rounded-lg p-3 text-white focus:border-blue-500 outline-none">
                </div>
                <div>
                    <label class="text-xs text-brand-gray block mb-1">Nouvelle Heure</label>
                    <input type="time" class="w-full bg-brand-surface border border-white/10 rounded-lg p-3 text-white focus:border-blue-500 outline-none">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <button onclick="closeAllModals()" class="py-3 bg-transparent border border-white/10 text-white rounded-lg hover:bg-white/5 transition">Annuler</button>
                <button onclick="confirmAction('edit')" class="py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-500 transition shadow-[0_0_15px_rgba(37,99,235,0.3)]">Enregistrer</button>
            </div>
        </div>
    </div>

    <!-- 3. MODAL ANNULATION (Rouge/Danger) -->
    <div id="cancelModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="closeAllModals()"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-sm p-6 bg-brand-card border border-red-500/30 rounded-2xl shadow-2xl animate-fade-in">
            <div class="flex flex-col items-center text-center mb-6">
                <div class="w-16 h-16 bg-red-500/10 rounded-full flex items-center justify-center mb-4">
                    <i data-lucide="alert-triangle" class="w-8 h-8 text-red-500"></i>
                </div>
                <h3 class="text-xl font-bold text-white">Annuler la réservation ?</h3>
                <p class="text-sm text-brand-gray mt-2">Cette action est irréversible. Le coach sera notifié.</p>
                <div class="mt-4 bg-brand-surface px-4 py-2 rounded text-sm text-white w-full">
                    <span id="cancelDetails">Détails</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <button onclick="closeAllModals()" class="py-3 bg-transparent border border-white/10 text-white rounded-lg hover:bg-white/5 transition">Retour</button>
                <button onclick="confirmAction('cancel')" class="py-3 bg-red-600 text-white rounded-lg font-semibold hover:bg-red-500 transition shadow-[0_0_15px_rgba(220,38,38,0.3)]">Oui, Annuler</button>
            </div>
        </div>
    </div>

    <!-- TOAST NOTIFICATIONS -->
    <div id="toastSuccess" class="fixed bottom-5 right-5 bg-green-600 text-white px-6 py-4 rounded-xl shadow-2xl transform translate-y-40 opacity-0 transition-all duration-500 z-50 flex items-center gap-3">
        <i data-lucide="check-circle" class="w-6 h-6"></i>
        <div>
            <h4 class="font-bold">Succès !</h4>
            <p id="toastMessage" class="text-xs text-green-100">Action effectuée.</p>
        </div>
    </div>

    <div id="toastDelete" class="fixed bottom-5 right-5 bg-red-600 text-white px-6 py-4 rounded-xl shadow-2xl transform translate-y-40 opacity-0 transition-all duration-500 z-50 flex items-center gap-3">
        <i data-lucide="trash-2" class="w-6 h-6"></i>
        <div>
            <h4 class="font-bold">Annulé</h4>
            <p class="text-xs text-red-100">La réservation a été supprimée.</p>
        </div>
    </div>

    <script src="/Public/Js/modelReservation.js"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>