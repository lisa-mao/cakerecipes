<x-layout>
    <div class="flex pl-6 justify-center m-10 flex-col">
        @auth()
            <div class="flex justify-center items-center ">
                @if($canUploadRecipe === true)
                    <a class="inline-flex items-center px-4 py-2 mb-3 border border-transparent text-sm font-bold rounded-lg shadow-md text-white bg-[#6D94C5] hover:bg-[#6D94C5] transition duration-150 whitespace-nowrap"
                       href="{{ route('recipes/create') }}">
                        {{ __('Publish new Recipe') }}
                    </a>
                @elseif($canUploadRecipe === false)
                    <a class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-bold rounded-lg shadow-md text-white bg-gray-400 cursor-not-allowed whitespace-nowrap"
                       href="#" onclick="return false;">
                        {{ __('Publish new Recipe (Locked)') }}
                    </a>
                    <p class="mt-3 text-sm text-[#6D94C5] font-semibold p-2 bg-[#CBDCEB] rounded-lg inline-block">
                        You need *{{ $minComments - $commentCount }}* more comments to publish a recipe.
                        (Current: {{ $commentCount }} / {{ $minComments }})
                    </p>
                @endif

                @endauth
            </div>

            <div class="justify-items-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-[#6D94C5] mb-4">
                    Published Recipes
                </h1>
            </div>

            <div class="justify-items-center">
                <p>Filter</p>
            </div>

            <div class="flex justify-row justify-center p-4">
                <!--form auto submits because of the checkbox -->
                <form id="category-filter-form" action="/" method="get">
                    @foreach($categories as $category)
                        <input type="checkbox" value="{{$category->id}}" name="categories[]"
                               id="category-{{$category->id}}"
                               class="hidden"

                            @checked(in_array($category->id, request('categories', [])))
                        >

                        <label for="category-{{$category->id}}" class="m-1 category-button hover:border-[#6D94C5]"
                               onclick="const checkbox = document.getElementById('category-{{$category->id}}'); checkbox.checked = !checkbox.checked; this.form.submit();"
                        >{{$category->name}}</label>

                    @endforeach
                </form>
            </div>
    </div>

    <body class="flex flex-box flex-col items-center justify-start min-h-screen px-4 py-4 sm:p-8">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 pb-4 gap-8 w-full max-w-7xl mx-auto">
        @foreach ($recipes as $recipe)
            @if($recipe->is_active == 1)
                <a href="/recipes/show/{{ $recipe->id }}" class="group">
                    <div class="p-6 h-full flex flex-col border-solid border-4 border-[#6D94C5] bg-gray-100 group-hover:bg-[#6D94C5] group-hover:text-white transition-all duration-300 ease-in-out hover:scale-105 rounded-xl shadow-md">

                        <h2 class="text-sm font-medium text-gray-500 group-hover:text-blue-100">By: {{ $recipe->user->name }}</h2>
                        <h2 class="text-2xl font-extrabold mb-2">{{ $recipe->title }}</h2>

                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach ($recipe->categories as $category)
                                <span class="px-3 py-1 text-xs font-bold rounded-full bg-[#6D94C5] text-white border border-white/20">
                                {{ $category->name }}
                            </span>
                            @endforeach
                        </div>

                        <p class="text-gray-700 group-hover:text-white/90 text-sm leading-relaxed flex-grow mb-6 line-clamp-3">
                            {{ $recipe->description }}
                        </p>

                        <div class="flex justify-between items-center pt-4 border-t border-[#6D94C5]/30 group-hover:border-white/30 text-xs font-bold uppercase tracking-wider">
                            <div class="flex flex-col">
                                <span class="text-[10px] opacity-70">Total Time</span>
                                <span>{{ $recipe->total_time }} </span>
                            </div>

                            <div class="flex flex-col border-x border-[#6D94C5]/30 group-hover:border-white/30 px-4">
                                <span class="text-[10px] opacity-70">Prep</span>
                                <span>{{ $recipe->prep_time }} </span>
                            </div>

                            <div class="flex flex-col">
                                <span class="text-[10px] opacity-70">Servings</span>
                                <span>{{ $recipe->serving }} pers.</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
    </div>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
    </body>


</x-layout>

