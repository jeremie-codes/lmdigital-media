<?php $page='about' ?>
@extends('layouts.app')

@section('content')
<div class="text-black">

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }} !
        </div>
    @endif

    <!-- Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 px-8 py-12">
        <!-- About -->
        <div class="col-span-2">
            <h2 class="text-2xl font-bold mb-4">À propos de LUMIÈRE DIGITALE MÉDIA</h2>
            <img src="{{ asset('images/_logo.png') }}" alt="Camera" class="mb-4">
            <p class="text-blue-700 font-bold mb-2">
                LUMIÈRE DIGITALE MÉDIA SARL
            </p>
            <p class="text-gray-700 mb-2">
                Mauris fermentum tortor non enim aliquet condimentum. Nam aliquam pretium feugiat...
            </p>
            <p class="text-gray-700">
                Praesent faucibus rutrum odio at rhoncus. Pellentesque vitae tortor id neque fermentum pretium...
            </p>
        </div>

        <!-- Team -->
        <div>
            <h2 class="text-2xl font-bold mb-4">CONTACTEZ-NOUS</h2>
            {{-- <h2 class="text-2xl font-bold mb-4">NOTRE ÉQUIPE</h2>
            <div class="md:grid grid-cols-2 gap-2 w-100">
                @for ($i = 0; $i < 4; $i++)
                    <img src="{{ asset('images/profile.jpg') }}" class="w-full h-auto shadow">
                @endfor
            </div> --}}


        {{-- <form method="POST" action="{{ route('contact.send') }}" class="space-y-6 bg-white p-6 rounded shadow"> --}}
        <form method="POST" action="{{ url('') }}" class="space-y-3 bg-white p-6 rounded shadow">
            @csrf
            <div>
                <label class="block text-sm font-medium ">Nom</label>
                <input type="text" name="name" required
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium ">Email</label>
                <input type="email" name="email" required
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium ">Sujet</label>
                <input type="text" name="subject" required
                       class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>

            <div>
                <label class="block text-sm font-medium ">Message</label>
                <textarea name="message" rows="3" required
                          class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
            </div>

            <button type="submit"
                    class="bg-pink-600 text-white px-6 py-2 rounded hover:bg-pink-700 transition">
                Envoyer <i class="fas fa-paper-plane ml-2"></i>
            </button>
        </form>
        </div>
    </div>

    <!-- expertises -->
    <div class="px-8 pb-6">
        <h2 class="text-2xl font-bold mb-4 uppercase">Nos Domaines d'Expertise</h2>
        <ul class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <li class="border-b border-slate-300 pb-3">
                <p class="text-sm text-yellow-500 font-semibold capitalize">sNTERDUM AC SUSCIPIT NEC MAURIS SUSPEN</p>
                <p class="text-sm">Nam aliquam pretium feugiat. Duis sem est, viverra eu interdum ac...</p>
            </li>
            <li class="border-b border-slate-300 pb-3">
                <p class="text-sm text-yellow-500 font-semibold capitalize">sAURIS SUSPENDISSE COMMODO TEMPOR</p>
                <p class="text-sm">Duis sem est, viverra eu interdum ac, suscipit nec mauris...</p>
            </li>
            <li class="border-b border-slate-300 pb-3">
                <p class="text-sm text-yellow-500 font-semibold capitalize">sISSE COMMODO TEMPOR SAGITTIS</p>
                <p class="text-sm">Suspendisse commodo tempor sagittis! In justo est...</p>
            </li>
            <li class="border-b border-slate-300 pb-3">
                <p class="text-sm text-yellow-500 font-semibold capitalize">sNTERDUM AC SUSCIPIT NEC MAURIS SUSPEN</p>
                <p class="text-sm">In justo est, sollicitudin eu scelerisque pretium...</p>
            </li>
        </ul>
    </div>

    <!-- Informations legales -->
    <div class="px-8 pb-12">
        <h2 class="text-2xl font-bold mb-6">INFORMATIONS LÉGALES ET ADMINISTRATIVES</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700 text-sm">
            <div class="bg-white p-6 rounded">
                <p class="font-semibold text-blue-600">Identification fiscale et commerciale</p>
                <p>Duis sem est, viverra eu interdum ac, suscipit nec mauris. Suspendisse commodo tempor sagittis...</p>
                <p>Pellentesque vitae tortor id neque fermentum pretium. Maecenas ac lacus ut neque rhoncus laoreet...</p>
                <p>Pellentesque vitae tortor id neque fermentum pretium. Maecenas ac lacus ut neque rhoncus laoreet...</p>
            </div>
            <div class="bg-white p-6 rounded">
                <p class="font-semibold text-blue-600">Affiliations sociale</p>
                <p>Duis sem est, viverra eu interdum ac, suscipit nec mauris. Suspendisse commodo tempor sagittis...</p>
                <p>Pellentesque vitae tortor id neque fermentum pretium. Maecenas ac lacus ut neque rhoncus laoreet...</p>
                <p>Pellentesque vitae tortor id neque fermentum pretium. Maecenas ac lacus ut neque rhoncus laoreet...</p>
            </div>
        </div>
    </div>



</div>
@endsection
