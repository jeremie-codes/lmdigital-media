@extends('layouts.app')

@section('title', 'Home')

@push('style')

@endpush

@section('content')
    <style>
        @media (min-width: 767px) {
            .head {
                height: 78vh;
            }

            /* .side {
                height: 78vh;
                overflow-y: scroll;
                padding-bottom: 20px;
            } */
        }
    </style>

    {{-- MAIN SECTION --}}
    <div class="md:grid grid-cols-3 gap-4 p-6">
        {{-- Big main image --}}
        <div class="col-span-2 relative">
            <div id="carousel" class="relative w-full h-full overflow-hidden head pt-0" data-carousel="slide" interval="50000">
                    <!-- Carousel wrapper -->
                <div class="relative h-full overflow-hidden pt-0">
                    <!-- Item 1 -->
                    @if($banners->isNotEmpty())

                        <div class="hidden duration-700 ease-in-out pt-0" data-carousel-item>
                            @foreach($banners as $banner)
                                <img src="{{ $banner->getImageUrl() }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
                                @if($banner->title)
                                    <div class="absolute bottom-0 left-0 w-full flex items-center justify-between">
                                        <div class="bg-blue-600 text-white px-4 py-2 text-xl font-bold">
                                            <span class="text-sm ml-2">{{ $banner->title }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="hidden duration-700 ease-in-out pt-0" data-carousel-item>
                            <img src="{{ asset('images/ban.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
                        </div>
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out pt-0" data-carousel-item>
                            <img src="{{ asset('images/ban.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
                        </div>
                    @endif

                </div>

            </div>

            {{-- ACTUALITES SHOWS --}}
            <div class="px-6 py-4 mt-2">
                <h2 class="text-xl font-bold uppercase mb-4">Actualités Récentes</h2>
                     <!-- Blog Item -->
                @forelse($lastnews as $news)
                    <div class="flex flex-col md:flex-row gap-4 border-b border-gray-300 pb-6 pt-4">
                        <div class="flex-1">
                            <h3 class="text-sm font-bold text-blue-600 uppercase">
                            {{ $news->title }}
                            </h3>
                            <div class="flex items-center gap-4 text-sm text-gray-500 my-2">
                                <span><i class="fa fa-calendar-alt" aria-hidden="true"></i>
                                    {{ \Carbon\Carbon::parse($news->scheduled_at)->format('H:i') }}
                                    {{ \Carbon\Carbon::parse($news->scheduled_at)->translatedFormat(', d F') }}</span>
                                <span><i class="fa fa-user" aria-hidden="true"></i> {{ Illuminate\Support\Str::limit(strip_tags($news->author->name), 8) }}</span>
                                <span><i class="fa fa-message" aria-hidden="true"></i> {{ $news->comments->count() }}</span>
                            </div>
                            <div class="w-full sm:flex justify-end">
                                <div class="w-full md:w-100 sm:h-38 overflow-hidden">
                                    <img src="{{ asset('storage/' . $news->cover_image ) }}" alt="Blog image" class="w-full h-full object-cover">
                                </div>
                                <div class="px-3 w-full">
                                    <div class="tex text-gray-700 text-left sm:pt-0 pt-4" style="line-height: 1;">
                                        {!! Illuminate\Support\Str::limit(strip_tags($news->content), 200) !!}
                                        <a href="{{ route('actualites.show', $news->id) }}" class="text-blue-600 text-sm px-4 font-semibold hover:underline inline-block">Voir Plus</a>
                                    </div>

                                    <div class="flex items-center space-x-4">
                                        <button type="button" id="like-count{{ $news->id }}" onclick="sendLike({{ $news->id }}, true)" class="text-green-500 cursor-pointer p-2">
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i> : {{ $news->likesCount() }}
                                        </button>
                                        <button type="button" id="dislike-count{{ $news->id }}" onclick="sendLike({{ $news->id }}, false)" class="text-red-400 cursor-pointer p-2">
                                            <i class="fa fa-thumbs-down" aria-hidden="true"></i> : {{ $news->dislikesCount() }}</
                                        </button>
                                    </div>

                                    <div class="mt-1 pb-3">
                                        <p class="text-sm font-semibold mb-2">Partager cette publication :</p>
                                        <div class="flex space-x-4">
                                            <!-- Facebook -->
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('actualites.show', $news->id)) }}" target="_blank"
                                            class="text-blue-600 hover:text-blue-800 text-sm">
                                                <i class="fab fa-facebook-square"></i>
                                            </a>

                                            <!-- Twitter / X -->
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('actualites.show', $news->id)) }}" target="_blank"
                                            class="text-blue-400 hover:text-blue-600 text-sm">
                                                <i class="fab fa-x-twitter"></i>
                                            </a>

                                            <!-- WhatsApp -->
                                            <a href="https://api.whatsapp.com/send?text={{ urlencode(route('actualites.show', $news->id)) }}" target="_blank"
                                            class="text-green-500 hover:text-green-700 text-sm">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>

                                            <!-- LinkedIn -->
                                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('actualites.show', $news->id)) }}" target="_blank"
                                            class="text-blue-700 hover:text-blue-900 text-sm">
                                                <i class="fab fa-linkedin"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <script>
                        const articleId = {{ $news->id }};
                        const localKey = `liked-${articleId}`;

                        function formatNumber(num) {
                            if (num >= 1_000_000) return (num / 1_000_000).toFixed(1).replace(/\.0$/, '') + 'M';
                            if (num >= 1_000) return (num / 1_000).toFixed(1).replace(/\.0$/, '') + 'K';
                            return num;
                        }

                        function sendLike(id, isLike) {
                            // if (localStorage.getItem(localKey)) {
                            //     alert("Vous avez déjà voté.");
                            //     return;
                            // }

                            fetch(`/like/${id}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({ is_like: isLike })
                            })
                            .then(res => res.json())
                            .then(data => {
                                document.getElementById('like-count{{ $news->id }}').innerHTML = `<i class="fa fa-thumbs-up" aria-hidden="true"></i> : ${formatNumber(data.likes)}`;
                                document.getElementById('dislike-count{{ $news->id }}').innerHTML = `<i class="fa fa-thumbs-down" aria-hidden="true"></i> : ${formatNumber(data.dislikes)}`;
                                localStorage.setItem(localKey, '{{ $news->id }}');
                            });
                        }
                    </script>
                @empty
                    <div class="text-blue-600 text-sm hover:underline mt-2 inline-block">
                        Aucune actualité disponible pour le moment.
                    </div>
                @endforelse

                @if ($lastnews->count() > 2)
                    <div class="w-full pt-4 text-right">
                        <a href="{{ url('/news') }}" class="text-blue-600 text-sm font-semibold hover:underline mt-2 inline-block uppercase">
                            Voir plus d'actualité
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
                @endif

            </div>

            {{-- VIDEOS SHOWS --}}
            <div class="px-6 py-4">
                <h2 class="text-xl font-bold uppercase mb-4">Vidéos Publiées Récemment</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($lastvideos as $video)
                        <div class="bg-white shadow">
                            <div class="relative flex items-center justify-center">
                                <img src="{{ asset('storage/' . $video->cover_image ) }}" class="w-full">
                                <a href="{{ route('actualites.show', 1) }}" class="absolute">
                                    <i class="fa fa-play-circle text-red-300 text-3xl" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="bg-blue-600 text-white px-3 py-2 text-md font-bold flex justify-between items-center">
                                <div class="flex jusify-between">
                                    <i class="fa fa-clock mr-1"></i>
                                    {{ \Carbon\Carbon::parse($video->scheduled_at)->format('H:i') }}
                                    <span class="text-sm ml-2">{{ \Carbon\Carbon::parse($video->scheduled_at)->translatedFormat(', d F ') }}</span>
                                </div>

                                <div class="flex items-center space-x-4">
                                    <button type="button" id="like-count{{ $video->id }}" onclick="sendLike2({{ $video->id }}, true)" class="text-green-500 cursor-pointer p-2">
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i> :  {{ $video->likesCount() }}
                                    </button>
                                    <button type="button" id="dislike-count{{ $video->id }}" onclick="sendLike2({{ $video->id }}, false)" class="text-red-400 cursor-pointer p-2">
                                        <i class="fa fa-thumbs-down" aria-hidden="true"></i> :  {{ $video->dislikesCount() }}
                                    </button>
                                </div>
                            </div>
                            <div class="p-3 font-semibold text-sm uppercase">
                                <a href="#">
                                    {{ $video->title }}
                                </a>
                            </div>
                            <div class="px-3 text-gray-500 text- text-left">
                                {!! Illuminate\Support\Str::limit(strip_tags($video->content), 65) !!}
                            </div>
                            <div class="pt-1 px-3 mt-1 pb-3 border-t border-gray-300">
                                <p class="text-sm font-semibold mb-2">Partager cette publication :</p>
                                <div class="flex space-x-4">
                                    <!-- Facebook -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('actualites.show', $video->id)) }}" target="_blank"
                                    class="text-blue-600 hover:text-blue-800 text-sm">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>

                                    <!-- Twitter / X -->
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('actualites.show', $video->id)) }}" target="_blank"
                                    class="text-blue-400 hover:text-blue-600 text-sm">
                                        <i class="fab fa-x-twitter"></i>
                                    </a>

                                    <!-- WhatsApp -->
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode(route('actualites.show', $video->id)) }}" target="_blank"
                                    class="text-green-500 hover:text-green-700 text-sm">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>

                                    <!-- LinkedIn -->
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('actualites.show', $video->id)) }}" target="_blank"
                                    class="text-blue-700 hover:text-blue-900 text-sm">
                                        <i class="fab fa-linkedin"></i>
                                    </a>

                                </div>
                            </div>
                        </div>

                        <script>
                            const articlesId = {{ $video->id }};
                            const localKeys = `liked-${articlesId}`;

                            // Fonction pour formater le nombre
                            function formatNumber(num) {
                                if (num >= 1_000_000) return (num / 1_000_000).toFixed(1).replace(/\.0$/, '') + 'M';
                                if (num >= 1_000) return (num / 1_000).toFixed(1).replace(/\.0$/, '') + 'K';
                                return num;
                            }

                            function sendLike2(id, isLike) {
                                // if (localStorage.getItem(localKeys)) {
                                //     alert("Vous avez déjà voté.");
                                //     return;
                                // }

                                fetch(`/like/${id}`, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    },
                                    body: JSON.stringify({ is_like: isLike })
                                })
                                .then(res => res.json())
                                .then(data => {
                                    console.log(data);

                                    // Utilise le formateur ici
                                    document.getElementById('like-count{{ $video->id }}').innerHTML =
                                        `<i class="fa fa-thumbs-up" aria-hidden="true"></i> : ${formatNumber(data.likes)}`;

                                    document.getElementById('dislike-count{{ $video->id }}').innerHTML =
                                        `<i class="fa fa-thumbs-down" aria-hidden="true"></i> : ${formatNumber(data.dislikes)}`;

                                    localStorage.setItem(localKeys, '{{ $video->id }}'); // Empêche de revoter
                                });
                            }
                        </script>

                    @empty
                         <div class="text-blue-600 text-sm hover:underline mt-2 inline-block">
                            Aucune vidéo disponible pour le moment.
                        </div>
                    @endforelse

                </div>

                @if ($lastvideos->count() > 6)
                    <div class="w-full pt-4 text-right">
                       <a href="#" class="text-blue-600 text-sm font-semibold hover:underline mt-2 inline-block uppercase">
                           Voir plus des vidéos
                           <i class="fa fa-arrow-right" aria-hidden="true"></i>
                       </a>
                   </div>
                @endif
            </div>
        </div>

        {{-- Side boxes --}}
        <div class="space-y-4 md:mt-0 mt-4 side">
            <div class="border-b pb-6 border-gray-300">
                @forelse($sidenews as $news)
                    <a href="{{ route('actualites.show', $news->id) }}" class="bg-white shadow mb-4">
                        <div class="h-52 relative overflow-hidden">
                            <img src="{{ asset('storage/' . $news->cover_image ) }}" class="min-w-full min-h-full object-cover" alt="News image">
                        </div>
                        <div class="bg-blue-600 text-white px-3 py-2 text-xl font-bold">{{ \Carbon\Carbon::parse($news->scheduled_at)->format('H:i') }}
                             <span class="text-sm ml-2">{{ \Carbon\Carbon::parse($news->scheduled_at)->translatedFormat(', d F') }}</span></div>
                        <div class="p-3 font-semibold text-sm uppercase">{{ $news->title }}</div>
                    </a>
                @empty
                 <div class="bg-white shadow mb-4">
                    {{-- <div class="h-52 relative border">
                    </div> --}}
                    <div class="text-blue-600 text-sm py-4 text-center">
                       <span> Aucune actualité disponible pour le moment.</span>
                    </div>
                @endforelse
            </div>

            {{-- ANNONCES & PUBS --}}
            <div class="px-6 py-4">
                <h2 class="text-xl font-bold uppercase mb-2">ANNONCES & PUBLICITÉS</h2>

                <p class="text-gray-700 text-sm">
                    <span class="font-bold text-gray-900">Contactez-nous au:</span> (243) 819 186 880 publicités !
                </p>

                <div id="default-carousel" class="relative w-full h-full" data-carousel="slide" interval="50000">
                    <!-- Carousel wrapper -->
                    <div class="relative h-screen overflow-hidden rounded-lg">
                        <!-- Item 1 -->
                        @foreach ($annonces as $annonce)
                            <div class="hiddn duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ asset('storage/' . $annonce->image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        @foreach ($annonces as $annonce)
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="{{ $loop->iteration }}"></button>
                        @endforeach
                    </div>
                    <!-- Slider controls -->
                    @if ($annonces->count() >1)
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer p-2 group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer p-2 group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection

