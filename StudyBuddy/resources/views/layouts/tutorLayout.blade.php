<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <style>
            body{
                margin-bottom: 0px !important; 
            }
            input:focus {
                border: solid 3px rgb(34 197 94);
                }
        </style>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>StudyBuddy | Find Your Desired Tution</title> 
    </head>
    <body class="mb-48">
        <nav class="flex justify-between items-center pt-5 m-7">
            <a href="{{route('tutor.dashboard')}}"
                ><img class="w-24" src="{{asset('images/logo.png')}}" alt="" class="logo"
            /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                <li>
                    <span class="font-bold upppercase">
                        
                        <a href="{{route('tutor.profile')}}" class="hover:text-green-500"
                        >Welcome {{auth()->user()->name}}</a
                    >
                    </span>
                </li>
                
                <li>
                    <a href="{{route('tutor.manage')}}" class="hover:text-green-500"
                        ><i class="fa-solid fa-gear"></i>
                        Manage Information</a
                    >
                </li>
                <li>
                    <form method="POST" action="{{route('tutor.logout')}}" class="inline">
                     @csrf
                     <button type="submit" class="hover:text-red-500">
                        <i class="fa-solid fa-door-closed"></i> Logout
                     </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="/" class="hover:text-green-500"
                        ><i class="fa-solid fa-house"></i>
                        Home</a
                    >
                </li>
                <li>
                    <a href="{{route('tutor.register')}}" class="hover:text-green-500"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                <li>
                    <a href="{{route('user.login')}}" class="hover:text-green-500"
                        ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                        Login</a
                    >
                </li>
                @endauth
            </ul>
        </nav>
  <main>
    @yield('content')
  </main>

  <footer
            class=" w-full flex items-center justify-start font-bold bg-green-500 text-white h-24 mt-40 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
        </footer>
        <x-flash-message></x-flash-message>


        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
</body>
</html>