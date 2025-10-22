<x-layout>

    <p>create</p>

    <form action="{{route('recipes/recipe-card.create')}}" method="post">
        @csrf

        <label for="name">
            Name
        </label>
        <input type="text" name="name" id="name" value="{{old('description')}}">

        <label for="ingredient">
            ingredient
        </label>
        <input type="text" name="ingredient" id="ingredient" value="{{old('description')}}">

        <label for="instruction">
            instruction
        </label>
        <input type="text" name="instruction" id="instruction" value="{{old('description')}}">

        <label for="category">
            category
        </label>
        <input type="text" name="category" id="category" value="{{old('description')}}">


        <button type="submit">Submit</button>
    </form>

    <div>
{{--        <select name="category_id" id="">--}}
{{--            @foreach($categories as $category)--}}
{{--                <option value="{{$category->id}}"></option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
    </div>

    <a href="/">back</a>
</x-layout>


