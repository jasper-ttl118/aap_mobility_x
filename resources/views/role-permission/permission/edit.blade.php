<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Permissions</title>
    @include("layouts.icons")
    @vite('resources/css/app.css')
</head>

{{-- <body>
    @include('layouts.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Module Name
                            <a href="/permission" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('permission/'.$permission->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="">Permission Name</label>
                                <input type="text" name="name" value="{{ $permission->name }}" class="form-control">
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
</body> --}}

<body class="flex flex-row">
    @include('layouts.navbar')
    <div class="flex flex-col w-full h-auto">
        @if ($errors->any())
            <div id="toast-error" class="fixed top-5 right-5 z-50 flex flex-col max-w-xs p-4 text-red-500 bg-white border border-red-300 rounded-lg shadow-sm transition-opacity duration-500 ease-in-out opacity-100 dark:bg-red-900 dark:text-red-200" role="alert">
                <div class="flex items-center">
                    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm-1 5a1 1 0 0 1 2 0v4a1 1 0 0 1-2 0V5Zm1 7a1.25 1.25 0 1 1-1.25 1.25A1.25 1.25 0 0 1 10 12Z"/>
                        </svg>
                        <span class="sr-only">Error icon</span>
                    </div>
                    <span class="ms-3 font-semibold">Error:</span>
                    <button type="button" onclick="closeErrorToast()" class="ms-auto -mx-1.5 -my-1.5 bg-white text-red-400 hover:text-red-900 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:text-red-500 dark:hover:text-white dark:bg-red-800 dark:hover:bg-red-700" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <ul class="mt-2 text-sm list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('permission/'.$permission->id) }}" method="post" class="w-full">
            @csrf
            @method('PUT')
            <div class="text-gray-700 m-20 ">
                <div class="flex flex-col pb-5 mb-5 border-b-2 border-gray-200">
                    <h1 class="text-lg font-bold uppercase">Add Module</h1>
                    <p class="text-sm">Edit Module Name</p>
                </div>
                <div class="flex flex-col gap-7">
                    <div class="flex flex-col gap-2 w-96">
                        <label for="" class="font-medium">Module Name</label>
                        <input type="text" value="{{ $permission->name }}" name="name" placeholder="Enter Role Name"class="bg-gray-100 h-10 rounded-lg border-1 border-gray-200 px-3 focus:outline-blue-900 ">
                    </div>
                </div>
                <Button type="submit" class="mt-10 bg-blue-800 text-white px-3 py-2 rounded-lg hover:bg-blue-900">Update</Button>
            </div>
        </form>
    </div>

    <script>
        function closeErrorToast() {
            const toast = document.getElementById('toast-error');
            toast.classList.add('opacity-0'); // Start fade-out
            setTimeout(() => {
                toast.classList.add('hidden'); // Hide after fade-out
            }, 500); // Matches the transition duration
        }
    
        // Auto-hide the error toast after 7 seconds
        setTimeout(closeErrorToast, 7000);
    </script>
</body>



</html>