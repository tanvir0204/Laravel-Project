@include('inc.admin-css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <nav id="navbar">
      <div class="container">
      
      <h1  class="logo"><a href="/admin"><span class="text-primary">
        <i class="fas fa-user-graduate"></i></span> StudyBuddy  <span class="text-primary">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Admin
          </span>Dashboard</a></h1>
     

    
      <ul>
          <li><a  href="/admin">Dashboard</a></li>
          <li><a class="current" href="/adminOperations/user">Manage Users</a></li>
          <li><a href="/adminOperations/tutor">Manage Tutors</a></li>
          <li><a href="/adminOperations/manageListing">Manage Listing</a></li>

          @auth
                    <li>
                        <form class="inline" method="POST" action="/admin/logout">
                            @csrf
                            <button type="submit" class="dash">
                                <i class="fa-solid fa-door-closed"></i> Logout
                            </button>
                            </form>
                    </li>
            @endauth
          
      </ul>
      </div>
  </nav>
{{-- @include('partials._search') --}}
<x-layout1 class="p-10">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Tutors LIST
        </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
        <tbody>
            @if(count($users)==0)
            <p>No Users Registered Yet !</p>
            @endif

            @foreach($users as $user)
            <tr class="border-gray-300">
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a href="show.html">
                        {{$user->id}}
                    </a>
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a href="show.html">
                        {{$user->name}}
                    </a>
                </td>
                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a href="show.html">
                        {{$user->email}}
                    </a>
                </td>
                <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
                <a
                    href="/listings/{{$user->id}}/edit"
                    class="text-blue-400 px-6 py-2 rounded-xl"
                    >
                    <i
                        class="fa-solid fa-pen-to-square"
                    ></i>
                    Edit</a>
            </td>
            {{-- href="/listings/{{$user->id}}/edit" --}}

                <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                
                    <form method="POST" action="/adminOperations/user/{{$user->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">
                            <i
                                class="fa-solid fa-trash-can"
                            ></i>
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</x-layout1>
