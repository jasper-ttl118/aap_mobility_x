{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permissions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @include('layouts.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                   <div class="alert alert-success">{{ session('status')}}</div> 
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="p-3">Role : {{$role->name}}
                            <a href="/role" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('role/'.$role->id.'/give-permission') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                @error('permission')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <label for="" class="py-3"><b>Privileges</b></label>
                                    <div class="row">
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-3 p-3">
                                                <label for="">
                                                    <input 
                                                    type="checkbox" 
                                                    name="permission[]"    
                                                    value="{{$permission->name}}"
                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : ''}}
                                                    />
                                                    {{$permission->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>

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
</html> --}}