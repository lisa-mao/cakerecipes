<x-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                <div class="p-6 text-gray-900 flex justify-between items-center">

                    <!-- Text Message -->
                    <span class="text-lg font-semibold">
                    {{ __("You're logged in!") }}
                </span>

                    <!-- Button is now next to the text -->
                    <a href="{{ route('home') }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-[#6D94C5] hover:bg-[#CBDCEB] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#6D94C5] transition duration-150">
                        Go to Recipes Home
                    </a>
                </div>

            </div>
        </div>
    </div>
    <!--  Schakelen van status met button in lijst
bijvoorbeeld aan/uit, actief/niet actief
MOET via een post
MOET naar aparte action in een controller
mag ook via Ajax -->
    @if(auth()->user()->role === 1)
        <h2 class="mt-4 text-center">All recipes made</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-7xl mx-auto">

            @php foreach ($recipes as $recipe): @endphp




                <!-- The compact, rectangular card with action buttons -->
            <div
                class="p-4 bg-white shadow-lg rounded-xl border border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center transition duration-200 hover:shadow-xl">

                <!-- 1. Recipe Title and Owner -->
                <div class="flex-grow mb-3 sm:mb-0 sm:pr-4">
                    <h2 class="text-xl font-bold text-gray-900 line-clamp-2">
                        {{ $recipe['title'] }}
                    </h2>
                    <p class="text-sm text-gray-500 mt-1">
                        By: {{ $recipe->user->name }}
                    </p>
                </div>

                <!-- 2. Action Buttons (Flex container for buttons) -->
                <div class="flex flex-wrap gap-2 justify-end">

                    <!-- Edit Button -->
                    <a href="/recipes/edit/{{ $recipe['id'] }}"
                       class="flex items-center px-3 py-1 text-sm font-medium rounded-lg text-white bg-[#6D94C5] hover:bg-[#CBDCEB] transition duration-150 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        Edit
                    </a>

                    <!-- Delete Button -->
                    <!-- NOTE: Uses a form for proper DELETE method routing -->
                    <form method="POST" action="{{route('recipes/destroy', $recipe->id)}}') }}">
                        @csrf

                        @method('DELETE')

                        <button type="submit"
                                class="flex items-center px-3 py-1 text-sm font-medium rounded-lg text-white bg-[#6D94C5] hover:bg-red-700 transition duration-150 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete
                        </button>
                    </form>

                    <!-- Status Change Button (Example: Toggle Draft/Published) -->
                    <!-- You would link this to a controller method that handles status toggling -->
                    @php
                        //condition ? value_if_true : value_if_false.
                            $statusClass = $recipe->is_active ? 'bg-[#6D94C5] hover:[#CBDCEB]' : 'bg-[#CBDCEB] hover:[#CBDCEB]';
                            $newStatusText = $recipe->is_active ? 'Active' : 'Not Active';
                    @endphp

                    <a href="/recipes/toggle-status/{{$recipe['id']}}"
                       class="flex items-center px-3 py-1 text-sm font-medium rounded-lg text-white {{ $statusClass }} transition duration-150 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                        {{ $newStatusText}}
                    </a>

                </div>
            </div>


            @php endforeach; @endphp
            @endif
    </div>

</x-layout>
