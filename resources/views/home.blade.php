<x-layout>

    <div class="flex pl-6 justify-center m-20 flex-col justify-center">
        <div class="justify-items-center">
            <h2 class="text-3xl font-bold text-gray-800">Published Recipes</h2>
        </div>

        <div class="justify-items-center mt-6">
            <p class="text-lg font-medium text-gray-600">Filter Recipes by Category:</p>
        </div>

        <div class="flex flex-wrap justify-center p-4">
            <!-- Form auto submits because of the checkbox -->
            <form id="category-filter-form" action="/" method="get">
                @foreach($categories as $category)
                    <!-- The checkbox has a hidden onchange eventlistener -->
                    <input type="checkbox" value="{{$category->id}}" name="categories[]" id="category-{{$category->id}}"
                           class="hidden"
                           onchange="this.form.submit();"
                        @checked(in_array($category->id, request('categories', [])))
                    >

                    <label for="category-{{$category->id}}"
                           class="m-1 category-button rounded-full px-4 py-2 text-sm font-semibold transition duration-200 cursor-pointer shadow-sm
                   @if(in_array($category->id, request('categories', [])))
                       border-2 border-[#6D94C5] bg-[#CBDCEB] text-[#6D94C5]
                   @else
                       border border-gray-300 bg-white text-gray-700 hover:border-[#6D94C5] hover:shadow-md
                   @endif"
                    >
                        {{$category->name}}
                    </label>

                @endforeach
            </form>
        </div>
    </div>
    <div class="flex flex-col w-full flex-grow px-4 py-8 sm:p-8">

        <!-- Grid Layout for multiple cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 w-full max-w-7xl mx-auto">

            @foreach ($recipes as $recipe)
                @if($recipe->is_active === 1)

                    <!-- The clickable card (<a>) is now the direct grid item -->
                    <a href="/recipes/{{$recipe['id']}}"
                       class="block group transform transition duration-300 ease-in-out hover:shadow-2xl hover:scale-[1.03] focus:outline-none focus:ring-4 focus:ring-[#6D94C5] rounded-xl overflow-hidden shadow-lg bg-white h-full">

                        <!-- Recipe Content -->
                        <div class="p-6 h-full flex flex-col">
                            <!-- User Name -->
                            <h3 class="text-sm font-medium text-gray-500 mb-2">By: {{$recipe->user->name}}</h3>

                            <!-- Header: Title and Quick Info Badge -->
                            <div class="flex justify-between items-start mb-2">

                                <!-- Title (Dynamic) -->
                                <h2 class="text-xl font-extrabold text-gray-900 group-hover:text-[#6D94C5] transition duration-300 pr-4 flex-grow">
                                    {{ $recipe['title'] }}
                                </h2>
                                <!-- Quick Info Badge (Total Time - Dynamic) -->
                                <div
                                    class="flex-shrink-0 bg-[#6D94C5] text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md mt-1">
                                    {{ $recipe['total_time'] }} min
                                </div>
                            </div>

                            <!-- Categories -->
                            <div class="flex flex-wrap gap-2 mb-3">
                                @foreach ($recipe->categories as $category)
                                    <span
                                        class="px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800 shadow-inner">
                                {{ $category['name'] }}
                            </span>
                                @endforeach
                            </div>

                            <!-- Description (Dynamic) -->
                            <p class="text-gray-600 mb-4 text-sm line-clamp-3 flex-grow">
                                {{ $recipe['description'] }}
                            </p>

                            <!-- Details/Metadata -->
                            <div class="flex justify-between items-center text-sm text-gray-500 border-t pt-4 mt-auto">
                                <!-- Preparation Time (Dynamic) -->
                                <div class="flex items-center space-x-2">
                                    <!-- Time Icon (using SVG) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#6D94C5]" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>Prep: {{ $recipe['prep_time'] }} min</span>
                                </div>
                                <!-- Servings Count (Dynamic) -->
                                <div class="flex items-center space-x-2">
                                    <!-- Servings Icon (using SVG) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#6D94C5]" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <span>Serves {{ $recipe['serving'] }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>

</x-layout>
