
@include('inc.admin-css')

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 
  
    <nav id="navbar">
        <div class="container">
        
            <h1  class="logo"><a href="/admin"><span class="text-primary">
                <i class="fas fa-user-graduate"></i></span> StudyBuddy  <span class="text-primary">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Admin
                  </span>Dashboard</a></h1>
       
  
      
        <ul>
            <li><a class="current" href="/admin"><i class="fas fa-cogs"></i> Dashboard</a></li>
            <li><a href="/adminOperations/user"><i class="fas fa-users-cog"></i> Manage Users </a></li>
            <li><a href="/adminOperations/tutor"><i class="fas fa-chalkboard-teacher"></i> Manage Tutors</a></li>
            <li><a href="/adminOperations/manageListing"><i class="fas fa-list-ul"></i> Manage Listing</a></li>
            @auth
                    <li class="dash">
                        <form class="inline" method="POST" action="/admin/logout">
                            @csrf
                            <button type="submit" >
                                <i class="fa-solid fa-door-closed"></i> Logout
                            </button>
                            </form>
                    </li>
            @endauth
            
        </ul>
        </div>
    </nav>
   
    <x-layout1>
        @include('features._search')

    <div
    class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
    >

    @if(count($listings)==0)
    <p>No listings found</p>
    @endif

    @foreach($listings as $listing)
    {{-- @php 
    $test =1;
    @endphp --}}
    <x-listing-card :listing="$listing" />

    
    @endforeach
</div>
<div class="mt-6 p-4">
    {{$listings->links()}}

</div>
</x-layout1>

   
    