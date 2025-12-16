<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Sportif - CoachPro</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-brand-dark text-white pb-10 relative">

    <!-- Navbar -->
    <nav class="bg-brand-card border-b border-white/10 py-4 mb-8 sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <span class="text-xl font-bold">COACH<span class="text-brand-orange">PRO</span> <span class="text-xs font-normal text-brand-gray ml-2">| Espace Sportif</span></span>
            <div class="flex items-center gap-4">
                <span class="text-sm text-brand-gray hidden md:block">Bienvenue, Thomas</span>
                <img src="https://i.pravatar.cc/150?img=68" class="w-10 h-10 rounded-full border-2 border-brand-orange">
                <a href="login.html" class="text-sm text-red-500 hover:text-red-400">Sortir</a>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4">
        
        <!-- SECTION 1: Historique Rapide -->
        <div class="mb-12">
            <div class="bg-gradient-to-r from-brand-surface to-brand-card p-6 rounded-2xl border border-white/10 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h2 class="text-xl font-bold text-white">Vos séances à venir</h2>
                    <p class="text-brand-gray text-sm">Vous avez 1 séance confirmée cette semaine.</p>
                </div>
                <button class="px-6 py-2 bg-white/5 border border-white/10 rounded-full text-sm hover:bg-white/10 transition">
                    Voir tout l'historique
                </button>
            </div>
        </div>

        <!-- SECTION 2: Trouver et Réserver un Coach -->
        <div id="reservation-section">
            <div class="flex flex-col md:flex-row justify-between items-end mb-6 gap-4">
                <div>
                    <h2 class="text-3xl font-bold flex items-center gap-2">
                        <i data-lucide="dumbbell" class="text-brand-orange"></i> Réserver une séance
                    </h2>
                    <p class="text-brand-gray mt-1">Choisissez votre coach et cliquez sur un créneau pour réserver.</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                
                <!-- COACH CARD 1 -->
                <div class="bg-brand-card border border-white/10 rounded-2xl p-6 hover:border-brand-orange/50 transition duration-300 group flex flex-col h-full">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="relative">
                            <img src="https://i.pravatar.cc/150?img=11" class="w-16 h-16 rounded-full border-2 border-brand-orange object-cover">
                            <div class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 border-2 border-brand-card rounded-full"></div>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Jean Dupont</h3>
                            <div class="flex items-center gap-1">
                                <i data-lucide="star" class="w-3 h-3 text-brand-orange fill-brand-orange"></i>
                                <span class="text-sm font-bold">4.9</span>
                                <span class="text-xs text-brand-gray">(142 avis)</span>
                            </div>
                            <p class="text-brand-orange text-sm font-semibold mt-1">Musculation</p>
                        </div>
                    </div>
                    
                    <p class="text-brand-gray text-sm mb-6 flex-grow">
                        Spécialiste en transformation physique. Je vous aide à atteindre vos objectifs de prise de masse ou de sèche.
                    </p>
                    
                    <div class="border-t border-white/5 pt-4">
                        <p class="text-xs font-semibold text-white uppercase mb-3 flex items-center gap-2">
                            <i data-lucide="calendar" class="w-3 h-3"></i> Créneaux disponibles
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <button onclick="openModal('Jean Dupont', 'Musculation', 'Lundi 24 Oct - 14:00')" 
                                class="px-3 py-2 bg-brand-surface border border-white/20 text-xs rounded hover:bg-brand-orange hover:border-brand-orange hover:text-white transition cursor-pointer">
                                Lun 14:00
                            </button>
                            <button onclick="openModal('Jean Dupont', 'Musculation', 'Mardi 25 Oct - 09:00')" 
                                class="px-3 py-2 bg-brand-surface border border-white/20 text-xs rounded hover:bg-brand-orange hover:border-brand-orange hover:text-white transition cursor-pointer">
                                Mar 09:00
                            </button>
                            <button onclick="openModal('Jean Dupont', 'Musculation', 'Vendredi 28 Oct - 18:00')" 
                                class="px-3 py-2 bg-brand-surface border border-white/20 text-xs rounded hover:bg-brand-orange hover:border-brand-orange hover:text-white transition cursor-pointer">
                                Ven 18:00
                            </button>
                        </div>
                    </div>
                </div>

                <!-- COACH CARD 2 -->
                <div class="bg-brand-card border border-white/10 rounded-2xl p-6 hover:border-brand-orange/50 transition duration-300 group flex flex-col h-full">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="relative">
                            <img src="https://i.pravatar.cc/150?img=5" class="w-16 h-16 rounded-full border-2 border-brand-orange object-cover">
                            <div class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 border-2 border-brand-card rounded-full"></div>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Maria Lopez</h3>
                            <div class="flex items-center gap-1">
                                <i data-lucide="star" class="w-3 h-3 text-brand-orange fill-brand-orange"></i>
                                <span class="text-sm font-bold">5.0</span>
                                <span class="text-xs text-brand-gray">(89 avis)</span>
                            </div>
                            <p class="text-brand-orange text-sm font-semibold mt-1">Yoga & Pilates</p>
                        </div>
                    </div>
                    
                    <p class="text-brand-gray text-sm mb-6 flex-grow">
                        Cours axés sur la souplesse, la respiration et le renforcement des muscles profonds.
                    </p>
                    
                    <div class="border-t border-white/5 pt-4">
                        <p class="text-xs font-semibold text-white uppercase mb-3 flex items-center gap-2">
                            <i data-lucide="calendar" class="w-3 h-3"></i> Créneaux disponibles
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <button onclick="openModal('Maria Lopez', 'Yoga', 'Mercredi 26 Oct - 07:00')" 
                                class="px-3 py-2 bg-brand-surface border border-white/20 text-xs rounded hover:bg-brand-orange hover:border-brand-orange hover:text-white transition cursor-pointer">
                                Mer 07:00
                            </button>
                            <button onclick="openModal('Maria Lopez', 'Yoga', 'Jeudi 27 Oct - 19:00')" 
                                class="px-3 py-2 bg-brand-surface border border-white/20 text-xs rounded hover:bg-brand-orange hover:border-brand-orange hover:text-white transition cursor-pointer">
                                Jeu 19:00
                            </button>
                        </div>
                    </div>
                </div>

                 <!-- COACH CARD 3 -->
                 <div class="bg-brand-card border border-white/10 rounded-2xl p-6 hover:border-brand-orange/50 transition duration-300 group flex flex-col h-full">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="relative">
                            <img src="https://i.pravatar.cc/150?img=60" class="w-16 h-16 rounded-full border-2 border-brand-orange object-cover">
                            <div class="absolute bottom-0 right-0 w-4 h-4 bg-gray-500 border-2 border-brand-card rounded-full"></div>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Marc Steel</h3>
                            <div class="flex items-center gap-1">
                                <i data-lucide="star" class="w-3 h-3 text-brand-orange fill-brand-orange"></i>
                                <span class="text-sm font-bold">4.7</span>
                                <span class="text-xs text-brand-gray">(210 avis)</span>
                            </div>
                            <p class="text-brand-orange text-sm font-semibold mt-1">Crossfit</p>
                        </div>
                    </div>
                    
                    <p class="text-brand-gray text-sm mb-6 flex-grow">
                        Haute intensité. Préparation physique générale. Dépassez vos limites avec moi.
                    </p>
                    
                    <div class="border-t border-white/5 pt-4">
                        <p class="text-xs font-semibold text-white uppercase mb-3 flex items-center gap-2">
                            <i data-lucide="calendar" class="w-3 h-3"></i> Créneaux disponibles
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <button onclick="openModal('Marc Steel', 'Crossfit', 'Lundi 24 Oct - 18:00')" 
                                class="px-3 py-2 bg-brand-surface border border-white/20 text-xs rounded hover:bg-brand-orange hover:border-brand-orange hover:text-white transition cursor-pointer">
                                Lun 18:00
                            </button>
                            <button onclick="openModal('Marc Steel', 'Crossfit', 'Samedi 29 Oct - 10:00')" 
                                class="px-3 py-2 bg-brand-surface border border-white/20 text-xs rounded hover:bg-brand-orange hover:border-brand-orange hover:text-white transition cursor-pointer">
                                Sam 10:00
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- MODAL DE RESERVATION (Caché par défaut) -->
    <div id="bookingModal" class="fixed inset-0 z-50 hidden">
        <!-- Overlay flou -->
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="closeModal()"></div>
        
        <!-- Contenu Modal -->
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md p-6 bg-brand-card border border-white/10 rounded-2xl shadow-2xl animate-fade-in">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white">Confirmer la Réservation</h3>
                <button onclick="closeModal()" class="text-brand-gray hover:text-white transition">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>

            <div class="space-y-4 mb-6">
                <!-- Récapitulatif -->
                <div class="bg-brand-surface p-4 rounded-xl border border-white/5 space-y-2">
                    <div class="flex justify-between">
                        <span class="text-brand-gray text-sm">Coach :</span>
                        <span id="modalCoachName" class="font-semibold text-brand-orange">Nom Coach</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-brand-gray text-sm">Discipline :</span>
                        <span id="modalType" class="font-semibold text-white">Sport</span>
                    </div>
                    <div class="w-full h-px bg-white/10 my-2"></div>
                    <div class="flex justify-between items-center">
                        <span class="text-brand-gray text-sm">Date & Heure :</span>
                        <span id="modalDate" class="font-bold text-white bg-white/10 px-2 py-1 rounded text-sm">Date</span>
                    </div>
                </div>

                <!-- Input Note -->
                <div>
                    <label class="text-xs text-brand-gray mb-1 block">Ajouter une note au coach (optionnel)</label>
                    <textarea class="w-full bg-brand-dark border border-white/10 rounded-lg p-3 text-sm focus:border-brand-orange outline-none resize-none h-20" placeholder="Ex: J'ai une douleur au genou, je veux travailler le cardio..."></textarea>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <button onclick="closeModal()" class="py-3 bg-transparent border border-white/10 text-white rounded-lg font-semibold hover:bg-white/5 transition">
                    Annuler
                </button>
                <button onclick="confirmBooking()" class="py-3 bg-brand-orange text-white rounded-lg font-semibold hover:bg-orange-600 transition shadow-[0_0_15px_rgba(255,107,0,0.3)]">
                    Confirmer
                </button>
            </div>
        </div>
    </div>

    <!-- Notification Toast (Caché par défaut) -->
    <div id="toast" class="fixed bottom-5 right-5 bg-green-600 text-white px-6 py-4 rounded-xl shadow-2xl transform translate-y-20 opacity-0 transition-all duration-500 z-50 flex items-center gap-3">
        <i data-lucide="check-circle" class="w-6 h-6"></i>
        <div>
            <h4 class="font-bold">Réservation Confirmée !</h4>
            <p class="text-xs text-green-100">Votre coach a reçu votre demande.</p>
        </div>
    </div>

    <script>
        // Initialiser les icônes
        lucide.createIcons();

        // Fonctions pour la Modal
        const modal = document.getElementById('bookingModal');
        const coachNameEl = document.getElementById('modalCoachName');
        const typeEl = document.getElementById('modalType');
        const dateEl = document.getElementById('modalDate');

        function openModal(coach, type, date) {
            coachNameEl.innerText = coach;
            typeEl.innerText = type;
            dateEl.innerText = date;
            modal.classList.remove('hidden');
        }

        function closeModal() {
            modal.classList.add('hidden');
        }

        function confirmBooking() {
            closeModal();
            // Animation du Toast
            const toast = document.getElementById('toast');
            toast.classList.remove('translate-y-20', 'opacity-0');
            
            // Cacher le toast après 3 secondes
            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
            }, 3000);
        }
    </script>
</body>
</html>