@extends('auth.layouts')
@section('title', 'login')
@section('content')

    <head>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}">
    </head>

    <div>


        <title>Contact Us</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f9;

                padding: 0;
                display: flex;
                */ justify-content: center;
                /* display: flex; */
                height: 100vh;
                padding: 1px;

                display: grid;
                place-items: center;
                height: 10vh;


            }

            .contact-container {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 900px;
                max-width: 100%;
            }

            h2 {
                color: #333;
                text-align: center;
                margin-bottom: 20px;
            }

            label {
                display: block;
                margin-bottom: 8px;
                color: #555;
            }

            input,
            textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ddd;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type="submit"] {
                background-color: #28a745;
                color: white;
                border: none;
                cursor: pointer;
                padding: 12px;
                transition: background-color 0.3s ease;
            }

            input[type="submit"]:hover {
                background-color: #218838;
            }
        </style>

        <body>
            <div class="contact-container">
                <h2>Contact Us</h2>
                <form action="#" method="post">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                    <label for="mobile">Mobile Number</label>
                    <input type="text" id="mobile" name="mobile" required>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>

                    <input type="submit" value="Send Message">
                </form>
            </div>
        </body>
    </div>
@endsection
