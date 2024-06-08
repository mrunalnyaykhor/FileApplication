<html lang="en">
    @extends('auth.layouts')
 @section('title', 'register')
@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/contact.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>

    <div class="container">
        <h1 class="mt-5">Contact us</h1>

        <div class="contact-info">

            <p><strong>Phone Number:</strong> +1 (555) 123-4567</p>
            <p><strong>Email:</strong> nexus123@gmail.com</p>
        </div>

        <div class="contact-info">
            <h2>Our Location</h2>
            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30435.243708885615!2d78.46630201498776!3d17.36160710485766!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb99d2b5aedd03%3A0x5f9e3a27e7c51a1c!2sCharminar!5e0!3m2!1sen!2sin!4v1686160344290!5m2!1sen!2sin"

                    frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>

        <div class="contact-info mt-4">
            <h2>Our Campus</h2>
            <img src="https://media.glassdoor.com/l/2425536/mait-solutions-office.jpg" alt="Our Office" class="contact-photo">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
