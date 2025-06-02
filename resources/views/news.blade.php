<?php $page='about' ?>

@extends('layouts.app')

@section('content')
<div class="bg-white text-gray-800 py-8">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row gap-10">

        <!-- BLOG MAIN CONTENT -->
        <div class="w-full md:w-2/3 space-y-10">
            <h2 class="text-2xl font-bold uppercase">Actualités</h2>

            <!-- Blog Item -->
            @if(!$news->isEmpty())
                @foreach($news as $new)
                <div class="flex flex-col md:flex-row gap-4 border-b border-gray-300 pb-6">
                    <div class="flex-1">
                        <h3 class="text-sm font-bold text-blue-600 uppercase">
                            {{ $new->title }}
                        </h3>
                        <div class="flex items-center gap-4 text-sm text-gray-500 my-2">
                            <span><i class="fa fa-calendar-alt" aria-hidden="true"></i> {{ \Carbon\Carbon::parse($new->scheduled_at)->format('H:i') }}
                            {{ \Carbon\Carbon::parse($new->scheduled_at)->translatedFormat(', d F') }}</span>
                            <span><i class="fa fa-user" aria-hidden="true"></i>  {{ Illuminate\Support\Str::limit(strip_tags($new->author->name), 8) }}</span>
                            <span><i class="fa fa-message" aria-hidden="true"></i> {{ $new->comments->count() }}</span>
                        </div>
                        <div class="w-full sm:flex justify-end">
                            <div class="w-full md:w-100 sm:h-38 overflow-hidden ">
                                <img src="{{ asset('storage/' . $new->cover_image) }}" alt="Blog image" class="w-full h-full object-cover">
                            </div>
                            <div class="px-3 w-full">
                                <div class="text-sm text-gray-700 text-justify sm:pt-0 pt-4">
                                    {{ Illuminate\Support\Str::limit(strip_tags($new->content), 205) }}
                                </div>
                                <a href="{{ route('actualites.show', $new->id) }}" class="text-blue-600 text-sm font-semibold hover:underline mt-2 inline-block">Voir Plus</a>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            @else
                <div class="text-center text-gray-500 py-10">
                    <p>Aucune actualité disponible pour cette catégorie.</p>
                </div>
            @endif
        </div>

        <!-- SIDEBAR -->
        <aside class="w-full md:w-1/3 space-y-8">
            <!-- Categories -->
            <div>
                <h3 class="text-xl font-bold uppercase mb-4">Categories</h3>
                <ul class="space-y-2 text-sm font-semibold text-blue-600">
                    @foreach($categories as $cat)
                    <li class="border-b-1 border-slate-300 py-2">
                        <a href="{{ url('/news/'. $cat->name ) }}" class="hover:underline-none ">{{ $cat->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</div>
@endsection
