<?php
session_start();
include __DIR__ . "/../Config/connect.php";

// verification session
if (!isset($_SESSION["id_user"])) {
    header("Location: login.php");
    exit();
}

// verification role
if ($_SESSION["role"] !== "Coach") {
    header("Location: user.php");
    exit();
}

$iduser = $_SESSION["id_user"];
$nomuser = $_SESSION["nom"];

// recuparation profil coach
$sql = "SELECT * FROM user WHERE id_user = '$iduser'";
$result = mysqli_query($connect, $sql);
$user = mysqli_fetch_assoc($result);

$nom = $user['nom'];
$specialite = $user['specialite'];
$experiences = $user['experience'];
$certification = $user['certifications'];
$bio = $user['bio'];
$urlimage = $user['image'];

// ajouter une disponibilite
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["form"] === "dispo") {
    $date = $_POST["date"];
    $heure_debut = $_POST["heure_debut"];
    $heure_fin = $_POST["heure_fin"];

    $sqlinsert = "INSERT INTO disponibilite (id_coach, date, heure_debut, heure_fin) VALUES ('$iduser', '$date', '$heure_debut', '$heure_fin')";

    mysqli_query($connect, $sqlinsert);
    header("Location: coach.php?dispo-added");
    exit();
}

// modifier profil
if ($_SERVER["REQUEST_METHOD"] === "POST" && $_POST["form"] === "edit-form") {
    $newimage = $_POST["url_image"];
    $newspecialite = $_POST["specialite"];
    $newexperiences = $_POST["experiences"];
    $newcertification = $_POST["certification"];
    $newbio = $_POST["bio"];

    $sqledit = "UPDATE user SET image = '$newimage',specialite = '$newspecialite',experience = '$newexperiences',certifications = '$newcertification',bio = '$newbio' WHERE id_user = '$iduser'";
    mysqli_query($connect, $sqledit);
    header("Location: coach.php?edit-profile");
    exit();
}

// supprimer disponibilite
if (isset($_GET['delet'])) {
    $id_dispo = $_GET['delet'];

    $sql_res = "DELETE FROM reservation WHERE id_disponibilite = '$id_dispo'";
    mysqli_query($connect, $sql_res);

    $sqldelete = "DELETE FROM disponibilite WHERE id_disponibilite = '$id_dispo'";
    mysqli_query($connect, $sqldelete);
    header("Location: coach.php?delete-success");
    exit();
}

// recuperer disponibilites
$sqlshowdispo = "SELECT * FROM disponibilite WHERE id_coach = '$iduser' ORDER BY date ASC, heure_debut ASC";
$resultshow = mysqli_query($connect, $sqlshowdispo);
$allshow = mysqli_fetch_all($resultshow, MYSQLI_ASSOC);

// recuperer demandes reservation
$sqlreserv = "SELECT r.id_reservation, r.date_reservation, r.heure_debut, r.heure_fin, r.status, u.nom AS nom_sportif
            FROM reservation r
            INNER JOIN user u ON r.id_sportif = u.id_user
            WHERE r.id_coach = '$iduser'
            ORDER BY r.date_reservation DESC, r.heure_debut DESC";

$resultreserv = mysqli_query($connect, $sqlreserv);
$allreserv = mysqli_fetch_all($resultreserv, MYSQLI_ASSOC);

//part accepter reserv

if(isset($_GET['accepter'])){
    $idreserv = $_GET['accepter'];

    $sqlaccept = "UPDATE reservation SET status = 'accepted' WHERE id_reservation = '$idreserv'";

    $resultaccept = mysqli_query($connect, $sqlaccept);

}

if(isset($_GET['refuser'])){
    $idreserv = $_GET['refuser'];

    $sqlrefu = "UPDATE reservation SET status = 'refused' WHERE id_reservation = '$idreserv'";
    $resultaccept = mysqli_query($connect, $sqlrefu);
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Coach</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/Public/Css/style.css">
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
    <style>
        .modal-active {
            display: flex !important;
        }
    </style>
</head>

<body class="bg-brand-dark text-white pb-10">

    <!-- Navbar -->
    <nav class="bg-brand-card border-b border-white/10 py-4 mb-8 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <span class="text-xl font-bold">COACH<span class="text-brand-orange">PRO</span> <span class="text-xs font-normal text-brand-gray ml-2">| Espace Coach</span></span>
            <div class="flex items-center gap-4">
                <img src="<?= $urlimage ?? '/Public/Images/noprofile.jpeg' ?>" class="w-10 h-10 rounded-full border-2 border-brand-orange">
                <a href="login.php" class="text-sm text-red-500 hover:text-red-400">Sortir</a>
            </div>
        </div>
    </nav>

    <!-- BANNER -->
    <div class="max-w-7xl mx-auto px-4 mb-8">
        <div class="relative w-full h-48 md:h-64 rounded-3xl overflow-hidden shadow-2xl group">
            <img src="https://images.unsplash.com/photo-1571902943202-507ec2618e8f?q=80&w=2575&auto=format&fit=crop"
                class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-r from-brand-dark via-brand-dark/80 to-transparent"></div>
            <div class="relative z-10 h-full flex flex-col justify-center px-8 md:px-12">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-3 py-1 bg-brand-orange text-white text-xs font-bold uppercase tracking-wider rounded-full">Espace Pro</span>
                    <span class="text-brand-gray text-xs flex items-center gap-1">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div> En ligne
                    </span>
                </div>
                <h1 class="text-2xl md:text-4xl font-bold text-white mb-2">
                    Ravi de vous revoir, <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-orange to-yellow-500"><?= $nomuser ?></span>
                </h1>
            </div>
        </div>
    </div>

    <!-- MAIN GRID LAYOUT -->
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- SECTION 1: SIDEBAR (Profil Display) -->
        <div class="lg:col-span-1 space-y-8">
            <div class="bg-brand-card p-6 rounded-2xl border border-white/10">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-bold border-l-4 border-brand-orange pl-3">Mon Profil</h3>
                    <button class="flex items-center gap-2 text-xs bg-brand-surface px-3 py-1.5 rounded-lg border border-white/10 hover:border-brand-orange transition-all">
                        <i data-lucide="edit-3" class="w-3 h-3 text-brand-orange"></i> Modifier
                    </button>
                </div>

                <div class="flex flex-col items-center mb-6">
                    <img src="<?= $urlimage ?? '/Public/Images/noprofile.jpeg' ?>" class="w-24 h-24 rounded-full object-cover border-4 border-brand-surface mb-3 shadow-xl">
                    <h2 class="text-xl font-bold"><?= $nom ?></h2>
                    <p class="text-brand-orange text-sm font-medium"><?= $specialite ?></p>
                </div>

                <div class="space-y-4">
                    <div class="bg-brand-surface/50 p-3 rounded-lg">
                        <label class="text-[10px] uppercase tracking-widest text-brand-gray block mb-1">Expériences</label>
                        <p class="text-sm"><?= $experiences ?></p>
                    </div>
                    <div class="bg-brand-surface/50 p-3 rounded-lg">
                        <label class="text-[10px] uppercase tracking-widest text-brand-gray block mb-1">Certification</label>
                        <p class="text-sm"><?= $certification ?></p>
                    </div>
                    <div class="bg-brand-surface/50 p-3 rounded-lg">
                        <label class="text-[10px] uppercase tracking-widest text-brand-gray block mb-1">Bio</label>
                        <p class="text-sm text-gray-300 leading-relaxed"><?= $bio ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: MAIN CONTENT -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Statistiques -->
            <div class="bg-brand-card p-6 rounded-2xl border border-white/10">
                <h3 class="text-lg font-bold mb-4 border-l-4 border-brand-orange pl-3">Statistiques</h3>
                <div class="grid grid-cols-2 gap-4 text-center">
                    <div class="bg-brand-surface p-4 rounded-xl">
                        <p class="text-3xl font-bold text-brand-orange"><?= count($allshow) ?></p>
                        <p class="text-xs text-brand-gray">Séances Données</p>
                    </div>
                    <div class="bg-brand-surface p-4 rounded-xl">
                        <p class="text-3xl font-bold text-white">28</p>
                        <p class="text-xs text-brand-gray">Clients Actifs</p>
                    </div>
                </div>
            </div>

            <!-- Demandes -->
            <div class="bg-brand-card p-6 rounded-2xl border border-white/10">
                <h3 class="text-lg font-bold mb-6 flex justify-between items-center">
                    <span class="border-l-4 border-brand-orange pl-3">Demandes de Réservation</span>
                    <span class="bg-brand-orange/20 text-brand-orange text-xs px-2 py-1 rounded">En attente</span>
                </h3>
                <div class="bg-brand-card p-1 rounded-2xl border border-white/10 w-full h-72 overflow-auto scrollbar-res">
    
                    <?php foreach ($allreserv as $row): ?>
                        <div class="flex items-center justify-between bg-brand-surface p-4 rounded-xl border border-white/5 mb-4">
                            <div class="flex items-center gap-3">
                                <div class="bg-brand-orange/10 p-2 rounded-lg text-brand-orange">
                                    <i data-lucide="user" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-sm text-white"><?= htmlspecialchars($row["nom_sportif"]) ?></p>
                                    <p class="text-[8px] md:text-xs text-brand-gray"><?= $row["date_reservation"] ?> | <?= $row["heure_debut"] ?> - <?= $row["heure_fin"] ?></p>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <span class="text-[8px] md:text-xs px-2 py-1 rounded 
                                <?= $row['status'] == 'accepted' ? 'bg-green-500/20 text-green-500' : ($row['status'] == 'refused' ? 'bg-red-500/20 text-red-500' : 'bg-yellow-500/20 text-yellow-400') ?>">
                                    <?= htmlspecialchars($row["status"]) ?>
                                </span>
                                <a href="coach.php?accepter=<?= $row["id_reservation"] ?>">
                                    <button class="p-2 bg-green-500/20 text-green-500 rounded hover:bg-green-500 hover:text-white transition">
                                        <i data-lucide="check" class="w-4 h-4"></i>
                                    </button>
                                </a>
                                <a href="coach.php?refuser=<?= $row["id_reservation"] ?>">
                                    <button class="p-2 bg-red-500/20 text-red-500 rounded hover:bg-red-500 hover:text-white transition">
                                        <i data-lucide="x" class="w-4 h-4"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
    
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL POPUP FOR EDITING -->
    <div id="editModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[100] hidden items-center justify-center p-4">
        <div class="bg-brand-card w-full max-w-lg rounded-2xl border border-white/10 shadow-2xl overflow-hidden animate-in fade-in zoom-in duration-200">
            <div class="p-6 border-b border-white/10 flex justify-between items-center">
                <h3 class="text-xl font-bold">Modifier mon profil</h3>
                <button class="text-brand-gray hover:text-white"><i data-lucide="x"></i></button>
            </div>

            <form class="p-6 space-y-4" method="POST">
                <input type="hidden" name="form" value="edit-form">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="text-xs text-brand-gray">URL de l'image de profil</label>
                        <input type="url" value="<?= $urlimage ?>" name="url_image" class="w-full bg-brand-surface p-2.5 rounded-lg text-sm border border-white/10 focus:border-brand-orange outline-none">
                    </div>
                    <div>
                        <label class="text-xs text-brand-gray">Spécialité</label>
                        <input type="text" value="<?= $specialite ?>" name="specialite" class="w-full bg-brand-surface p-2.5 rounded-lg text-sm border border-white/10 focus:border-brand-orange outline-none">
                    </div>
                    <div>
                        <label class="text-xs text-brand-gray">Expériences</label>
                        <input type="text" value="<?= $experiences ?>" name="experiences" class="w-full bg-brand-surface p-2.5 rounded-lg text-sm border border-white/10 focus:border-brand-orange outline-none">
                    </div>
                    <div class="md:col-span-2">
                        <label class="text-xs text-brand-gray">Certification</label>
                        <input type="text" value="<?= $certification ?>" name="certification" class="w-full bg-brand-surface p-2.5 rounded-lg text-sm border border-white/10 focus:border-brand-orange outline-none">
                    </div>
                    <div class="md:col-span-2">
                        <label class="text-xs text-brand-gray">Bio</label>
                        <textarea name="bio" rows="3" class="w-full bg-brand-surface p-2.5 rounded-lg text-sm border border-white/10 focus:border-brand-orange outline-none"><?= $bio ?></textarea>
                    </div>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="button"   class="flex-1 py-3 bg-brand-surface text-white text-sm rounded-lg hover:bg-white/5 transition-colors">Annuler</button>
                    <button type="submit" name="submit" class="flex-1 py-3 bg-brand-orange text-white text-sm font-bold rounded-lg hover:bg-orange-600 transition-colors shadow-lg shadow-brand-orange/20">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    <!-- SECTION : AJOUTER UNE DISPONIBILITÉ -->
    <div class="bg-brand-card p-6 rounded-2xl border border-white/10 m-7 md:mx-11">
        <h3 class="text-lg font-bold mb-4 border-l-4 border-brand-orange pl-3">Ajouter une Disponibilité</h3>

        <form action="" method="POST" class="space-y-4">
            <input type="hidden" name="form" value="dispo">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <!-- Date -->
                <div>
                    <label class="text-xs text-brand-gray mb-1 block">Date</label>
                    <div class="relative">
                        <input type="date" name="date" required
                            class="w-full bg-brand-surface p-3 pl-10 rounded-lg border border-white/10 text-white focus:border-brand-orange outline-none scheme-dark">
                        <i data-lucide="calendar" class="w-4 h-4 absolute left-3 top-3.5 text-brand-orange"></i>
                    </div>
                </div>

                <!-- Heure Début -->
                <div>
                    <label class="text-xs text-brand-gray mb-1 block">Heure de début</label>
                    <div class="relative">
                        <input type="time" name="heure_debut" required
                            class="w-full bg-brand-surface p-3 pl-10 rounded-lg border border-white/10 text-white focus:border-brand-orange outline-none scheme-dark">
                        <i data-lucide="clock" class="w-4 h-4 absolute left-3 top-3.5 text-brand-orange"></i>
                    </div>
                </div>

                <!-- Heure Fin -->
                <div>
                    <label class="text-xs text-brand-gray mb-1 block">Heure de fin</label>
                    <div class="relative">
                        <input type="time" name="heure_fin" required
                            class="w-full bg-brand-surface p-3 pl-10 rounded-lg border border-white/10 text-white focus:border-brand-orange outline-none scheme-dark">
                        <i data-lucide="clock-9" class="w-4 h-4 absolute left-3 top-3.5 text-brand-orange"></i>
                    </div>
                </div>

                <!-- Bouton Ajouter -->
                <button type="submit" name="add_dispo" class="bg-brand-orange hover:bg-orange-600 text-white font-bold py-3 rounded-lg transition-all flex items-center justify-center gap-2 shadow-lg shadow-brand-orange/20">
                    <i data-lucide="plus-circle" class="w-5 h-5"></i> Ajouter le créneau
                </button>
            </div>
        </form>

        <!-- LISTE DES CRÉNEAUX ACTUELS -->
        <div class="mt-10">
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-sm font-semibold text-brand-gray uppercase tracking-wider">Vos créneaux ouverts</h4>
                <span class="text-[10px] bg-brand-surface px-2 py-1 rounded text-brand-gray border border-white/5">Total: <?= count($allshow) ?> créneaux</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <!-- créneau -->
                <?php
                foreach ($allshow as $row) {
                    echo "
                        <div class='flex items-center justify-between bg-brand-surface p-4 rounded-xl border border-white/5 group hover:border-brand-orange/50 transition-all'>
                            <div class='flex items-center gap-4'>
                                <div class='bg-brand-orange/10 p-2 rounded-lg text-brand-orange'>
                                    <i data-lucide='calendar-check' class='w-5 h-5'></i>
                                </div>
                                <div>
                                    <p class='text-sm font-bold'>" . $row['date'] . "</p>
                                    <p class='text-xs text-brand-gray flex items-center gap-1'>
                                        <i data-lucide='clock' class='w-3 h-3'></i> " . $row['heure_debut'] . " — " . $row['heure_fin'] . "
                                    </p>
                                </div>
                            </div>
                            <a href='coach.php?delet=" . $row["id_disponibilite"] . "'>
                                <button class='p-2 text-brand-gray hover:text-red-500 hover:bg-red-500/10 rounded-full transition-all'>
                                    <i data-lucide='trash-2' class='w-4 h-4'></i>
                                </button>
                            </a>
                        </div>";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="/Public/Js/alertDelete.js"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>