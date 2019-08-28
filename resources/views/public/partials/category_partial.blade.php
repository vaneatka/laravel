

@isset(($category->children))  

<ul>
    @foreach ($category->children as $child)
        @include('public.partials.category_partial', $child)
    @endforeach
</ul>

@endisset

{{-- @dump($category->children) --}}


