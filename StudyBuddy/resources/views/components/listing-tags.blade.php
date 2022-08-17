@props(['tagsCsv'])

@php
$tags = explode(',',$tagsCsv);    
@endphp


<ul class="flex">
    @foreach($tags as $tag)
    <li
        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs mb-3 mt-3"
    >
        <a href="{{route('all.listing')}}/?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach
    
</ul> 