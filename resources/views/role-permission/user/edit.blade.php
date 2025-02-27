<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update User
                            <a href="/user" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('user/'.$user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">

                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                                <label for="">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror

                                <label for="">Roles</label>
                                <select name="roles[]" class="form-select" multiple>
                                    <option value="">--</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected':'' }}>
                                            {{ $role }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary mt-3">Update</button>
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