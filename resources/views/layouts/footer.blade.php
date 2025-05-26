<footer class="bg-gray-900 text-gray-300 text-sm pb-6">
    <div class="bg-gray-800 p-4 rounded text-yellow-500 font-medium mb-10">
        <div class="md:w-1/2 mx-auto text-center">

            <!-- Section Newsletter -->
            <h2 class="text-2xl font-semibold text-center mb-4">Abonnez-vous à notre newsletter</h2>
            <p class="text-gray-300 text-center mb-6">Recevez les dernières actualités, émissions et annonces exclusives de LMD TV.</p>

            @if(session('newsletter_success'))
                <div class="bg-green-500/20 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-center">
                    {{ session('newsletter_success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('newsletter.subscribe') }}" class="flex flex-col sm:flex-row gap-3">
                @csrf
                <input type="email" name="email" required
                    placeholder="Entrez votre email"
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-pink-500">
                <button type="submit"
                        class="bg-yellow-600 text-white px-6 py-2 rounded hover:bg-yelllow-700 transition">
                    S’abonner <i class="fas fa-envelope ml-2"></i>
                </button>
            </form>

        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Col 1: À propos -->
        <div>
            <div class="flex items-center space-x-2 mb-4">
                <img src="{{ asset('images/_logo.png') }}" alt="Logo" class="w-16 h-16 rounded-full">
                <h3 class="font-bold text-white">À propos de LUMIÈRE DIGITALE MEDIA SARL</h3>
            </div>
            <p class="mb-4 text-justify">
                LUMIÈRE DIGITALE MEDIA est une entreprise dynamique et innovante spécialisée dans les services médiatiques et de communication, avec pour mission d’éclairer le monde grâce à des contenus de qualité et une créativité exceptionnelle.
            </p>
            <div class="flex space-x-4">
                <a href="#"><i class="fab fa-facebook-f text-white hover:text-gray-400"></i></a>
                <a href="#"><i class="fab fa-x-twitter text-white hover:text-gray-400"></i></a>
                <a href="#"><i class="fab fa-instagram text-white hover:text-gray-400"></i></a>
                <a href="#"><i class="fab fa-youtube text-white hover:text-gray-400"></i></a>
            </div>
        </div>

        <!-- Col 2: Rubriques -->
        <div>
            <h4 class="text-white font-semibold mb-4">Rubriques</h4>
            <ul class="space-y-2">
                <li>Actualités</li>
                <li>Politique</li>
                <li>Économie</li>
                <li>Société</li>
                <li>Culture</li>
                <li>Tech</li>
                <li>Sports</li>
            </ul>
        </div>

        <!-- Col 3: Domaines d'expertise -->
        <div>
            <h4 class="text-white font-semibold mb-4">Nos domaines d’expertise</h4>
            <ul class="space-y-2">
                <li><span class="font-semibold text-yellow-500">Presse & Médias</span><br>Production de contenus journalistiques de qualité...</li>
                <li><span class="font-semibold text-yellow-500">Production Audiovisuelle</span><br>Réalisation de documentaires, podcasts...</li>
                <li><span class="font-semibold text-yellow-500">Communication Digitale</span><br>Stratégie numérique, réseaux sociaux...</li>
                <li><span class="font-semibold text-yellow-500">Conseil & Formation</span><br>Accompagnement, consulting en communication...</li>
            </ul>
        </div>

        <!-- Col 4: Coordonnées -->
        <div>
            <h4 class="text-white font-semibold mb-4">Nos coordonnées</h4>
            <p>KINSHASA, Commune de N’GALEMBA, Quartier MBINZA DELVAUX, Avenue MUKWALA N°52</p>
            <p class="mt-2"><i class="fa fa-phone" aria-hidden="true"></i> +243 0836 613 951 / 836 613 952</p>
            <p class="mt-2"><i class="fa fa-envelope" aria-hidden="true"></i> digitalelumiere14@gmail.com</p>
        </div>
    </div>

    <!-- Informations légales -->
    <div class="border-t border-gray-700 mt-10 pt-6 px-6 max-w-7xl mx-auto">
        <h5 class="font-semibold text-white mb-2">Informations légales et administratives</h5>
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Col gauche -->
            <div>
                <div class="bg-gray-800 p-4 rounded text-yellow-500 font-medium mb-2">
                    Identification fiscale et commerciale
                </div>
                <p>N° IMPOT : <span class="text-white">A2506067D</span></p>
                <p>Id. Nat : <span class="text-white">01-H5300-N5259W</span></p>
                <p>N°R.C.C.M : <span class="text-white">CD/KCCM24-B-04409</span></p>
            </div>

            <!-- Col droite -->
            <div>
                <div class="bg-gray-800 p-4 rounded text-yellow-500 font-medium mb-2">
                    Affiliations sociales
                </div>
                <p>N° INPP : <span class="text-white">142313.00</span></p>
                <p>N° ONEM : <span class="text-white">Q26764AA</span></p>
            </div>
        </div>
    </div>

    <!-- Bas de page -->
    <div class="text-center mt-8 text-gray-500 text-xs">
        © 2025 Lumière Digitale Media. Tous droits réservés.
        <div class="mt-2 space-x-4">
            <a href="#" class="hover:text-gray-400">Mentions légales</a>
            <a href="#" class="hover:text-gray-400">Politique de confidentialité</a>
            <a href="#" class="hover:text-gray-400">Conditions d'utilisation</a>
        </div>
    </div>
</footer>
