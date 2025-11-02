<x-layout>

    <form action="{{ route('recipes.update', $recipe->id) }}" method="post"
          class="max-w-md mx-auto p-8 bg-white shadow-lg rounded-xl space-y-6 mt-10">
        @csrf
        @method('PATCH')

        <h2 class="block text-2xl font-bold text-gray-900 mb-1 ">Editing Recipe: {{ $recipe->title }}</h2>
        <p class="text-sm text-gray-500 mb-4">Update the fields below and click 'Save Changes'.</p>

        <!-- Recipe Name -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                Name
            </label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title', $recipe->title) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-[#E8DFCA] sm:text-sm"
                placeholder="e.g., Spicy Chicken Tacos"
            >
            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                Description
            </label>
            <textarea
                name="description"
                id="description"
                rows="4"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-[#E8DFCA] sm:text-sm"
                placeholder="e.g., Delicious Gluten-free Chocolate Cake"
            >{{ old('description', $recipe->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
        </div>

        <!-- Total Time -->
        <div>
            <label for="total_time" class="block text-sm font-medium text-gray-700 mb-1">
                Total time (minutes)
            </label>
            <input
                type="number"
                name="total_time"
                id="total_time"
                value="{{ old('total_time', $recipe->total_time) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-[#E8DFCA] sm:text-sm"
                placeholder="e.g., 60 minutes"
            >
            <x-input-error :messages="$errors->get('total_time')" class="mt-2"/>
        </div>

        <!-- Preparation Time -->
        <div>
            <label for="prep_time" class="block text-sm font-medium text-gray-700 mb-1">
                Preparation time (minutes)
            </label>
            <input
                type="number"
                name="prep_time"
                id="prep_time"
                value="{{ old('prep_time', $recipe->prep_time) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-[#E8DFCA] sm:text-sm"
                placeholder="e.g., 15 minutes"
            >
            <x-input-error :messages="$errors->get('prep_time')" class="mt-2"/>
        </div>

        <!-- Servings -->
        <div>
            <label for="serving" class="block text-sm font-medium text-gray-700 mb-1">
                Amount of servings
            </label>
            <input
                type="number"
                name="serving"
                id="serving"
                value="{{ old('serving', $recipe->serving) }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-[#E8DFCA] sm:text-sm"
                placeholder="e.g., 4 servings"
            >
            <x-input-error :messages="$errors->get('serving')" class="mt-2"/>
        </div>

        <!-- Categories -->
        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
            Select your category(ies)</label>

{{--        <div class="flex flex-wrap justify-center gap-3">--}}
{{--            @foreach($categories as $category)--}}
{{--                @php--}}
{{--                    // We now get the value (slug) from the object property--}}
{{--                    $categorySlug = $category->name;--}}


{{--                            // 1. The failed form submission (old('category'))--}}
{{--                            // 2. The array of current recipe categories ($currentCategoryNames, passed from controller)--}}
{{--                            $isChecked = in_array($categorySlug, old('category', $currentCategoryNames));--}}
{{--                @endphp--}}

{{--                --}}{{-- The input's value and ID must use the slug (e.g., 'chocolate') --}}
{{--                <input type="checkbox" value="{{ $categorySlug }}" name="category[]" id="{{ $categorySlug }}"--}}
{{--                       class="hidden"--}}
{{--                    @checked($isChecked)>--}}

{{--                <!-- Dynamic label styling based on checked state -->--}}
{{--                <label for="{{ $categorySlug }}"--}}
{{--                       class="category-button--}}
{{--                --}}{{-- Use the custom CSS classes: always apply category-button, then conditionally apply active --}}
{{--                    {{ $isChecked ? 'active' : '' }} hover:scale-105">--}}
{{--                    {{ $category->name }}--}}
{{--                    --}}{{-- @dump($category->name) <-- Remove the dump to clean up the output --}}
{{--                </label>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--        <x-input-error :messages="$errors->get('category')" class="mt-2"/>--}}

        <div class="space-y-3 pt-2">
            <button
                type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Save Changes
            </button>

            <a href="/recipes/show/{{ $recipe->id }}"
               class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#E8DFCA]"
            >
                Cancel
            </a>
        </div>


    </form>
</x-layout>
