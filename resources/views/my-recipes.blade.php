<x-layout>

    <h2>My recipes</h2>
    <body>



    {{--        @if (Route::has('login'))--}}
    {{--            <nav class="flex items-center justify-end gap-4">--}}
    {{--                @guest--}}

    {{--                    <a--}}
    {{--                        href="{{ route('login') }}">--}}
    {{--                    >--}}
    {{--                        Log in--}}
    {{--                    </a>--}}


    {{--                    <a--}}
    {{--                        href="{{ route('register') }}">--}}
    {{--                        Register--}}
    {{--                    </a>--}}

    {{--                @endguest--}}
    {{--            </nav>--}}
    {{--        @endif--}}


    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
    </body>
</x-layout>
