<html>
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

        <style>
        .container{
            text-align: center;
            border: 2px solid black;
        }
        </style>

    </head>
    <body class="antialiased">
       <div class="container">
        <h2>User List</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>********</td>
                        <td><a href="{{route('edituser',$user->id)}}" class="btn btn-success">EDIT</a><a href="" class="btn btn-danger">DELETE</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('goBack') }}" class="btn btn-warning">Go Back</a>
       </div>
    </body>
</html>

</html>