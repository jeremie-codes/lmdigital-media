<div class="bg-white text-blue- py-2 overflow-hidden relative {{ $breakingNews->isEmpty() ? 'h-10' : '' }}">
  <div class="absolute left-0 top-0 bottom-0 flex items-center bg-yellow-400 z-[1] px-4 font-bold uppercase">
    Breaking News:
  </div>
  <div class="pl-40 animate-marquee whitespace-nowrap">
    @forelse ($breakingNews as $breakingNew)
        <span class="text-blue-600 hover:text-blue-800 font-bold mr-8">
            {{ $breakingNew->title }}
        </span>
         :
        <span class="mr-8">{{ $breakingNew->content }}</span>

        @if (!$loop->last)
            <span class="text-gray-500"> | </span>
        @endif

    @empty
        <span class="mr-8">Contactez-nous dans notre page /contact pour plus d'information !</span>
    @endforelse
  </div>
</div>

<style>
    @keyframes marquee {
    0%   { transform: translateX(100%); }
    100% { transform: translateX(-250%); }
    }
    .animate-marquee {
    animation: marquee 40s linear infinite;
    }
</style>
