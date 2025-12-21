<?php
include __DIR__ . "/../Config/connect.php";
session_start();

if (!isset($_SESSION["id_user"])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION["role"] !== "Sportif") {
    header("Location: coach.php");
    exit();
}

$nomuser = $_SESSION["nom"];
$iduser = $_SESSION["id_user"];

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

foreach ($all2 as $dispo) {
    $dispoDeCoach[$dispo['id_coach']][] = $dispo;
}

$sqlres = "SELECT user.nom, user.image, user.specialite, reservation.id_reservation, reservation.date_reservation, reservation.heure_debut, reservation.heure_fin, reservation.id_sportif, reservation.status 
            from user inner join reservation on user.id_user = reservation.id_coach WHERE id_sportif = '$iduser'";

$resultres = mysqli_query($connect, $sqlres);

$allres = mysqli_fetch_all($resultres, MYSQLI_ASSOC);
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
                        <?php foreach ($allres as $row): ?>
                            <tbody class="divide-y divide-white/5 text-sm" id="reservationTable">
                                <tr class="hover:bg-brand-surface/50 transition group" id="row-1">
                                    <td class="p-4 font-semibold flex items-center gap-3">
                                        <img src="<?= $row["image"] ?>" class="w-8 h-8 rounded-full object-cover">
                                        <?= $row["nom"] ?>
                                    </td>
                                    <td class="p-4 text-white"><?= $row["date_reservation"] ?></td>
                                    <td class="p-4"><?= $row["specialite"] ?></td>
                                    <td class="p-4">
                                        <span class="text-xs px-2 py-1 rounded 
                                        <?= $row['status'] == 'accepted' ? 'bg-green-500/20 text-green-500' : ($row['status'] == 'refused' ? 'bg-red-500/20 text-red-500' : 'bg-yellow-500/20 text-yellow-400') ?>">
                                            <?= htmlspecialchars($row["status"]) ?>
                                        </span>
                                    <td class="p-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="reservation.php?edit=<?= $row['id_reservation'] ?>">
                                                <button class="p-2 bg-brand-surface border border-white/10 rounded-lg hover:bg-blue-500/20 hover:text-blue-400 hover:border-blue-500/50 transition" title="Modifier">
                                                    <i data-lucide="pencil" class="w-4 h-4"></i>
                                                </button>
                                            </a>
                                            <a href="deleteReserv.php?delete=<?= $row["id_reservation"] ?>" onclick="return confirm('tu est sure ?')">
                                                <button class="p-2 bg-brand-surface border border-white/10 rounded-lg hover:bg-red-500/20 hover:text-red-500 hover:border-red-500/50 transition" title="Annuler">
                                                    <i data-lucide="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
                foreach ($all as $row) {
                    echo "
                    <!-- COACH CARD 1 -->
                    <div class='bg-brand-card border border-white/10 rounded-2xl p-6 hover:border-brand-orange/50 transition duration-300'>
                        <div class='flex items-center gap-4 mb-4'>
                            <img src=" . $row["image"] . " class='w-16 h-16 object-cover rounded-full border-2 border-brand-orange'>
                            <div>
                                <h3 class='font-bold text-lg'>" . $row["nom"] . "</h3>
                                <p class='text-brand-orange text-sm font-semibold'>" . $row["specialite"] . "</p>
                            </div>
                        </div>
                        <div class='border-t border-white/5 pt-4'>
                        <a href='reservation.php?idcoach=" . $row["id_coach"] . "'>
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