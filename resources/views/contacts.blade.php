<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact - TV Channel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    <!-- Header -->
    <header class="bg-black text-white flex items-center px-4 py-3">
        <div class="bg-pink-600 text-white text-2xl font-bold px-2 py-1 mr-2">TV</div>
        <div class="text-xl font-light">CHANNEL</div>
        <nav class="ml-auto space-x-6 text-sm uppercase">
            <a href="/" class="hover:text-pink-500">Accueil</a>
            <a href="/shows" class="hover:text-pink-500">Émissions</a>
            <a href="/contact" class="border-b-2 border-white">Contact</a>
        </nav>
    </header>

    <!-- Contenu principal -->
    <main class="max-w-3xl mx-auto px-4 py-10">
        <h1 class="text-3xl font-bold text-center mb-8">Contactez-nous</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- <form method="POST" action="{{ route('contact.send') }}" class="space-y-6 bg-white p-6 rounded shadow"> --}}
        <form method="POST" action="{{ url('') }}" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf
            <div>
                <label class="block text-sm font-medium mb-1">Nom</label>
                <input type="text" name="name" required
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Email</label>
                <input type="email" name="email" required
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Sujet</label>
                <input type="text" name="subject" required
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium mb-1">Message</label>
                <textarea name="message" rows="5" required
                          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
            </div>

            <button type="submit"
                    class="bg-pink-600 text-white px-6 py-2 rounded hover:bg-pink-700 transition">
                Envoyer <i class="fas fa-paper-plane ml-2"></i>
            </button>
        </form>
    </main>

</body>
</html>
