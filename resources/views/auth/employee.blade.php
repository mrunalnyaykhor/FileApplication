
<div class="container" align="center">
    <h1>Employee Table</h1>

    <form action="{{ route('employeeCreate.store') }}" method="POST">
        @csrf <!-- Include CSRF token for security -->

        <div>
            <div>
                <input type="text" class="form-control" name="name" placeholder="Name" required>
            </div><br>

            <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div><br>

            <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div><br>

            <div>
                <textarea class="form-control" name="address" placeholder="Address" required></textarea>
            </div><br>

            <div>
                <input type="text" class="form-control" name="mobilenumber" placeholder="Mobile Number" required>
            </div><br>

            <div>
                <input type="text" class="form-control" name="salary" placeholder="Salary" required>
            </div><br>

            <div class="d-grid mb-2">
                <input type="submit" class="btn btn-info" value="Send">
            </div>
        </div>
    </form>
</div>

{{-- <div class="container" align="center">
    <h1>Employee Table</h1>

    <form action="{{route('employeeCreate.store')}}" method="POST">

       <div>
        <div>  <input type="text" class="form-controll" name='name'  required></div><br>

            <div> <input type='text' class="form-controll" name="email" value="email" required></div><br>
                <div><input type="password" class='form-control' name="password" value="password" required></div><br>
                    <div><input type="text-area" class="form-control" name="address" value="address" required></div><br>
                        <div><input type="text" class="form-control" name="mobilenumber" value="mobilenumber" required></div><br>
                        <div><input type="text" class="form-control" name="salary" value="salary" required></div><br>

                        <div class="d-grid mb-2">
                            <input type ="submit" class ="btn btn-info" value="Send">
                        </div>
    </div>
    </form>

</div> --}}
{{-- // --}}

