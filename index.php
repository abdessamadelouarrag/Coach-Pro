<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoachPro - Reserve Your Session</title>
    
    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            orange: '#FF6B00', // Vibrant Orange
                            dark: '#0a0a0a',   // Deep Black
                            card: '#121212',   // Slightly lighter black
                            gray: '#A1A1AA'    // Text Gray
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Smooth scrolling */
        html { scroll-behavior: smooth; }
        
        /* Custom image styling for the hero section */
        .hero-image-mask {
            mask-image: linear-gradient(to bottom, black 80%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, black 80%, transparent 100%);
        }
    </style>
</head>
<body class="bg-brand-dark text-white font-sans antialiased selection:bg-brand-orange selection:text-white">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-brand-dark/90 backdrop-blur-md border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                    <div class="w-3 h-8 bg-brand-orange rounded-sm"></div>
                    <span class="text-2xl font-bold tracking-tight">COACH<span class="text-brand-orange">PRO</span></span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-300 hover:text-brand-orange transition-colors">Home</a>
                    <a href="#about" class="text-gray-300 hover:text-brand-orange transition-colors">About</a>
                    <a href="#pricing" class="text-gray-300 hover:text-brand-orange transition-colors">Pricing</a>
                </div>

                <!-- Auth Buttons -->
                <div class="flex items-center gap-4">
                    <a href="/Pages/login.php" class="hidden md:block text-sm font-semibold text-white hover:text-brand-orange transition-colors">
                        Log In
                    </a>
                    <a href="/Pages/signup.php" class="px-6 py-2.5 bg-brand-orange text-white text-sm font-semibold rounded-full hover:bg-orange-600 transition-all shadow-[0_0_20px_rgba(255,107,0,0.3)] hover:shadow-[0_0_30px_rgba(255,107,0,0.5)]">
                        Sign Up
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="text-center lg:text-left">
                    <span class="inline-block py-1 px-3 rounded-full bg-brand-orange/10 border border-brand-orange/20 text-brand-orange text-sm font-semibold mb-6">
                        #1 Online Coaching Platform
                    </span>
                    <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-6">
                        Unlock Your <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-orange to-yellow-500">True Potential</span>
                    </h1>
                    <p class="text-brand-gray text-lg lg:text-xl mb-10 max-w-2xl mx-auto lg:mx-0">
                        Professional coaching tailored to your lifestyle. Book your session today and transform your body and mind with our expert guidance.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <button class="px-8 py-4 bg-white text-brand-dark font-bold rounded-full hover:bg-gray-200 transition-colors">
                            Book a Session
                        </button>
                        <button class="px-8 py-4 border border-white/20 text-white font-bold rounded-full hover:bg-white/10 transition-colors flex items-center justify-center gap-2">
                            <span>Learn More</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                    </div>

                    <!-- Social Proof -->
                    <div class="mt-10 flex items-center justify-center lg:justify-start gap-4 text-sm text-brand-gray">
                        <div class="flex -space-x-2">
                            <img class="w-10 h-10 rounded-full border-2 border-brand-dark" src="https://i.pravatar.cc/100?img=1" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-brand-dark" src="https://i.pravatar.cc/100?img=2" alt="User">
                            <img class="w-10 h-10 rounded-full border-2 border-brand-dark" src="https://i.pravatar.cc/100?img=3" alt="User">
                        </div>
                        <p>Trusted by <span class="text-white font-bold">500+</span> athletes</p>
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="relative">
                    <div class="absolute -inset-4 bg-brand-orange/20 blur-3xl rounded-full opacity-30"></div>
                    <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80" 
                         alt="Fitness Coach" 
                         class="relative rounded-2xl shadow-2xl border border-white/10 hero-image-mask transform rotate-2 hover:rotate-0 transition-transform duration-500">
                </div>
            </div>
        </div>
    </section>

    <!-- Info / Features Section -->
    <section id="about" class="py-20 bg-brand-card">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Why Choose Our Coaching?</h2>
                <p class="text-brand-gray">We provide comprehensive tools to ensure your success.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="p-8 rounded-2xl bg-brand-dark border border-white/5 hover:border-brand-orange/50 hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-brand-orange/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-brand-orange transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-brand-orange group-hover:text-white transition-colors">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Easy Scheduling</h3>
                    <p class="text-brand-gray">Book your sessions online in seconds. Our real-time calendar ensures you never miss a slot.</p>
                </div>

                <!-- Card 2 -->
                <div class="p-8 rounded-2xl bg-brand-dark border border-white/5 hover:border-brand-orange/50 hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-brand-orange/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-brand-orange transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-brand-orange group-hover:text-white transition-colors">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Custom Plans</h3>
                    <p class="text-brand-gray">Get a workout and nutrition plan designed specifically for your body type and goals.</p>
                </div>

                <!-- Card 3 -->
                <div class="p-8 rounded-2xl bg-brand-dark border border-white/5 hover:border-brand-orange/50 hover:-translate-y-2 transition-all duration-300 group">
                    <div class="w-14 h-14 bg-brand-orange/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-brand-orange transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-brand-orange group-hover:text-white transition-colors">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Expert Support</h3>
                    <p class="text-brand-gray">24/7 access to your coach via chat. We analyze your form and keep you motivated.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-white/10 bg-brand-dark pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
            <div class="flex items-center gap-2 mb-6">
                <div class="w-3 h-6 bg-brand-orange rounded-sm"></div>
                <span class="text-xl font-bold tracking-tight">COACH<span class="text-brand-orange">PRO</span></span>
            </div>
            <p class="text-brand-gray text-sm mb-6 text-center">
                © 2023 CoachPro Inc. All rights reserved. <br>
                Made for performance.
            </p>
            <div class="flex space-x-6">
                <a href="#" class="text-gray-500 hover:text-white transition-colors">Privacy</a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors">Terms</a>
                <a href="#" class="text-gray-500 hover:text-white transition-colors">Contact</a>
            </div>
        </div>
    </footer>

</body>
</html>