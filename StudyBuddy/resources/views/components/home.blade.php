<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 
  <link rel="stylesheet" href="style.css">

  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <title>Home</title>
</head>
@include('inc.home-css')
<body>
  <header>
    <nav id="navbar">
        <div class="container">
        
        <h1  class="logo"><a href="/"><span class="text-primary">
          <i class="fas fa-user-graduate"></i></span> StudyBuddy</a></h1>
       
  
      
        <ul>
            <li><a class="current" href="home.html">Home</a></li>
            {{-- <li><a href="/all/listings">Tution Listing</a></li> --}}
            {{-- <li><a href="contact.html">Contact</a></li> --}}
            <li><a href="/tutors/register">Become a tutor</a></li>
            <li><a href="/users/login">Login</a></li>
            <li><a href="/users/register">Sign Up</a></li>
 
            
        </ul>
        </div>
    </nav>
    
    <div id="showcase">
        <div class="container">
            <div class="showcase-content">
                <h1><span class="text-primary"> Find the right tutor </span> for you
                </h1>
                <!-- <p class="lead">dfdf</p> -->
                <a class="btn " href="/users/register">Sign Up</a>
            </div>
        </div>
    </div>
</header>

  
</body>
</html>