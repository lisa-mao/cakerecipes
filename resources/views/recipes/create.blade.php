<x-layout>



    <form action="{{route('recipes/store')}}" method="post"
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
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"

                placeholder="e.g., Spicy Chicken Tacos"
            >
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                Description
            </label>
            <textarea
                name="description"
                id="description"
                rows="4"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="e.g., Delicious Gluten-free Chocolate Cake"
            >{{old('description')}}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
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
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="e.g., 60 minutes"
            >
            <x-input-error :messages="$errors->get('total_time')" class="mt-2" />
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
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="e.g., 15 minutes"
            >
            <x-input-error :messages="$errors->get('prep_time')" class="mt-2" />
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
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                placeholder="e.g., 4 servings"
            >
            <x-input-error :messages="$errors->get('serving')" class="mt-2" />
        </div>


        <div>

            <label for="categories" class="block text-sm font-medium text-gray-700 mb-1">
                Category
            </label>
            <label for="chocolate" class="block text-sm font-medium text-gray-700 mb-1">
                Amount of servings
            </label>
           <input type="checkbox" value="chocolate" name="chocolate" id="chocolate">

            <label for="fruity" class="block text-sm font-medium text-gray-700 mb-1">
                Amount of servings
            </label>
            <input type="checkbox" value="fruity" name="fruity" id="fruity">

            <label for="chocolate" class="block text-sm font-medium text-gray-700 mb-1">
                Amount of servings
            </label>
            <input type="checkbox" value="chocolate" name="chocolate" id="chocolate">

            <label for="chocolate" class="block text-sm font-medium text-gray-700 mb-1">
                Amount of servings
            </label>
            <input type="checkbox" value="chocolate" name="chocolate" id="chocolate">


               <option value="fruity">
                   Fruity
               </option>
               <option value="white&vanilla">
                   White & Vanilla
               </option>
               <option value="cupcakes">
                   Cupcakes
               </option>

               <option value="bundt">
                   Bundt
               </option>
               <option value="gluten_free">
                   Gluten-free
               </option>
               <option value="diary_free">
                   Diary-free
               </option>


           </select>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>

        <div class="space-y-3 pt-2">
            <button
                type="submit"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                Submit Recipe
            </button>

            <a href="/{{ route('home') }}"
               class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
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


