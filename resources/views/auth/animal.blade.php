<h1>Animal page</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <h1>Animal page</h1>
</head>
<body>
    <div align='center'>
        <form action="{{route('animal.store')}}" method="POST">
            @csrf
            <h1>Animal page</h1>
            <label for="">Name</label>
            <div class='form-control'>
                <input type="text" name="name" id="">
            </div><br>
            <label for="">color</label>
            <div class='form-control'>
                <input type="text" name="color" id="">
            </div><br>
            <label for="">Pet</label>
            <div class='form-control'>
                <input type="text" name="pet" id="">
            </div><br>

       <button type="submit" class='btn btn-primary'>Save</button>
        </form>
    </div>
</body>
</html>
