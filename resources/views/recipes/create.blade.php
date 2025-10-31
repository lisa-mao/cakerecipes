<x-layout>

    <script defer src="{{ asset('js/checkbox.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <form action="{{route('recipes/store')}} " method="post"
          class="max-w-md mx-auto p-8 bg-white shadow-lg rounded-xl space-y-6 mt-10">
        @csrf
        <h2 class="block text-xl font-medium text-gray-700 mb-1 ">Publish a Recipe</h2>
        <div>

            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                Name
            </label>
            <input
                type="text"
                name="title"
                id="title"
                value="{{old('title')}}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-[#E8DFCA] sm:text-sm"

                placeholder="e.g., Spicy Chicken Tacos"
            >
            <x-input-error :messages="$errors->get('title')" class="mt-2"/>
        </div>

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
            >{{old('description')}}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2"/>
        </div>

        <div>

            <label for="total_time" class="block text-sm font-medium text-gray-700 mb-1">
                Total time
            </label>
            <input
                type="number"
                name="total_time"
                id="total_time"
                value="{{old('total_time')}}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-[#E8DFCA] sm:text-sm"
                placeholder="e.g., 60 minutes"
            >
            <x-input-error :messages="$errors->get('total_time')" class="mt-2"/>
        </div>

        <div>

            <label for="prep_time" class="block text-sm font-medium text-gray-700 mb-1">
                Preparation time
            </label>
            <input
                type="number"
                name="prep_time"
                id="prep_time"
                value="{{old('prep-time')}}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-[#E8DFCA] sm:text-sm"
                placeholder="e.g., 15 minutes"
            >
            <x-input-error :messages="$errors->get('prep_time')" class="mt-2"/>
        </div>

        <div>

            <label for="serving" class="block text-sm font-medium text-gray-700 mb-1">
                Amount of servings
            </label>
            <input
                type="number"
                name="serving"
                id="serving"
                value="{{old('serving')}}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-[#E8DFCA] sm:text-sm"
                placeholder="e.g., 4 servings"
            >
            <x-input-error :messages="$errors->get('serving')" class="mt-2"/>
        </div>

        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">
            Select your category(ies)</label>

        <div class="flex flex-wrap justify-center gap-3">

            <!-- Chocolate -->
            <input type="checkbox" value="chocolate" name="category[]" id="chocolate" class="hidden">
            <label for="chocolate" class="category-button ">Chocolate</label>

            <!-- Fruity -->
            <input type="checkbox" value="fruity" name="category[]" id="fruity" class="hidden">
            <label for="fruity" class="category-button bg-white rounded p-0.5 border-gray-300 border-2">Fruity</label>

            <!-- White & Vanilla -->
            <input type="checkbox" value="white_vanilla" name="category[]" id="white_vanilla" class="hidden">
            <label for="white_vanilla" class="category-button bg-white rounded p-0.5 border-gray-300 border-2">White & Vanilla</label>

            <!-- Cupcakes -->
            <input type="checkbox" value="cupcakes" name="category[]" id="cupcakes" class="hidden">
            <label for="cupcakes" class="category-button bg-white rounded p-0.5 border-gray-300 border-2">Cupcakes</label>

            <!-- Bundt -->
            <input type="checkbox" value="bundt" name="category[]" id="bundt" class="hidden">
            <label for="bundt" class="category-button bg-white rounded p-0.5 border-gray-300 border-2">Bundt</label>

            <!-- Gluten-free -->
            <input type="checkbox" value="glutenfree" name="category[]" id="glutenfree" class="hidden">
            <label for="glutenfree" class="category-button bg-white rounded p-0.5 border-gray-300 border-2">Gluten-free</label>

        </div>
            <x-input-error :messages="$errors->get('category')" class="mt-2"/>


        <div class="space-y-3 pt-2">
            <button
                type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#6D94C5] hover:bg-[#CBDCEB] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#E8DFCA]"
            >
                Submit Recipe
            </button>

            <a href="/{{ route('home') }}"
               class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#E8DFCA]"
            >
                Back
            </a>
        </div>
    </form>
    {{--        <select name="category_id" id="">--}}
    {{--            @foreach($categories as $category)--}}
    {{--                <option value="{{$category->id}}"></option>--}}
    {{--            @endforeach--}}
    {{--        </select>--}}

</x-layout>


