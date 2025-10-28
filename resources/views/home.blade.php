<x-layout>

    <h2>Published Recipes</h2>
    <body class="flex flex-col items-center justify-start min-h-screen px-4 py-8 sm:p-8">
    <?php

    $recipes = [
        [
            'id' => 1,
            'title' => 'Classic Vanilla Layer Cake',
            'total_time' => '1 Hr 30 Min',
            'description' => 'A beautifully moist vanilla sponge cake with rich buttercream frosting. Perfect for birthdays and celebrations!',
            'prep_time' => '30 min',
            'servings' => 12,
            'categories' => [['name' => 'Vanilla', 'color' => 'blue'], ['name' => 'Layered', 'color' => 'indigo'], ['name' => 'Dessert', 'color' => 'pink']]
        ],
        [
            'id' => 2,
            'title' => 'Decadent Chocolate Fudge Cake',
            'total_time' => '1 Hr 15 Min',
            'description' => 'An intense, dark chocolate cake featuring a gooey fudge center and smooth ganache. Every chocolate lover\'s dream.',
            'prep_time' => '20 min',
            'servings' => 10,
            'categories' => [['name' => 'Chocolate', 'color' => 'yellow'], ['name' => 'Fudge', 'color' => 'orange'], ['name' => 'Rich', 'color' => 'red']]
        ],
        [
            'id' => 3,
            'title' => 'Zesty Lemon Poppy Seed Loaf',
            'total_time' => '55 Min',
            'description' => 'A bright, citrusy loaf cake with crunchy poppy seeds and a sweet lemon glaze. Great for brunch or afternoon tea!',
            'prep_time' => '15 min',
            'servings' => 8,
            'categories' => [['name' => 'Fruity', 'color' => 'green'], ['name' => 'Loaf', 'color' => 'teal'], ['name' => 'Brunch', 'color' => 'gray']]
        ]
    ];
    ?>
        <!-- Grid Layout for multiple cards - ADDED mx-auto for centering -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-7xl mx-auto">

        @php foreach ($recipes as $recipe): @endphp
            <!-- The clickable card (<a>) is now the direct grid item, making the structure cleaner. -->
        <a href="/recipes/{{ $recipe['id'] }}" class="block group transform transition duration-300 ease-in-out hover:shadow-2xl hover:scale-[1.03] focus:outline-none focus:ring-4 focus:ring-indigo-300 rounded-xl overflow-hidden shadow-lg bg-white h-full">

            <!-- Recipe Content -->
            <div class="p-6 h-full flex flex-col">

                <!-- Header: Title and Quick Info Badge -->
                <div class="flex justify-between items-start mb-2">
                    <!-- Title (Dynamic) -->
                    <h2 class="text-2xl font-extrabold text-gray-900 group-hover:text-indigo-600 transition duration-300 pr-4">
                        {{ $recipe['title'] }}
                    </h2>
                    <!-- Quick Info Badge (Total Time - Dynamic) -->
                    <div class="flex-shrink-0 bg-indigo-500 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md mt-1">
                        {{ $recipe['total_time'] }}
                    </div>
                </div>

                <!-- Categories / Tags (Dynamic Loop) -->
                <div class="flex flex-wrap gap-2 mb-3">
                    @php foreach ($recipe['categories'] as $category):
                        // Dynamic color classes based on the 'color' key in the mock data
                        $colorClass = match($category['color']) {
                            'green' => 'bg-green-100 text-green-800',
                            'red' => 'bg-red-100 text-red-800',
                            'yellow' => 'bg-yellow-100 text-yellow-800',
                            'blue' => 'bg-blue-100 text-blue-800',
                            'pink' => 'bg-pink-100 text-pink-800',
                            'indigo' => 'bg-indigo-100 text-indigo-800',
                            'orange' => 'bg-orange-100 text-orange-800',
                            'teal' => 'bg-teal-100 text-teal-800',
                            default => 'bg-gray-100 text-gray-800',
                        };
                    @endphp
                    <span class="px-3 py-1 text-xs font-medium rounded-full {{ $colorClass }}">
                        {{ $category['name'] }}
                    </span>
                    @php endforeach; @endphp
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>Prep: {{ $recipe['prep_time'] }}</span>
                    </div>
                    <!-- Servings Count (Dynamic) -->
                    <div class="flex items-center space-x-2">
                        <!-- Servings Icon (using SVG) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span>Serves {{ $recipe['servings'] }}</span>
                    </div>
                </div>
            </div>
        </a>
        @php endforeach; @endphp

    </div>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
    </body>
</x-layout>

