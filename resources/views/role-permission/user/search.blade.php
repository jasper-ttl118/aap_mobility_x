<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create User</title>
    @include("layouts.icons")
    @vite('resources/css/app.css')
</head>
    <body class="flex flex-row h-screen">
        @include('layouts.navbar')
        <div class="flex flex-col w-full ml-64 overflow-y-auto p-10 h-screen">
            @if ($errors->any())
                <div id="toast-error" class="fixed top-5 right-5 z-50 flex flex-col w-full max-w-xs p-4 text-red-500 bg-white border border-red-300 rounded-lg shadow-sm transition-opacity duration-500 ease-in-out opacity-100 dark:bg-red-900 dark:text-red-200" role="alert">
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
            <form form action="/user" method="post" class="w-full">
                @csrf
                <div class="text-gray-700 m-20">
                    <div class="flex flex-col pb-5 mb-5 border-b-2 border-gray-200">
                        <h1 class="text-lg font-bold uppercase">Search Employee</h1>
                        <p class="text-sm">In order to complete the registration process, the user must already be recorded in the employee database.</p>
                    </div>

                    {{-- Search Employee --}}
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="employee-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Employee Name" />
                        <button type="button" id="search-button" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                    
                    <!-- Add this div for search results -->
                    <div id="employee-results" class="mt-4"></div>

                    </div>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
            // Function to handle search
            function performSearch() {
                var searchTerm = $('#employee-search').val();
                
                // Show loading indicator if needed
                $('#employee-results').html('<p class="text-center">Loading...</p>');
                
                $.ajax({
                    url: "/user/search",
                    type: "GET",
                    data: { search: searchTerm },
                    dataType: "json",
                    success: function(response) {
                        displayResults(response);
                    },
                    error: function(xhr) {
                        $('#employee-results').html('<p class="text-center text-red-500">Error loading results</p>');
                        console.log(xhr.responseText);
                    }
                });
            }
            
            // Handle button click
            $('#search-button').click(function() {
                performSearch();
            });
            
            // Handle enter key in search box
            $('#employee-search').keypress(function(e) {
                if(e.which == 13) { // Enter key
                    e.preventDefault();
                    performSearch();
                }
            });
            
            // Function to display results
            function displayResults(data) {
                if(data.employees.length === 0) {
                    $('#employee-results').html('<p class="text-center">No employees found</p>');
                    return;
                }
                
                var html = '<div class="flex flex-col">';
                
                $.each(data.employees, function(index, employee) {
                    html += `
                        <div class="bg-white p-4 shadow cursor-pointer hover:bg-gray-100 transition-colors" 
                            onclick="window.location.href='/user/${employee.employee_id}/create'">
                            <h3 class="font-medium">${employee.employee_firstname} ${employee.employee_middlename} ${employee.employee_lastname}</h3>
                            <p class="text-sm text-gray-600"><b>Position:</b> ${employee.employee_position}</p>
                            <p class="text-sm text-gray-600"><b>Department:</b> ${employee.employee_department}</p>
                            <!-- Add more employee details as needed -->
                        </div>
                    `;
                });
                
                html += '</div>';
                $('#employee-results').html(html);
            }
        });
        </script>

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