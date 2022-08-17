@extends('layouts.listingLayout')
@section('content')
<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Post a Tuition
                        </h2>
                        <p class="mb-4">Post a Tuition to find a Tutor</p>
                    </header>

                    <form method="POST" action="{{route('listing')}}">
                        @csrf
                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Title</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="title"
                                placeholder="Example: Class 7 Tutor Needed"
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
                            ></textarea>
                        </div>

                        <div class="mb-6">
                            <button
                                class="bg-green-500 text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Create Tuition
                            </button>

                            <a href="{{route('user.dashboard')}}" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
                </div>
@endsection
