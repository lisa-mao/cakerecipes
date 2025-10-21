<nav class="" style="background-color: #F5EFE6">

    <div class="flex flex-row justify-between p-5">
        <div class="flex ">
            <a href="/">
                <img src="{{\Illuminate\Support\Facades\Vite::asset('resources/images/logo.png')}}" alt="logo">
            </a>

            <x-nav-link href="/my-recipes">My recipes</x-nav-link>
            <x-nav-link href="/about-us">About us</x-nav-link>
            <x-nav-link href="/contact-page">Contact</x-nav-link>
        </div>

        <div class="flex h-14 pt-6 "  >

            <label for="site-search"></label>
            <input type="search" id="site-search" name="q">

            <x-primary-button type="submit">Search</x-primary-button>
        </div>

        <div class="flex justify-items-center">
            <x-nav-link href="/recipes/create">Publish a recipe</x-nav-link>
            <x-nav-link href="/login">Login</x-nav-link>
            <x-nav-link href="/register">Register</x-nav-link>
        </div>

    </div>

</nav>
