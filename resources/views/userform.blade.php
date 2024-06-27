

<html>
    <head>
<link rel="stylesheet" href="public/css/index.css">
<link rel="stylesheet" type="text/css" href="{{ url('/css/index.css') }}">
    </head>
    <body>
<div class='text-center'>
        <h1> User Registration</h1>
        <form action="userprocess" method="POST">
            @csrf
            
            <input type="text" name="name" id="" placeholder="Enter Your Name">
             <br><br>
            <input type="email" name="email" id=""placeholder="Enter email id">
            <br><br>
            <button input  type="Submit"  name="Send">Submit</button>

        </form>
    </div>

    </body>
</html>

//
