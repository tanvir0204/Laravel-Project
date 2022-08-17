@extends('tutorLayout')
@section('content')
<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        LOG IN
    </h2>
    <p class="mb-4">Log In to apply for tutions</p>
</header>

<form method="POST" action="{{route('tutor.authenticate')}}">
    @csrf
    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2"
            >Email</label
        >
        <input
            type="email"
            class="border border-gray-200 rounded p-2 w-full"
            name="email"
        />
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
    </div>
    <div class="mb-6">
        <button
            type="submit"
            class="bg-green-500 text-white rounded py-2 px-4 hover:bg-black"
        >
            Login
        </button>
    </div>

    <div class="mt-8">
        <p>
            Not registerd yet?
            <a href="/register" class="text-green-500"
                >Register</a
            >
        </p>
    </div>
</form>
</div>
@endsection