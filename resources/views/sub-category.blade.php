<x-layouts.app>

    <div class="container row mx-auto my-4">
        <div>{{$subCategory->name}}</div>
        <div>{{$category}}</div>
    </div>

    <x-contact :contact-img="$subCategory->image" ></x-contact>

</x-layouts.app>
