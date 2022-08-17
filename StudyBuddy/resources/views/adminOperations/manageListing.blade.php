@include('inc.admin-css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <nav id="navbar">
      <div class="container">
      
        <h1  class="logo"><a href="/admin"><span class="text-primary">
            <i class="fas fa-user-graduate"></i></span> StudyBuddy  <span class="text-primary">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Admin
              </span>Dashboard</a></h1>

    
      <ul>
          <li><a  href="/admin">Dashboard</a></li>
          <li><a  href="/adminOperations/user">Manage Users</a></li>
          <li><a  href="/adminOperations/tutor">Manage Tutors</a></li>
          <li><a class="current" href="/adminOperations/manageListing">Manage Listing</a></li>

          @auth
                    <li>
                        <form class="inline" method="POST" action="/admin/logout" class="dash">
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
  <x-layout1>
    <div class="bg-gray-50 border border-gray-200 p-10 rounded">
        <header>
            <h1
                class="text-3xl text-center font-bold my-6 uppercase"
            >
                Manage Listing Tutions
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @unless($listings->isEmpty())
                @foreach ($listings as $listing)
                    
                
                <tr class="border-gray-300">
                    <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                    <a href="show.html">
                        title :  {{$listing->company}}
                    </a>
                </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a href="show.html">
                              {{$listing->title}}
                        </a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                        <a
                            href="/listings/{{$listing->id}}/edit"
                            class="text-blue-400 px-6 py-2 rounded-xl"
                            ><i
                                class="fa-solid fa-pen-to-square"
                            ></i>
                            Edit</a>
                    </td>
                    <td
                        class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                    <form method="POST" action="/listings/{{$listing->id}}">
                        @csrf
                        @method('Delete')
                        <button  class="text-red-500"><i class="fa-solid fa-trash"></i>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 textr-lg">
                    <p class="text-center">No listing found</p>
                </td>
            </tr>
            @endunless

             
            </tbody>
        </table>
    </div>
</x-layout1> 

  