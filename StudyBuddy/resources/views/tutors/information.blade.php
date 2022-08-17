@extends('layouts.tutor-registerLayout')
@section('content')
<div class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24">

<form method="POST" action="{{route('tutor.information')}}">
    @csrf

    {{-- PERSONAL --}}
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Personal Information
        </h2>
        <p class="mb-4 font-bold">Add Your Information</p>
    </header>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="g_name">
            Guardian's Name
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="g_name"
          {{-- id="g_name"  --}}
          type="text" 
          placeholder="">
          

          @error('g_name')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="g_phone">
            Guaridan's Phone
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="g_phone"
          {{-- id="g_phone" --}} 
          type="text" 
          placeholder="">

          @error('g_phone')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
            Phone
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="phone"
          {{-- id="phone"  --}}
          type="text" 
          placeholder="">

          @error('phone')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="gender">
            Gender
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="gender"
          {{-- id="phone"  --}}
          type="text" 
          placeholder="">

          @error('gender')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="location">
            Location
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="location"
          {{-- id="location"  --}}
          type="text" 
          placeholder="">

          @error('location')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>


      

      {{-- EDUCATIONAL --}}
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Educational Information
        </h2>
        <p class="mb-4 font-bold">Secondary</p>
    </header>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="s_institute">
            Institute
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="s_institute"
          {{-- id="s_institute"  --}}
          type="text" 
          placeholder="">

          @error('s_institute')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="s_group">
            Group
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="s_group"
         {{--  id="s_group"  --}}
          type="text" 
          placeholder="">

          @error('s_group')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="s_result">
            Result
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="s_result"
          {{-- id="s_result"  --}}
          type="text" 
          placeholder="">

          @error('s_result')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="s_year">
            Passing Year
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="s_year"
          {{-- id="s_year"  --}}
          type="text" 
          placeholder="">

          @error('s_year')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="s_curriculum">
            Curriculum
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="s_curriculum"
          {{-- id="s_curriculum"  --}}
          type="text" 
          placeholder="English/Bangla Medium">

          @error('s_curriculum')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>


    {{-- HIGHER SECONDARY --}}
    <header class="text-center">
        <p class="mb-4 font-bold">Higher Secondary</p>
    </header>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="h_institute">
            Institute
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="h_institute"
          {{-- id="h_institute"  --}}
          type="text" 
          placeholder="">

          @error('h_institute')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="h_group">
            Group
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="h_group"
          {{-- id="h_group"  --}}
          type="text" 
          placeholder="">

          @error('h_group')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="h_result">
            Result
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="h_result"
          {{-- id="h_result"  --}}
          type="text" 
          placeholder="">

          @error('h_result')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="h_year">
            Passing Year
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="h_year"
         {{--  id="h_year"  --}}
          type="text" 
          placeholder="">

          @error('h_year')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="h_curriculum">
            Curriculum
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="h_curriculum"
          {{-- id="h_curriculum"  --}}
          type="text" 
          placeholder="English/Bangla Medium">

          @error('h_curriculum')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>

      {{-- University --}}
      <header class="text-center">
        <p class="mb-4 font-bold">University</p>
    </header>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="u_institute">
            Institute
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="u_institute"
          {{-- id="u_institute"  --}}
          type="text" 
          placeholder="">

          @error('u_institute')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="u_major">
            Major
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="u_major"
          {{-- id="u_major"  --}}
          type="text" 
          placeholder="">

          @error('u_major')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="u_sem">
            Current Semester
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="u_sem"
         {{--  id="u_sem"  --}}
          type="text" 
          placeholder="">

          @error('u_sem')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="u_result">
            Result
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="u_result"
          
          type="text" 
          placeholder="">

          @error('u_result')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="u_year">
            Passing Year
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="u_year"
          
          type="text" 
          placeholder="">

          @error('u_year')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>

        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="u_type">
            Study Type
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
          name="u_type"
          {{-- id="u_type"  --}}
          type="text" 
          placeholder="Engineering/Business">

          @error('u_type')
          <p class="text-red-500 text-xs mt-1">
              {{$message}}
          </p>
          @enderror
        </div>
      </div>

      <div class="mb-6">
        <button
            type="submit"
            class="bg-green-500 text-white rounded py-2 px-4 hover:bg-black"
        >
            Submit
        </button>
    </div>
</form>
</div>
@endsection