@extends('layouts.app')

@section('content')

<main class="max-w-7xl mx-auto px-4 py-6">

        <!-- Must Watch Section -->
        <section>
            <h2 class="text-xl font-bold mb-4">{{ $article->title }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
               <div class="md:col-span-2">

                    <img
                        src="{{ asset('storage/' . $article->cover_image) }}"
                        alt="Couverture de la vidéo"
                        class="w-full h-92 object-cover">

                    <!-- Boutons de partage -->
                    <div class="mt-4">
                        <span class="text-xs text-slate-500"><i class="fa fa-clock mr-1"></i>Date de Publication : <b>{{ now()->subDays(1)->diffForHumans() }}</b></span>
                        <p class="text-sm font-semibold mb-2">Partager cette vidéo :</p>
                        <div class="flex space-x-4">
                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank"
                            class="text-blue-600 hover:text-blue-800 text-xl">
                                <i class="fab fa-facebook-square"></i>
                            </a>

                            <!-- Twitter / X -->
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}" target="_blank"
                            class="text-blue-400 hover:text-blue-600 text-xl">
                                <i class="fab fa-x-twitter"></i>
                            </a>

                            <!-- WhatsApp -->
                            <a href="https://api.whatsapp.com/send?text={{ urlencode(request()->fullUrl()) }}" target="_blank"
                            class="text-green-500 hover:text-green-700 text-xl">
                                <i class="fab fa-whatsapp"></i>
                            </a>

                            <!-- LinkedIn -->
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->fullUrl()) }}" target="_blank"
                            class="text-blue-700 hover:text-blue-900 text-xl">
                                <i class="fab fa-linkedin"></i>
                            </a>

                        </div>
                    </div>
                </div>

            </div>

            <div class="tex text-gray-700 text-justify sm:pt-0 pt-4" style="line-height: 1;">
                {!! $news->content !!} <br>
            </div>
        </section>

        <!-- Section Commentaires -->
        <section class="mt-8">
            <h3 class="text-xl font-semibold mb-4">Commentaires ({{ $article->comments->count() }})</h3>

            <!-- Formulaire de commentaire -->
            <form action="{{ route('commentaires.store', $article->id ) }}" method="POST" class="mb-6">
                @csrf
                {{-- <input type="hidden" name="video_id" value="{{ $video->id }}"> --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="author">Nom</label>
                    <input type="text" name="guest_name" id="author" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="author">Email</label>
                    <input type="text" name="guest_email" id="gemail" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1" for="content">Commentaire</label>
                    <textarea name="content" id="content" rows="3" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <button type="submit"
                        class="bg-yellow-500 text-white px-4 py-2 mb-3 rounded hover:bg-yellow-600 transition">
                    Publier
                </button>
            </form>

            <!-- Liste des commentaires -->
            <div class="space-y-4">
                @forelse ($article->comments as $comment)
                    <div class="bg-white p-4 rounded-md shadow-sm border">
                        <p class="text-sm font-semibold text-gray-800">{{ $comment->guest_name }}</p>
                        <div class="text-gray-600 text-sm mt-1">
                            {!! $comment->content !!}
                        </div>
                        <p class="text-xs text-gray-400 mt-1">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                @empty
                    <p class="text-gray-500">Aucun commentaire pour l’instant.</p>
                @endforelse
            </div>
        </section>

    </main>
@endsection
