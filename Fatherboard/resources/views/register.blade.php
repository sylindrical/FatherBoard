<x-lowlayout>
    <x-slot:head>
        <link rel="stylesheet" href={{ asset('css/register.css') }}>
        <link rel="stylesheet" href={{ asset('css/auth_message.css')}}>

        <script src={{ asset('js/register.js') }}></script>
        <title>Register</title>
    </x-slot:head>

    <div class="wrapper">
    <form action="./_register" method="POST" id="register_form">
        <a class="exitCross" href="{{route('home')}}"></a>
        <h1>Register</h1> <p class="returnToLogin">
            Current User? <br><a href="{{route("login")}}">Login!</a></p> 

        <meta name="csrf-token" content="{{ csrf_token() }}">

        
        <div class="text-input">

            <input type="text" name="username" id="username" placeholder="Email">
            
        </div>




        <div class="text-input">
            <input type="text" name="first_name" id="first_name" placeholder="First Name">
        </div>


        <div class="text-input">
            <input type="text" id="last_name" placeholder="Last Name" required/>
        </div>


        <div class="text-input">
            <input type="password" id ="password" placeholder="Password" required />
        </div>
        <div id="notification_container">
        </div>
        <div class="checkConfirm">
            <a href="{{route('terms')}}">Agree to Terms and Conditions</a>
            <label>
                <input type="checkbox" id="check" required/>
            </label>
        </div>

        <input type="submit" id="submit" name="submit" value="Register">
    </form>
    </div>

    
</x-lowlayout>



