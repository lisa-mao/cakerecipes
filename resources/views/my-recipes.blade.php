<x-layout>
    <body>

    @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4">
            @guest
                <a
                    href="{{ route('login') }}">
                    >
                    Log in
                </a>

                <a
                    href="{{ route('register') }}">
                    Register
                </a>
            @endguest
        </nav>
    @endif

    <div class="py-12 px-4 flex items-center flex-col">
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#6D94C5] mb-4">
           My published recipes
        </h1>

        @if($recipes->isEmpty())
            <p class="text-center text-gray-500">You haven't published any recipes yet.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-7xl mx-auto">
                @foreach ($recipes as $recipe)
                    <a href="/recipes/show/{{ $recipe->id }}" class="group">
                        <div
                            class="relative p-6 h-full flex flex-col border-solid border-4 border-[#6D94C5] bg-gray-100 group-hover:bg-[#6D94C5] group-hover:text-white transition-all duration-300 ease-in-out hover:scale-105 rounded-xl shadow-md">

                            <div class="absolute top-2 right-2">
                                @if($recipe->is_active)
                                    <span class=" bg-[#6D94C5] text-white text-[10px] px-2 py-1 rounded-full uppercase">Public</span>
                                @else
                                    <span class="border-[#6D94c5] border-solid border-2 bg-white text-black text-[10px] px-2 py-1 rounded-full uppercase">Pending Review</span>
                                @endif
                            </div>

                            <h2 class="text-2xl font-extrabold mb-2 mt-2">{{ $recipe->title }}</h2>

                            <div class="flex flex-wrap gap-2 mb-4">
                                @foreach ($recipe->categories as $category)
                                    <span
                                        class="px-3 py-1 text-xs font-bold rounded-full bg-[#6D94C5] text-white border border-white/20">
                                        {{ $category->name }}
                                    </span>
                                @endforeach
                            </div>

                            <p class="text-gray-700 group-hover:text-white/90 text-sm leading-relaxed flex-grow mb-6 line-clamp-3">
                                {{ $recipe->description }}
                            </p>

                            <div
                                class="flex justify-between items-center pt-4 border-t border-[#6D94C5]/30 group-hover:border-white/30 text-xs font-bold uppercase tracking-wider">
                                <div class="flex flex-col">
                                    <span class="text-[10px] opacity-70">Total Time</span>
                                    <span>{{ $recipe->total_time }} min</span>
                                </div>

                                <div
                                    class="flex flex-col border-x border-[#6D94C5]/30 group-hover:border-white/30 px-4">
                                    <span class="text-[10px] opacity-70">Prep</span>
                                    <span>{{ $recipe->prep_time }} min</span>
                                </div>

                                <div class="flex flex-col">
                                    <span class="text-[10px] opacity-70">Servings</span>
                                    <span>{{ $recipe->serving }} pers.</span>
                                </div>
                            </div>

                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
    </body>
</x-layout>
