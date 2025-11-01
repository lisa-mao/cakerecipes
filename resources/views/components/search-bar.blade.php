<div class="flex-1 max-w-md hidden lg:block mx-16 flex-row pt-4">
    <form action="{{route('home')}}" method="get">
        <div class="flex justify-center">

            <div>
                <input name="search" type="search" placeholder="Search for recipes..."
                       class="w-full border-gray-300 focus:border-[#6D94C5] focus:ring-[#6D94C5] rounded-lg shadow-sm py-2 px-4 pl-10 text-sm transition duration-150 ease-in-out">

            </div>

            <div class=" flex flex-row pl-2">
                <!-- Search Icon     -->
                <button
                    type="submit"
                    class="px-4 py-2 bg-[#6D94C5] text-white font-semibold rounded-lg shadow-md hover:bg-[#6D94C5] hover:text-gray-300 hover:border-white transition duration-200 transform hover:scale-[1.03] active:bg-[#F5EFE6] focus:outline-none focus:ring-2 focus:ring-[#6D94C5] focus:ring-offset-2 flex-shrink-0"
                    title="Search Recipes"
                >
                    <!-- Search Icon (SVG) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>
