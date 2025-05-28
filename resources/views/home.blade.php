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
                    <div class="hidden duration-700 ease-in-out pt-0" data-carousel-item>
                        <img src="{{ asset('images/ban.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
                        <div class="absolute bottom-0 left-0 w-full flex items-center justify-between">
                            <div class="bg-blue-600 text-white px-4 py-2 text-2xl font-bold">
                                19:05 <span class="text-sm ml-2">MONDAY - THURSDAY</span>
                            </div>

                            <div class="lg:block hidden bg-black bg-opacity-20 text-white px-4 py-2 text-lg font-semibold">
                                AUTE IRURE DOLOR IN REPREHENDERIT
                            </div>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out pt-0" data-carousel-item>
                        <img src="{{ asset('images/ban.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
                        <div class="absolute bottom-0 left-0 w-full flex items-center justify-between">
                            <div class="bg-blue-600 text-white px-4 py-2 text-2xl font-bold">
                                19:05 <span class="text-sm ml-2">MONDAY - THURSDAY</span>
                            </div>

                            <div class="lg:block hidden bg-black bg-opacity-20 text-white px-4 py-2 text-lg font-semibold">
                                AUTE IRURE DOLOR IN REPREHENDERIT
                            </div>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out pt-0" data-carousel-item>
                        <img src="{{ asset('images/ban.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
                        <div class="absolute bottom-0 left-0 w-full flex items-center justify-between">
                            <div class="bg-blue-600 text-white px-4 py-2 text-2xl font-bold">
                                19:05 <span class="text-sm ml-2">MONDAY - THURSDAY</span>
                            </div>

                            <div class="lg:block hidden bg-black bg-opacity-20 text-white px-4 py-2 text-lg font-semibold">
                                AUTE IRURE DOLOR IN REPREHENDERIT
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- ACTUALITES SHOWS --}}
            <div class="px-6 py-4 mt-2">
                <h2 class="text-xl font-bold uppercase mb-4">Actualités</h2>
                     <!-- Blog Item -->
                @foreach($lastnews as $news)
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
                            <div class="w-full md:w-100 sm:h-38 overflow-hidden border">
                                <img src="{{ asset('images/img.jpeg') }}" alt="Blog image" class="w-full h-full object-cover">
                            </div>
                            <div class="px-3 w-full">
                                <div class="text-sm text-gray-700 text-justify sm:pt-0 pt-4">
                                     {!! $news->content !!}
                                </div
                                >
                                <a href="{{ route('actualites.show', $news->id) }}" class="text-blue-600 text-sm font-semibold hover:underline mt-2 inline-block">Voir Plus</a>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach

                <div class="w-full pt-4 text-right">
                    <a href="#" class="text-blue-600 text-sm font-semibold hover:underline mt-2 inline-block uppercase">
                        Voir plus d'actualité
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            {{-- VIDEOS SHOWS --}}
            <div class="px-6 py-4">
                <h2 class="text-xl font-bold uppercase mb-4">Programmes Vidéos Publiées</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($lastvideos as $video)
                        <div class="bg-white shadow">
                            <div class="relative flex items-center justify-center">
                                <img src="{{ asset('images/img.jpeg') }}" class="w-full">
                                <a href="{{ route('actualites.show', 1) }}" class="absolute">
                                    <i class="fa fa-play-circle text-red-300 text-3xl" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="bg-blue-600 text-white px-3 py-2 text-md font-bold">
                                {{ \Carbon\Carbon::parse($video->scheduled_at)->format('H:i') }}
                                <span class="text-sm ml-2">{{ \Carbon\Carbon::parse($video->scheduled_at)->translatedFormat('l d F Y') }}</span>
                            </div>
                            <div class="p-3 font-semibold text-sm uppercase">
                                <a href="#">
                                    {{ $video->title }}
                                </a>
                            </div>
                            <div class="p-3 text-gray-500 text-sm text-justify">
                                {!! Illuminate\Support\Str::limit(strip_tags($video->content), 100) !!}
                            </div>
                        </div>
                    @endforeach
                </div>

                 <div class="w-full pt-4 text-right">
                    <a href="#" class="text-blue-600 text-sm font-semibold hover:underline mt-2 inline-block uppercase">
                        Voir plus des vidéos
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Side boxes --}}
        <div class="space-y-4 md:mt-0 mt-4 side">
            <div class="border-b pb-6 border-gray-300">
                <div class="bg-white shadow mb-4">
                    <img src="{{ asset('images/img.jpeg') }}" class="w-full">
                    <div class="bg-blue-600 text-white px-3 py-2 text-xl font-bold">20:05 <span class="text-sm ml-2">MONDAY - THURSDAY</span></div>
                    <div class="p-3 font-semibold text-sm uppercase">Adipisicing elit, sed do eiusmod tempor incididunt</div>
                </div>
                <div class="bg-white shadow">
                    <img src="{{ asset('images/img.jpeg') }}" class="w-full">
                    <div class="bg-blue-600 text-white px-3 py-2 text-xl font-bold">13:55 <span class="text-sm ml-2">MONDAY - THURSDAY</span></div>
                    <div class="p-3 font-semibold text-sm uppercase">Lorem ipsum dolor sit amet consectetuer</div>
                </div>
            </div>

            {{-- ANNONCES & PUBS --}}
            <div class="px-6 py-4">
                <h2 class="text-xl font-bold uppercase mb-2">ANNONCES & PUBLICITÉS</h2>

                <p class="text-gray-700 text-sm">
                    <span class="font-bold text-gray-900">Contactez-nous au:</span> (243) 827 289 636, Pour vos publicités !
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
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection
