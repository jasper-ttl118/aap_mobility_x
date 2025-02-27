<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="p-3">Add User
                            <a href="/user" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="/user" method="post">
                            @csrf
                            <div class="mb-3">

                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">

                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">

                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">

                                <label for="">Roles</label>
                                <select name="roles[]" class="form-select" multiple>
                                    <option>--</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary mt-3">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>