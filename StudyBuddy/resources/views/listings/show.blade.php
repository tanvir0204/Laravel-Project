@extends('layouts.listingLayout')
@section('content')
<a href="{{route('all.listing')}}" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <div class="bg-green-50 border border-gray-200 rounded p-6">

           
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{ asset('images/no-image.png')}}"
                            alt=""
                        />
                        

                        <h3 class="text-2xl mb-2">{{$listing->title}}</h3>
                        <h3 class="text-2xl mb-2">Location: {{$listing->location}}</h3>
                        {{-- <h3 class="text-2xl mb-2 fa-solid fa-mobile"> {{$listing->number}}</h3> --}}
                        <p>Contact only if you are eligible</p>
                        <x-listing-tags :tagsCsv="$listing->tags"></x-listing-tags>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Tuition Description
                            </h3>
                            <div class="text-lg space-y-6 w-13">
                                {{$listing->description}}
   
                            </div>
                            {{-- <a href="{{'storage/'.$problem->p_file}}" class="underline text-green-500 hover:text-black">{{$problem->p_file ? 'Attatched File' : ''}}</a> --}}
                            
                            {{-- @if ($listing->email != auth()->user()->email)
                                <a
                                    href="mailto:{{$listing->email}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact</a
                                >
                            @endif --}}
                             
                        </div>
                    </div>
                </div>
              {{-- Comments --}}

              <div class="">
                <div class="md:flex">
                    <div class="w-full p-4">
                        
                        <ul>
                            @foreach($comments as $comment)

                            <li class="flex justify-between items-center bg-white mt-2 p-2 hover:shadow-lg rounded cursor-pointer transition w-full mb-10">
                                <div class="flex ml-2"> <img src={{$comment->user->p_pic ? 'http://localhost:8000/storage/'.$comment->user->p_pic : asset('images/user.png')}} alt="user photo" width="85" height="40" class="rounded-full">
                                    <div class="flex flex-col ml-2"> <span class="text-2xl text-green-700 mb-5"><i class="fa-regular fa-comments"></i> {{$comment->user->name}}</span> <span class="font-serif text-2xl text-slate-900">{{$comment->text}}</span> </div>
                                </div>
                                <div class="flex flex-col items-center"> <i  class="fa-regular fa-comment-dots"></i> </div>
                            </li>

                            @endforeach
                    
                        </ul>


                        {{-- Comment form --}}

                        <div  class="max-w-full bg-slate-200 shadow-md">
                            <form  method="POST" action="/listings/show/{{$listing->id}}" class="w-full p-4">
                                @csrf
                              <div class="mb-2">
                                <label for="comment" class="text-lg text-gray-600">Add a comment</label>
                                <textarea class="w-full h-20 p-2 border rounded focus:outline-none focus:ring-gray-300 focus:ring-1"
                                  name="text" placeholder=""></textarea>
                              </div>
                              <button type="submit" class="px-3 py-2 text-sm text-blue-100 bg-green-900 rounded">Comment</button>
                            </form>
                          </div>


                    </div>
            </div>
@endsection
