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


