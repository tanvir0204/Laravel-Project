@props(['listing'])
<div {{$attributes->merge(['class'=>'bg-green-50 border border-gray-200 rounded p-6'])}} >
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <x-listing-tags :tagsCsv="$listing->tags"></x-listing-tags>
        </div>
    </div>
</div>