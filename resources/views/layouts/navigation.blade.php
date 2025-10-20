<nav class="" style="background-color: #F5EFE6">

    <div class="flex flex-row">
        <div class="flex flex-row">
            <a href="/">
                <img src="{{\Illuminate\Support\Facades\Vite::asset('resources/images/logo.png')}}" alt="logo">
            </a>
        </div>
        <div class="">
            <div>
                <x-nav-link href="/my-recipes">My recipes</x-nav-link>
                <x-nav-link href="/about-us">About us</x-nav-link>
                <x-nav-link href="/contact-page">Contact</x-nav-link>
            </div>
            <div>
                <label for="site-search"></label>
                <input type="search" id="site-search" name="q">

                <button>Search</button>
            </div>

            <div>
                <x-nav-link href="/recipes/create">Publish a recipe</x-nav-link>
                <x-nav-link href="/login">Login</x-nav-link>
                <x-nav-link href="/register">Register</x-nav-link>
            </div>
        </div>
        <div>

        </div>

    </div>

</nav>
