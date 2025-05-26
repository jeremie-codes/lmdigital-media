<?php $page='about' ?>

@extends('layouts.app')

@section('content')
<div class="bg-white text-gray-800 py-8">
    <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row gap-10">

        <!-- BLOG MAIN CONTENT -->
        <div class="w-full md:w-2/3 space-y-10">
            <h2 class="text-2xl font-bold uppercase">Actualités</h2>

            <!-- Blog Item -->
            @foreach([1,2,3] as $i)
            <div class="flex flex-col md:flex-row gap-4 border-b border-gray-300 pb-6">
                <div class="flex-1">
                    <h3 class="text-sm font-bold text-blue-600 uppercase">
                        @if($i == 1)
                        Donec in velit vel ipsum auctor pulvinar vestibulum iaculis
                        @elseif($i == 2)
                        Pulvinar vestibulum iaculis lacinia est proin dictum elementum velit
                        @else
                        Velit vel ipsum auctor pulvinar vestibulum iaculis lacinia est
                        @endif
                    </h3>
                    <div class="flex items-center gap-4 text-sm text-gray-500 my-2">
                        <span><i class="fa fa-calendar-alt" aria-hidden="true"></i> 14 Mar 2013</span>
                        <span><i class="fa fa-user" aria-hidden="true"></i> Admin</span>
                        <span><i class="fa fa-message" aria-hidden="true"></i> 25</span>
                    </div>
                     <div class="w-full sm:flex justify-end">
                        <div class="w-full md:w-100 sm:h-38 overflow-hidden border">
                            <img src="{{ asset('images/img.jpeg') }}" alt="Blog image" class="w-full h-full object-cover">
                        </div>
                        <div class="px-3 w-full">
                            <p class="text-sm text-gray-700 text-justify sm:pt-0 pt-4">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos deleniti quo suscipit cupiditate maiores quidem eius ea laborum aspernatur officiis rerum deserunt amet porro, sapiente facilis natus doloremque, impedit ipsum.
                            </p>
                            <a href="{{ route('actualites.show', 1) }}" class="text-blue-600 text-sm font-semibold hover:underline mt-2 inline-block">Voir Plus</a>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

        <!-- SIDEBAR -->
        <aside class="w-full md:w-1/3 space-y-8">
            <!-- Categories -->
            <div>
                <h3 class="text-xl font-bold uppercase mb-4">Categories</h3>
                <ul class="space-y-2 text-sm font-semibold text-blue-600">
                    @foreach([
                        'Vestibulum ante ipsum primis',
                        'In faucibus orci luctus et',
                        'Ultrices posuere cubilia curae',
                        'Suspendisse sollicitudin velit sed leo',
                        'Ut pharetra augue nec augue',
                        'Nam elit agna endrerit sit amet',
                        'Tincidunt ac viverra sed nulla',
                        'Donec porta diam eu massa',
                        'Quisque diam lorem interdum vitae',
                        'Dapibus ac scelerisque vitae pede'
                    ] as $cat)
                    <li class="border-b-1 border-slate-300 py-2">
                        <a href="#" class="hover:underline-none ">{{ $cat }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</div>
@endsection
