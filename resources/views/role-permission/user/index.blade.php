<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="p-3">LIST OF USERS
                            <a href="user/create" class="btn btn-primary float-end">Add User</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-auto text-wrap text-center table-hover">
                            <thead>
                                <tr class="row">
                                    <th class="col">Id</th>
                                    <th class="col">Name</th>
                                    <th class="col">Email</th>
                                    <th class="col">Roles</th>
                                    <th class="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user )
                                <tr class="row">
                                    <td class="col">{{ $user->id }}</td>
                                    <td td class="col">{{ $user->name }}</td>
                                    <td td class="col">{{ $user->email }}</td>
                                    <td td class="col">
                                        @if($user->roles->isNotEmpty())
                                            @foreach($user->roles as $role)
                                                <span class="badge bg-primary">{{ $role->name }}</span>
                                            @endforeach
                                        @else
                                            <span class="badge bg-secondary">No Role Assigned</span>
                                        @endif
                                    </td>
                                    <td class="col">
                                        <a href="{{ url('user/'.$user->id.'/edit') }}" class="btn btn-success btn-sm">Edit</a>
                                        <a href="{{ url('user/'.$user->id.'/delete') }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>