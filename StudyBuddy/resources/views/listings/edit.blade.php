@extends('layouts.listingLayout')
@section('content')

<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
         <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Listing
            </h2>
        </header>

        <form method="POST" action="/listings/{{$listing->id}}">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                    >Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Class 7 Tutor Needed"
                    value="{{$listing->title}}"
                />
                @error('title')
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2"
                    >Location</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="location"
                    value="{{$listing->location}}"
                />

                @error('location')
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Class7, Science, BashundharaR/A"
                    value="{{$listing->tags}}"
                />

                @error('tags')
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="number" class="inline-block text-lg mb-2"
                    >Contact Number</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="number"
                    value="{{$listing->number}}"
                />

                @error('number')
                    <p class="text-red-500 text-xs mt-1">
                        {{$message}}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Tution Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                >{{$listing->description}}
            </textarea>

            @error('description')
                <p class="text-red-500 text-xs mt-1">
                    {{$message}}
                 </p>
            @enderror
            </div>

            <div class="mb-6">
                <button
                    class="bg-green-500 text-white rounded py-2 px-4 hover:bg-black"
                >
                    Update Tuition
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>

                    
</div>
@endsection
