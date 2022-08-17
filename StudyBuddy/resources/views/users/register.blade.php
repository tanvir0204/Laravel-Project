@extends('layouts.userLayout')
@section('content')
<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Register 
    </h2>
    <p class="mb-4">Create an account to find a tutor</p>
</header>

<form method="POST" action="{{route('user')}}">
    @csrf
    <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2">
            Name
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="name"
           
        />
        <p class="text-red-500 text-xs mt-1">
            @error('name')
            {{$message}}
            @enderror
        </p>
        
    </div>

    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2"
            >Email</label
        >
        <input
            type="email"
            class="border border-gray-200 rounded p-2 w-full"
            name="email"
          
        />
        <p class="text-red-500 text-xs mt-1">
            @error('email')
            {{$message}}
            @enderror
        </p>
    </div>

    <div class="mb-6">
        <label
            for="password"
            class="inline-block text-lg mb-2"
        >
            Password
        </label>
        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full"
            name="password"
            
        />
        <p class="text-red-500 text-xs mt-1">
            @error('password')
            {{$message}}
            @enderror
        </p>
    </div>

    <div class="mb-6">
        <label
            for="password2"
            class="inline-block text-lg mb-2"
        >
            Confirm Password
        </label>
        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full"
            name="password2"
           
        />
        <p class="text-red-500 text-xs mt-1">
            @error('password2')
            {{$message}}
            @enderror
        </p>
    </div>

    <div class="mb-6">
        <button
            type="submit"
            class="bg-green-500 text-white rounded py-2 px-4 hover:bg-black"
        >
            Sign Up
        </button>
    </div>

    <div class="mt-8">
        <p>
            Already have an account?
            <a href="{{route('user.login')}}" class="text-green-500"
                >Login</a
            >
        </p>
    </div>
</form>
</div>
@endsection