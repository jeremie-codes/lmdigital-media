<div class="bg-white text-blue- py-2 overflow-hidden relative">
  <div class="absolute left-0 top-0 bottom-0 flex items-center bg-yellow-400 z-[1] px-4 font-bold uppercase">
    Breaking News:
  </div>
  <div class="pl-40 animate-marquee whitespace-nowrap">
    <span class="mr-8">Un nouveau programme spécial commence à 20h !</span>
    <span class="mr-8">Restez connectés pour plus de détails en direct.</span>
  </div>
</div>

<style>
    @keyframes marquee {
    0%   { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
    }
    .animate-marquee {
    animation: marquee 25s linear infinite;
    }
</style>
