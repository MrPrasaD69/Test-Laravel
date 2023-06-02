<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Users Page</title>
</head>
<!-- Styles -->
        <style>
            .container{
                text-align: center;
                border: 2px solid black;
            }
        </style>

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
                    <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-success">EDIT</a>
                        <form action="{{route('users.destroy',$user->id)}}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" >DELETE</button>
                        </form>
                        
                    </td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
         <a href="{{route('users.create')}}" class="btn btn-primary">REGISTER</a>
    </div>
 </body>
</html>