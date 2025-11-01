<x-layout>
    <!-- Main Content Container: Centered and constrained width for readability -->
    <div class="py-12 px-4 sm:px-6 lg:px-8 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-8 md:p-10 lg:p-12 rounded-2xl shadow-2xl border border-gray-100">

            <!-- Back Button/Navigation -->
            <a href="/"
               class="text-[#6D94C5] hover:text-[#CBDCEB] font-semibold mb-6 flex items-center space-x-1 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Back to Recipes</span>
            </a>

            <!-- 1. HEADER & METADATA -->
            <header class="pb-6 border-b border-gray-200 mb-6">

                <!-- Recipe Title -->
                <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 leading-tight mb-2">
                    {{ $recipe->title }}
                </h1>

                <!-- User Name -->
                <p class="text-lg text-gray-600 italic">
                    Published by:
                    <span class="font-medium text-[#6D94C5] hover:text-[#6D94C5] transition duration-150">
            {{ $recipe->user->name }}
        </span>
                </p>

                @auth
                    @if (Auth::user()->id === $recipe->user_id)
                        <div class="mt-4 flex space-x-3">
                            <!-- Edit Button -->
                            <a href="/recipes/edit/{{ $recipe->id }}"
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Edit Recipe
                            </a>

                            <!-- Delete Form (using POST method as required for deletes) -->
                            <!-- Note: The form uses JavaScript to confirm the action before submitting. -->
                            <form method="POST" action="{{route('recipes/destroy', $recipe->id)}}">
                                @csrf
                                <!-- method spoofing to delete -->
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-150">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete Recipe
                                </button>
                            </form>
                        </div>
                    @endif
                @endauth

            </header>

            <!-- 2. QUICK STATS BAR (Prep Time, Total Time, Servings) -->
            <div
                class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8 p-5 bg-indigo-50 rounded-xl border border-[#6D94C5]">

                <!-- Total Time -->
                <div class="flex items-center space-x-3 text-[#6D94C5]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#6D94C5]" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <p class="text-xs font-semibold uppercase opacity-70">Total Time</p>
                        <p class="text-lg font-bold">{{ $recipe->total_time }} min</p>
                    </div>
                </div>

                <!-- Prep Time -->
                <div class="flex items-center space-x-3 text-[#6D94C5]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#6D94C5]" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16L2 12l4-4"/>
                    </svg>
                    <div>
                        <p class="text-xs font-semibold uppercase opacity-70">Prep Time</p>
                        <p class="text-lg font-bold">{{ $recipe->prep_time }} min</p>
                    </div>
                </div>

                <!-- Servings -->
                <div class="flex items-center space-x-3 text-[#6D94C5]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#6D94C5]" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <div>
                        <p class="text-xs font-semibold uppercase opacity-70">Servings</p>
                        <p class="text-lg font-bold">{{ $recipe->serving }}</p>
                    </div>
                </div>
            </div>

            <!-- 3. RECIPE DESCRIPTION -->
            <section class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-3 border-b-2 border-gray-100 pb-1">Description</h2>
                <p class="text-gray-700 leading-relaxed">
                    {{ $recipe->description }}
                </p>
            </section>

            <!-- 4. Categories/Tags (Optional but good to include) -->
            @if ($recipe->categories->count())
                <section class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-3 border-b-2 border-gray-100 pb-1">Categories</h2>
                    <div class="flex flex-wrap gap-2">
                        @foreach($recipe->categories as $category)
                            <span
                                class="px-3 py-1 text-sm font-medium rounded-full bg-[#CBDCEB] text-[#6D94C5] shadow-sm">
                    {{ $category->name }}
                </span>
                        @endforeach
                    </div>
                </section>
            @endif

        </div>


    </div>


</x-layout>
