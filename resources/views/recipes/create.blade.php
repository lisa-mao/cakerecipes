<x-layout>

    <p>create</p>

    <form action="{{route('')}}" method="post">
        @csrf

        <label for="name">
            Name
        </label>
        <input type="text" name="name" id="name" value="{{old('description')}}">

    </form>

    <div>
        <select name="category_id" id="">
            @foreach($categories as $category)
                <option value="{{$category->id}}"></option>
            @endforeach
        </select>
    </div>

    <a href="/">back</a>
</x-layout>


