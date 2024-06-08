@extends('auth.layouts')
@section('title', 'About Us')
@section('content')

<head>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/about.css') }}">

</head>

<div class="container">
    <div class="header">

    </div>
    <div class="content">
        <h2>Our Mission</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vehicula, risus sit amet luctus dapibus, sapien libero efficitur lacus, et bibendum nisi erat in lacus. Donec euismod, nisi at feugiat efficitur, augue nisl gravida risus, id fringilla tortor nulla at mauris.</p>

        <h2>Our Team</h2>
        <div class="img">
            <img src="https://blog.udemy.com/wp-content/uploads/2014/06/bigstock-Mixed-group-in-business-meetin-23883404.jpg?w=100"alt="Example Image" >


        </div>
        <p>Quisque facilisis nulla in risus placerat, nec iaculis nisl pretium. Donec finibus felis nec velit hendrerit, vitae cursus libero aliquet. Phasellus et nisl libero. Duis id ex vel ligula fringilla convallis. Ut non mauris et velit consectetur tincidunt.</p>
        <img src="https://kanhasoft.com/blog/wp-content/uploads/2018/09/php-2.jpg" alt="Our Team">

        <h2>Our Values</h2>
        <p>Nam ut semper nunc. Aliquam erat volutpat. Integer gravida orci eget felis accumsan, non interdum metus sagittis. Donec consectetur, odio a porttitor blandit, erat enim tincidunt libero, ut sollicitudin orci ipsum nec felis.</p>
        Trust
As grown-up individuals, the company should trust us to do our jobs and avoid managing us; they should expect us to make our users happy. They provide us with the autonomy and resources to do such. Dev metrics, backlog, and refactoring, among many other details, are owned by the team. People can always ask questions and influence direction.

Within the team and across teams, there’s no “us and them” mentality; we collaborate. Mutual trust is underpinned by a psychologically safe environment we hold dear. It’s also built upon a feedback culture, a proper hiring process, get-together activities, etc.
    </div>
</div>

@endsection
