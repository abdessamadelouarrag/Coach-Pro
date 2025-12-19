<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation Confirmée | COACHPRO</title>
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
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    animation: {
                        'bounce-slow': 'bounce 3s infinite',
                    }
                } 
            } 
        }
    </script>
    <style>
        .glow-orange {
            box-shadow: 0 0 40px rgba(255, 107, 0, 0.2);
        }
        .text-gradient {
            background: linear-gradient(to right, #FF6B00, #FFA500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-brand-dark text-white min-h-screen flex flex-col items-center justify-center p-6 relative overflow-hidden">

    <!-- Background Decorative Elements -->
    <div class="absolute top-[-10%] left-[-10%] w-72 h-72 bg-brand-orange/10 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-[-10%] right-[-10%] w-96 h-96 bg-brand-orange/5 rounded-full blur-[150px]"></div>

    <!-- Main Content Card -->
    <div class="max-w-2xl w-full text-center z-10 animate-fade-in">
        
        <!-- Success Icon -->
        <div class="mb-8 relative inline-block">
            <div class="absolute inset-0 bg-brand-orange rounded-full blur-2xl opacity-20 animate-pulse"></div>
            <div class="relative bg-brand-card border-2 border-brand-orange/30 w-24 h-24 rounded-full flex items-center justify-center mx-auto glow-orange">
                <i data-lucide="party-popper" class="w-12 h-12 text-brand-orange animate-bounce-slow"></i>
            </div>
        </div>

        <!-- Heading -->
        <h1 class="text-4xl md:text-5xl font-bold mb-4">C'est <span class="text-gradient">Confirmé !</span></h1>
        <p class="text-brand-gray text-lg mb-8">Bravo <span class="text-white font-semibold"></span>, vous venez de faire le premier pas vers votre meilleure version.</p>

        <!-- Motivation Section -->
        <div class="bg-brand-card border border-white/10 rounded-3xl p-8 mb-10 relative overflow-hidden">
            <div class="absolute top-0 right-0 p-4 opacity-5">
                <i data-lucide="quote" class="w-20 h-20"></i>
            </div>
            
            <i data-lucide="zap" class="w-8 h-8 text-brand-orange mx-auto mb-4"></i>
            <h3 class="text-xl font-bold italic mb-4">"La sueur d'aujourd'hui est la force de demain."</h3>
        </div>

        <!-- Summary Info Small -->
        <div class="flex flex-wrap justify-center gap-6 mb-12">
            <div class="flex items-center gap-2 text-sm text-brand-gray">
                <i data-lucide="calendar-check" class="w-4 h-4 text-green-500"></i>
                Séance ajoutée au calendrier
            </div>
            <div class="flex items-center gap-2 text-sm text-brand-gray">
                <i data-lucide="bell" class="w-4 h-4 text-brand-orange"></i>
                Rappel 1h avant le début
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="user.php" class="flex items-center justify-center gap-3 bg-brand-orange hover:bg-orange-600 text-white font-bold py-4 px-10 rounded-2xl shadow-xl shadow-brand-orange/20 transition-all transform hover:scale-105 active:scale-95">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                Aller au tableau de bord
            </a>
        </div>

        <!-- Support Link -->
        <p class="mt-12 text-xs text-brand-gray">
            Un problème ? <a href="#" class="text-brand-orange hover:underline">Contactez le support</a> ou modifiez votre séance depuis votre profil.
        </p>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>