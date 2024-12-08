
<x-lowlayout>
    <x-slot:head>
    <link rel="stylesheet" href={{ asset('css/login.css') }}>
    <link rel="stylesheet" href={{ asset('css/auth_message.css')}}>
    <script src={{ asset('js/login.js') }}></script>
    <title>Login</title>
    </x-slot:head>

    <div class="wrapper">

    <form action="./_login" method="POST" id="login_form">

        <a class="exitCross" href="{{ route('home') }}"></a>
        <h1>Log in</h1>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <div class="text-input">
            <input type = "email" id ="email" placeholder="Email" required/>
        </div>

        <div class="text-input">
            <br> <input type="password" id ="password" placeholder="Password" required /> </br>
        </div>

        <div id="notification_container">
        </div>
        
        <div id="persist_login">
        <label for="permanent">Persist login after close</label>
        <input type="checkbox" name="permanent" id="permanent">
        </div>

        <div class="forgotPassword">
            <a href="#">Forgot Password?</a>
        </div>

        
        <input type="submit"  name="submit" id="submit" value="Login">

        <div class="register">
            <p id="newUserText">New user? <a href="{{route('register')}}">Create a new account!</a></p>
        </div>

    </form>
</div>



    
    <p></p>
</x-lowlayout>


{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>FatherBoard - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel = "stylesheet" type="text/css" href="Logincss.css" /> <!-- Link for Login page stylesheet -->
   </head>


   <body>
    <div class="wrapper">
        <form action="">
            <a class="exitCross" href="Home.html"></a>
           <h1>Login</h1>
            <div class="text-input">
                <input type = "email" id ="email" placeholder="Email" required/>
            </div>
            <div class="text-input">
            <br> <input type="password" id ="password" placeholder="Password" required /> </br>
            </div>

            <div class="forgotPassword">
                <a href="#">Forgot Password?</a>
            </div>

            <button type="submit" class="button" value="login">Login</button>
            
            <div class="register">
                <p id="newUserText">New user? <a href="Signup.html">Create a new account!</a></p>
            </div>
      </form>
      </header>
   </body> --}}