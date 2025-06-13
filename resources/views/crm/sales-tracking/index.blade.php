<x-app-layout class='flex flex-row w-h-screen' navbar_selected='CRM' :x_data="['open' => false, 'deleteUrl' => '', 'viewOpen' => false, 'employee' => new stdClass()]">
    <div class="flex flex-1 flex-col lg:ml-52 hide-scrollbar lg:p-10 lg:gap-7 bg-[#f3f4f6]">
        <!-- Title and Subtitle -->
        {{-- <div class="">
            <h1 class="text-2xl font-semibold text-blue-900">Dashboard</h1>
            <p class="text-gray-700 text-sm"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem aliquid, in minus voluptate optio illo suscipit possimus fuga explicabo necessitatibus aperiam vel at consequatur corrupti tempora sint veniam libero nisi.</p>
        </div> --}}

        <!-- Options Container -->
        <div class="flex md:justify-center w-full">
            <div class="mx-5 lg:mx-0 mt-16 lg:mt-5 lg:-mb-5 overflow-x-auto hide-scrollbar rounded-md border-2 border-gray-100 bg-white shadow-md w-[440px] md:w-[80%] lg:w-full">
                <div class="flex min-w-[600px] lg:min-w-0">
                    <div class="flex-none w-32 p-4 text-center">
                        <a href="{{ route('customer.index') }}" class="text-gray-600 hover:text-blue-800">Dashboard</a>
                    </div>
                    <div class="flex-none w-32 p-4 text-center">
                        <a href="{{ route('contacts') }}" class="text-gray-600 hover:text-blue-800">Members</a>
                    </div>
                    <div class="flex-none w-auto p-4 text-center">
                        <a href="{{ route('email-marketing') }}" class="text-gray-600 hover:text-blue-800">Email Marketing</a>
                    </div>
                    <div class="flex-none w-32 p-4 text-center">
                        <a href="{{ route('corporate') }}" class="text-gray-600 hover:text-blue-800">Corporate</a>
                    </div>
                    <div class="flex-none w-auto p-4 font-semibold border-b-2 border-blue-900 text-center">
                        <a href="{{ route('sales-tracking') }}" class="text-gray-600 hover:text-blue-800">Sales Tracking</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs-->
        <div class="flex h-10 items-start gap-x-1 text-blue-900 text-sm px-12 lg:px-7 pt-2 lg:pt-0 md:ml-20 lg:ml-0">
            <a href="{{ route('customer.index') }}" class="hover:underline">Customer Relationship Management</a>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                    d="M16.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L14.69 12 7.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <a href="{{ route('sales-tracking') }}" class="hover:underline font-semibold">Sales Tracking</a>
        </div>

        {{-- First Row --}}
        <div class="flex md:w-full md:justify-center">
            <div class="flex flex-col lg:flex-row h-[600px] lg:h-[300px] ml-5 lg:ml-0 w-[440px] lg:w-full border border-white lg:-mt-10 bg-[#f3f3f3] shadow-md rounded-md py-4 lg:py-0 px-4 gap-3 items-center justify-center ">
                {{-- Four Boxes --}}
                <div class="h-[50%] lg:h-[90%] lg:w-[50%] w-full flex flex-row justify-center items-center gap-x-3 ">
                    <div class="flex flex-col w-full lg:w-[50%] h-full lg:h-[90%] items-center justify-evenly gap-y-5">
                        {{-- First Box --}}
                        <div  onclick="my_modal_first.showModal()" class="cursor-pointer hover:scale-105 duration-300 transform flex flex-row w-full h-full lg:h-[48%] bg-white shadow-md rounded-md items-center px-2 gap-3">
                            <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                <svg fill="#000000" width="30px" height="30px" viewBox="0 0 24 24" id="phillippine-peso" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><path id="primary" d="M11,15H8V3h3a6,6,0,0,1,6,6h0A6,6,0,0,1,11,15ZM8,3V21" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                </path><path id="primary-2" data-name="primary" d="M4,7H20M4,11H20" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>
                            </div>
                            <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                <div class="flex flex-row w-full gap-2">
                                    <span class="text-[#151847] font-extrabold text-xs lg:text-sm uppercase tracking-wide lg:tracking-wider">Total Sales</span>
                                    <span class="text-green-400 font-bold text-xs lg:text-sm  bg-green-400 bg-opacity-20  rounded-md"> +22%</span>
                                </div>
                                <span class="text-[#151847] font-bold text-lg lg:text-xl">₱2,533,970.40</span>
                            </div>
                            <dialog id="my_modal_first" class="modal rounded-xl border border-[#151847] hide-scrollbar w-[60%] h-[50%]">
                                <div class="modal-box flex flex-row p-3">
                                    <form method="dialog" class="modal-backdrop">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                        <svg fill="#000000" width="30px" height="30px" viewBox="0 0 24 24" id="phillippine-peso" data-name="Flat Line" xmlns="http://www.w3.org/2000/svg" class="icon flat-line"><path id="primary" d="M11,15H8V3h3a6,6,0,0,1,6,6h0A6,6,0,0,1,11,15ZM8,3V21" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;">
                                        </path><path id="primary-2" data-name="primary" d="M4,7H20M4,11H20" style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></path></svg>
                                    </div>
                                    <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                        <div class="flex flex-row w-full gap-2">
                                            <span class="text-[#151847] font-extrabold text-xs lg:text-sm uppercase tracking-wide lg:tracking-wider">Total Sales</span>
                                            <span class="text-green-400 font-bold text-xs lg:text-sm  bg-green-400 bg-opacity-20  rounded-md"> +22%</span>
                                        </div>
                                        <span class="text-[#151847] font-bold text-lg lg:text-xl">₱2,533,970.40</span>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                        {{-- Second Box --}}
                        <div onclick="my_modal_second.showModal()" class="cursor-pointer hover:-translate-y-2 hover:scale-105 duration-300 transform flex flex-row w-full h-full lg:h-[48%] bg-white shadow-md rounded-md items-center px-2 gap-3">
                           <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                <svg fill="#000000" width="30px" height="30px" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg"><path d="M 13.7851 49.5742 L 42.2382 49.5742 C 47.1366 49.5742 49.5743 47.1367 49.5743 42.3086 L 49.5743 13.6914 C 49.5743 8.8633 47.1366 6.4258 42.2382 6.4258 L 13.7851 6.4258 C 8.9101 6.4258 6.4257 8.8398 6.4257 13.6914 L 6.4257 42.3086 C 6.4257 47.1602 8.9101 49.5742 13.7851 49.5742 Z M 13.8554 45.8008 C 11.5117 45.8008 10.1992 44.5586 10.1992 42.1211 L 10.1992 13.8789 C 10.1992 11.4414 11.5117 10.1992 13.8554 10.1992 L 42.1679 10.1992 C 44.4882 10.1992 45.8007 11.4414 45.8007 13.8789 L 45.8007 42.1211 C 45.8007 44.5586 44.4882 45.8008 42.1679 45.8008 Z M 27.9648 22.1289 C 29.6523 22.1289 30.8476 21.0039 30.8476 19.5508 C 30.8476 17.8867 29.6757 16.7383 27.9648 16.7383 C 26.3944 16.7383 25.1757 17.9102 25.1757 19.5508 C 25.1757 21.0039 26.3944 22.1289 27.9648 22.1289 Z M 18.8944 29.9571 L 37.1523 29.9571 C 38.4648 29.9571 39.3554 29.2539 39.3554 28.0118 C 39.3554 26.7461 38.5117 26.0430 37.1523 26.0430 L 18.8944 26.0430 C 17.5351 26.0430 16.6679 26.7461 16.6679 28.0118 C 16.6679 29.2539 17.5820 29.9571 18.8944 29.9571 Z M 27.9648 39.2383 C 29.6523 39.2383 30.8476 38.0898 30.8476 36.6367 C 30.8476 34.9961 29.6757 33.8477 27.9648 33.8477 C 26.3944 33.8477 25.1757 34.9961 25.1757 36.6367 C 25.1757 38.0898 26.3944 39.2383 27.9648 39.2383 Z"/></svg>
                            </div>
                            <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                <span class="text-[#151847] font-extrabold text-xs lg:text-sm uppercase tracking-wider lg:tracking-wider">Average Deals Sized</span>                             
                                <span class="text-[#151847] font-bold text-lg lg:text-xl">109,073</span>
                            </div>
                            <dialog id="my_modal_second" class="modal rounded-xl border border-[#151847] hide-scrollbar w-[60%] h-[50%]">
                                <div class="modal-box flex flex-row p-3">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                        <svg fill="#000000" width="30px" height="30px" viewBox="0 0 56 56" xmlns="http://www.w3.org/2000/svg"><path d="M 13.7851 49.5742 L 42.2382 49.5742 C 47.1366 49.5742 49.5743 47.1367 49.5743 42.3086 L 49.5743 13.6914 C 49.5743 8.8633 47.1366 6.4258 42.2382 6.4258 L 13.7851 6.4258 C 8.9101 6.4258 6.4257 8.8398 6.4257 13.6914 L 6.4257 42.3086 C 6.4257 47.1602 8.9101 49.5742 13.7851 49.5742 Z M 13.8554 45.8008 C 11.5117 45.8008 10.1992 44.5586 10.1992 42.1211 L 10.1992 13.8789 C 10.1992 11.4414 11.5117 10.1992 13.8554 10.1992 L 42.1679 10.1992 C 44.4882 10.1992 45.8007 11.4414 45.8007 13.8789 L 45.8007 42.1211 C 45.8007 44.5586 44.4882 45.8008 42.1679 45.8008 Z M 27.9648 22.1289 C 29.6523 22.1289 30.8476 21.0039 30.8476 19.5508 C 30.8476 17.8867 29.6757 16.7383 27.9648 16.7383 C 26.3944 16.7383 25.1757 17.9102 25.1757 19.5508 C 25.1757 21.0039 26.3944 22.1289 27.9648 22.1289 Z M 18.8944 29.9571 L 37.1523 29.9571 C 38.4648 29.9571 39.3554 29.2539 39.3554 28.0118 C 39.3554 26.7461 38.5117 26.0430 37.1523 26.0430 L 18.8944 26.0430 C 17.5351 26.0430 16.6679 26.7461 16.6679 28.0118 C 16.6679 29.2539 17.5820 29.9571 18.8944 29.9571 Z M 27.9648 39.2383 C 29.6523 39.2383 30.8476 38.0898 30.8476 36.6367 C 30.8476 34.9961 29.6757 33.8477 27.9648 33.8477 C 26.3944 33.8477 25.1757 34.9961 25.1757 36.6367 C 25.1757 38.0898 26.3944 39.2383 27.9648 39.2383 Z"/></svg>
                                    </div>
                                    <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                        <span class="text-[#151847] font-extrabold text-xs lg:text-sm uppercase tracking-wider lg:tracking-wider">Average Deals Sized</span>                             
                                        <span class="text-[#151847] font-bold text-lg lg:text-xl">109,073</span>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                    </div>
                    <div class="flex flex-col w-full lg:w-[50%] h-full lg:h-[90%] items-center justify-evenly gap-y-5">
                        {{-- Third Box --}}
                        <div onclick="my_modal_third.showModal()" class="cursor-pointer hover:-translate-y-2 hover:scale-105 duration-300 transform flex flex-row w-full h-full lg:h-[48%] bg-white shadow-md rounded-md items-center px-2 gap-3">
                           <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                <svg height="30px" width="30px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                    viewBox="0 0 512 512"  xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:#000000;}
                                </style>
                                <g>
                                    <path class="st0" d="M255.366,141.046c-7.4,3.583-14.732,8.548-21.533,15.357c-34.091,34.098-65.081,65.088-65.081,65.088
                                        l0.013,0.02c-0.185,0.186-0.371,0.338-0.557,0.53c-8.824,8.831-9.174,22.909-1.025,32.146c0.323,0.371,0.668,0.736,1.025,1.086
                                        c9.161,9.174,24.036,9.196,33.232,0l35.797-35.797c6.176,2.263,12.248,3.583,18.074,4.243c7.937,0.88,15.392,0.55,22.022-0.385
                                        c16.162-2.29,14.47-1.623,23.844-4.704c9.353-3.068,19.862-9.354,19.862-9.354l6.362,6.355
                                        c0.701,0.681,16.919,16.925,25.192,25.185c1.465,1.471,2.709,2.682,3.542,3.549c0.956,0.997,2.022,1.719,2.682,2.682l41.278,41.279
                                        c11.898-13.35,25.488-33.232,23.81-56.058L320.763,129.14C320.763,129.14,285.062,126.589,255.366,141.046z"/>
                                    <path class="st0" d="M261.115,394.362c-9.134-9.147-23.961-9.147-33.101,0l-6.794,6.794c9.119-9.132,9.112-23.926-0.021-33.066
                                        c-9.14-9.126-23.947-9.126-33.087,0.007c9.14-9.133,9.14-23.94,0-33.087c-9.133-9.148-23.947-9.133-33.087,0
                                        c9.14-9.133,9.14-23.947,0-33.095c-9.134-9.132-23.947-9.132-33.088,0.014l-20.46,20.453c-9.14,9.147-9.14,23.947,0,33.094
                                        c9.133,9.134,23.941,9.134,33.08,0c-9.14,9.134-9.14,23.947,0,33.087c9.147,9.133,23.954,9.133,33.094,0
                                        c-9.14,9.133-9.14,23.941,0,33.088c9.14,9.133,23.947,9.133,33.088,0l6.802-6.809c-9.119,9.147-9.113,23.94,0.02,33.081
                                        c9.14,9.132,23.947,9.132,33.088,0l20.467-20.468C270.248,418.302,270.248,403.495,261.115,394.362z"/>
                                    <path class="st0" d="M507.987,178.28L387.543,57.822c-5.351-5.337-14.002-5.337-19.339,0l-38.631,38.63
                                        c-5.337,5.337-5.337,13.989,0,19.333l120.458,120.451c5.33,5.35,13.996,5.35,19.326,0l38.63-38.638
                                        C513.338,192.276,513.338,183.624,507.987,178.28z M473.655,204.992c-5.75,5.736-15.048,5.736-20.777,0
                                        c-5.735-5.743-5.735-15.041,0-20.777c5.729-5.736,15.027-5.736,20.777,0C479.391,189.951,479.384,199.249,473.655,204.992z"/>
                                    <path class="st0" d="M182.417,99.864l-38.624-38.63c-5.336-5.337-13.995-5.337-19.332,0L4.003,181.691
                                        c-5.337,5.323-5.337,13.989,0,19.319l38.631,38.644c5.33,5.331,14.002,5.331,19.325,0l120.458-120.458
                                        C187.761,113.859,187.761,105.207,182.417,99.864z M59.118,208.403c-5.736,5.729-15.04,5.729-20.777,0
                                        c-5.735-5.742-5.735-15.041,0-20.777c5.736-5.735,15.041-5.735,20.777,0C64.854,193.362,64.854,202.66,59.118,208.403z"/>
                                    <path class="st0" d="M397.528,312.809l-7.468-7.482l-72.509-72.509l-4.883,2.166l-5.316,1.919l-0.384,0.117
                                        c-0.936,0.296-9.684,2.971-26.932,5.412c-9.12,1.273-18.156,1.431-26.904,0.434c-3.459-0.385-6.898-0.95-10.296-1.692
                                        l-27.757,27.744c-16.678,16.678-43.836,16.678-60.514,0c-0.585-0.591-1.149-1.19-1.671-1.781l-0.179-0.2
                                        c-10.529-11.939-13.204-28.28-8.252-42.461l10.673-16.609l-0.02-0.02l65.081-65.074c2.647-2.641,5.426-5.103,8.314-7.428
                                        c-20.281-3.982-37.296-2.806-37.296-2.806L88.093,235.679c-1.389,18.988,11.651,39.799,20.928,51.952
                                        c16.692-15.963,43.239-15.756,59.641,0.654c6.107,6.1,9.952,13.617,11.574,21.498c7.895,1.637,15.406,5.475,21.513,11.582
                                        c6.107,6.114,9.952,13.631,11.575,21.519c7.888,1.623,15.412,5.46,21.513,11.568c4.078,4.078,7.152,8.783,9.222,13.817
                                        c11.1-0.137,22.242,4.016,30.688,12.455c16.65,16.636,16.643,43.733,0,60.363l-6.809,6.822l3.411,3.412
                                        c9.148,9.147,23.954,9.147,33.095,0c9.14-9.134,9.14-23.947,0-33.088l6.808,6.83c9.147,9.133,23.947,9.133,33.087,0
                                        c9.14-9.147,9.147-23.954,0-33.101c9.147,9.147,23.947,9.147,33.087,0c9.134-9.126,9.154-23.94,0-33.088
                                        c9.154,9.148,23.954,9.148,33.088,0c9.147-9.132,9.147-23.947,0-33.08L397.528,312.809z"/>
                                </g>
                                </svg>
                            </div>
                            <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                <span class="text-[#151847] font-extrabold text-xs lg:text-sm uppercase tracking-wider lg:tracking-wider">Deals Closed</span>                             
                                <span class="text-[#151847] font-bold text-lg lg:text-xl">109,073</span>
                            </div>
                            <dialog id="my_modal_third" class="modal rounded-xl border border-[#151847] hide-scrollbar w-[60%] h-[50%]">
                                <div class="modal-box flex flex-row p-3">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                        <svg height="30px" width="30px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                viewBox="0 0 512 512"  xml:space="preserve">
                                            <style type="text/css">
                                                .st0{fill:#000000;}
                                            </style>
                                            <g>
                                                <path class="st0" d="M255.366,141.046c-7.4,3.583-14.732,8.548-21.533,15.357c-34.091,34.098-65.081,65.088-65.081,65.088
                                                    l0.013,0.02c-0.185,0.186-0.371,0.338-0.557,0.53c-8.824,8.831-9.174,22.909-1.025,32.146c0.323,0.371,0.668,0.736,1.025,1.086
                                                    c9.161,9.174,24.036,9.196,33.232,0l35.797-35.797c6.176,2.263,12.248,3.583,18.074,4.243c7.937,0.88,15.392,0.55,22.022-0.385
                                                    c16.162-2.29,14.47-1.623,23.844-4.704c9.353-3.068,19.862-9.354,19.862-9.354l6.362,6.355
                                                    c0.701,0.681,16.919,16.925,25.192,25.185c1.465,1.471,2.709,2.682,3.542,3.549c0.956,0.997,2.022,1.719,2.682,2.682l41.278,41.279
                                                    c11.898-13.35,25.488-33.232,23.81-56.058L320.763,129.14C320.763,129.14,285.062,126.589,255.366,141.046z"/>
                                                <path class="st0" d="M261.115,394.362c-9.134-9.147-23.961-9.147-33.101,0l-6.794,6.794c9.119-9.132,9.112-23.926-0.021-33.066
                                                    c-9.14-9.126-23.947-9.126-33.087,0.007c9.14-9.133,9.14-23.94,0-33.087c-9.133-9.148-23.947-9.133-33.087,0
                                                    c9.14-9.133,9.14-23.947,0-33.095c-9.134-9.132-23.947-9.132-33.088,0.014l-20.46,20.453c-9.14,9.147-9.14,23.947,0,33.094
                                                    c9.133,9.134,23.941,9.134,33.08,0c-9.14,9.134-9.14,23.947,0,33.087c9.147,9.133,23.954,9.133,33.094,0
                                                    c-9.14,9.133-9.14,23.941,0,33.088c9.14,9.133,23.947,9.133,33.088,0l6.802-6.809c-9.119,9.147-9.113,23.94,0.02,33.081
                                                    c9.14,9.132,23.947,9.132,33.088,0l20.467-20.468C270.248,418.302,270.248,403.495,261.115,394.362z"/>
                                                <path class="st0" d="M507.987,178.28L387.543,57.822c-5.351-5.337-14.002-5.337-19.339,0l-38.631,38.63
                                                    c-5.337,5.337-5.337,13.989,0,19.333l120.458,120.451c5.33,5.35,13.996,5.35,19.326,0l38.63-38.638
                                                    C513.338,192.276,513.338,183.624,507.987,178.28z M473.655,204.992c-5.75,5.736-15.048,5.736-20.777,0
                                                    c-5.735-5.743-5.735-15.041,0-20.777c5.729-5.736,15.027-5.736,20.777,0C479.391,189.951,479.384,199.249,473.655,204.992z"/>
                                                <path class="st0" d="M182.417,99.864l-38.624-38.63c-5.336-5.337-13.995-5.337-19.332,0L4.003,181.691
                                                    c-5.337,5.323-5.337,13.989,0,19.319l38.631,38.644c5.33,5.331,14.002,5.331,19.325,0l120.458-120.458
                                                    C187.761,113.859,187.761,105.207,182.417,99.864z M59.118,208.403c-5.736,5.729-15.04,5.729-20.777,0
                                                    c-5.735-5.742-5.735-15.041,0-20.777c5.736-5.735,15.041-5.735,20.777,0C64.854,193.362,64.854,202.66,59.118,208.403z"/>
                                                <path class="st0" d="M397.528,312.809l-7.468-7.482l-72.509-72.509l-4.883,2.166l-5.316,1.919l-0.384,0.117
                                                    c-0.936,0.296-9.684,2.971-26.932,5.412c-9.12,1.273-18.156,1.431-26.904,0.434c-3.459-0.385-6.898-0.95-10.296-1.692
                                                    l-27.757,27.744c-16.678,16.678-43.836,16.678-60.514,0c-0.585-0.591-1.149-1.19-1.671-1.781l-0.179-0.2
                                                    c-10.529-11.939-13.204-28.28-8.252-42.461l10.673-16.609l-0.02-0.02l65.081-65.074c2.647-2.641,5.426-5.103,8.314-7.428
                                                    c-20.281-3.982-37.296-2.806-37.296-2.806L88.093,235.679c-1.389,18.988,11.651,39.799,20.928,51.952
                                                    c16.692-15.963,43.239-15.756,59.641,0.654c6.107,6.1,9.952,13.617,11.574,21.498c7.895,1.637,15.406,5.475,21.513,11.582
                                                    c6.107,6.114,9.952,13.631,11.575,21.519c7.888,1.623,15.412,5.46,21.513,11.568c4.078,4.078,7.152,8.783,9.222,13.817
                                                    c11.1-0.137,22.242,4.016,30.688,12.455c16.65,16.636,16.643,43.733,0,60.363l-6.809,6.822l3.411,3.412
                                                    c9.148,9.147,23.954,9.147,33.095,0c9.14-9.134,9.14-23.947,0-33.088l6.808,6.83c9.147,9.133,23.947,9.133,33.087,0
                                                    c9.14-9.147,9.147-23.954,0-33.101c9.147,9.147,23.947,9.147,33.087,0c9.134-9.126,9.154-23.94,0-33.088
                                                    c9.154,9.148,23.954,9.148,33.088,0c9.147-9.132,9.147-23.947,0-33.08L397.528,312.809z"/>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                        <span class="text-[#151847] font-extrabold text-xs lg:text-sm uppercase tracking-wider lg:tracking-wider">Deals Closed</span>                             
                                        <span class="text-[#151847] font-bold text-lg lg:text-xl">109,073</span>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                        {{-- Fourth Box --}}
                        <div onclick="my_modal_fourth.showModal()" class="cursor-pointer hover:-translate-y-2 hover:scale-105 duration-300 transform flex flex-row w-full h-full lg:h-[48%] bg-white shadow-md rounded-md items-center px-2 gap-3">
                           <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.25 10.5a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5zm-1.543 9.207a1 1 0 0 1-1.414-1.414l14-14a1 1 0 1 1 1.414 1.414l-14 14zM13 17.25a3.75 3.75 0 1 0 7.5 0 3.75 3.75 0 0 0-7.5 0zM7.25 8.5a1.75 1.75 0 1 0 0-3.5 1.75 1.75 0 0 0 0 3.5zm11.25 8.75a1.75 1.75 0 1 1-3.5 0 1.75 1.75 0 0 1 3.5 0z" fill="#000000"/></svg>
                            </div>
                            <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                <span class="text-[#151847] font-extrabold text-xs lg:text-sm uppercase tracking-wider lg:tracking-wider">Success Rate</span>                             
                                <span class="text-[#151847] font-bold text-lg lg:text-xl">64%</span>
                            </div>
                            <dialog id="my_modal_fourth" class="modal rounded-xl border border-[#151847] hide-scrollbar w-[60%] h-[50%]">
                                <div class="modal-box flex flex-row p-3">
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="bg-[#dedede] rounded-2xl h-20 items-center justify-center flex p-1">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.25 10.5a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5zm-1.543 9.207a1 1 0 0 1-1.414-1.414l14-14a1 1 0 1 1 1.414 1.414l-14 14zM13 17.25a3.75 3.75 0 1 0 7.5 0 3.75 3.75 0 0 0-7.5 0zM7.25 8.5a1.75 1.75 0 1 0 0-3.5 1.75 1.75 0 0 0 0 3.5zm11.25 8.75a1.75 1.75 0 1 1-3.5 0 1.75 1.75 0 0 1 3.5 0z" fill="#000000"/></svg>
                                    </div>
                                    <div class="flex flex-col w-full h-[70%] justify-center items-start py-2">
                                        <span class="text-[#151847] font-extrabold text-xs lg:text-sm uppercase tracking-wider lg:tracking-wider">Success Rate</span>                             
                                        <span class="text-[#151847] font-bold text-lg lg:text-xl">64%</span>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                    </div>
                </div>
                {{-- Filter Sales --}}
                <div x-data="{activeFilter: 'Today'}" class="group hover:scale-105 duration-300 transform flex flex-col h-[60%] lg:h-[90%] w-full lg:w-[50%] items-center justify-center shadow-md rounded-md bg-white p-2">
                    <div class="flex w-full h-[10%] items-center">
                        <div class="w-full h-full justify-center flex items-center flex-row px-4 gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                            </svg>
                            <span class="w-[65%] h-full justify-between flex text-[#151847] font-extrabold text-lg tracking-widest" >SALES</span>         
                        
                            <div x-data="{ open: false }" class="h-7 w-[50%] relative inline-block mt-2">
                                <button x-text="activeFilter" @click="open = !open"  id="filter" class="flex justify-between items-center w-full h-full rounded-md border border-[#151847] shadow-sm px-2 py-2 uppercase bg-white text-xs font-bold text-[#151847] hover:text-white  hover:bg-[#151847]">
                                    Today
                                    <svg class="size-4 text-[#151847]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                </button>
                                    
                                <div x-show="open" @click.away="open = false" x-transition 
                                    id="filterContent"  class=" absolute z-10 h-50 w-full  rounded-md bg-white ">
                                    <div x-data="{ isFirst: true }" class="border-x shadow-xs rounded-b-md border-[#151847] bg-white w-full h-full border-b">
                                        <button @click="activeFilter = 'Today', open = false" 
                                            class="block w-full h-8 px-4 py-2 text-[#151847] hover:bg-[#151847] text-xs hover:text-white rounded-md text-start uppercase">Today</button>
                                        <button @click="activeFilter = 'Yesterday', open = false" 
                                            class="block w-full h-8 px-4 py-2 text-[#151847] hover:bg-[#151847] text-xs hover:text-white rounded-md text-start uppercase">Yesterday</button>
                                        <button @click="activeFilter = 'This Week', open = false" 
                                            class="block w-full h-8 px-4 py-2 text-[#151847] hover:bg-[#151847] text-xs hover:text-white rounded-md text-start uppercase">This Week</button>
                                        <button @click="activeFilter = 'Last 7 Days', open = false" 
                                            class="block w-full h-8 px-4 py-2 text-[#151847] hover:bg-[#151847] text-xs hover:text-white rounded-md text-start uppercase">Last 7 Days</button>
                                        <button @click="activeFilter = 'This Month', open = false" 
                                            class="block w-full h-8 px-4 py-2 text-[#151847] hover:bg-[#151847] text-xs hover:text-white rounded-md text-start uppercase">This Month</button>
                                        <button @click="activeFilter = 'Last Month', open = false" 
                                            class="block w-full h-8 px-4 py-2 text-[#151847] hover:bg-[#151847] text-xs hover:text-white rounded-md text-start uppercase">Last Month</button>
                                        <template x-if="isFirst">
                                            <button @click="isFirst=false" 
                                                class="block w-full h-8 px-4 py-2 text-[#151847] hover:bg-[#151847] text-xs hover:text-white rounded-md text-start uppercase">Custom Range</button>
                                        </template>
                                        <template x-if="!isFirst">
                                            <input @click="isFirst=true" 
                                                x-data x-init="flatpickr($el, { mode: 'range' })" type="text" 
                                                placeholder="Select date range"
                                                class=" rounded-md p-2 w-full h-7 text-xs text-[#151847]" />
                                        </template>
                                    </div>
                                </div>
                            </div>
                            <img src="{{ asset('full.png') }}" onclick="my_modal_Sales.showModal()" alt="full" class="size-5 hidden cursor-pointer group-hover:block flex justify-end duration-399 transform">
                                {{-- Full button --}}
                            <dialog id="my_modal_Sales" class="modal w-[60%] h-[70%] rounded-xl border border-[#151847] hide-scrollbar">
                                <div class="modal-box p-5 w-full h-full">
                                    <form method="dialog">
                                        <div class="flex flex-row gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                                <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm lg:text-2xl text-[#0f1019] font-extrabold uppercase">Sales</span>
                                        </div>
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-start text-sm lg:rounded-md">
                                        <div class="w-full h-[80%]flex justify-center items-start">
                                            <div x-show="activeFilter === 'Today'" x-cloak class="w-[60%] h-[80%] absolute">
                                                <x-analytics-display
                                                    title="Today"
                                                    :labels="['January', 'February', 'March', 'April', 'May']"
                                                    :data="[120, 150, 180, 90, 140]"
                                                    chartType="line"
                                                    :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                />
                                            </div>
                                            <div x-show="activeFilter === 'Yesterday'" x-cloak class="w-[60%] h-[80%] absolute">
                                                <x-analytics-display
                                                    title="Yesterday"
                                                    :labels="['January', 'February', 'March', 'April', 'May']"
                                                    :data="[120, 150, 180, 90, 140]"
                                                    chartType="line"
                                                    :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                />
                                            </div>
                                            <div x-show="activeFilter === 'This Week'" x-cloak class="w-[60%] h-[80%] absolute">
                                                <x-analytics-display
                                                    title="This Week"
                                                    :labels="['January', 'February', 'March', 'April', 'May']"
                                                    :data="[120, 150, 180, 90, 140]"
                                                    chartType="line"
                                                    :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                />
                                            </div>
                                            <div x-show="activeFilter === 'Last 7 Days'" x-cloak class="w-[60%] h-[80%] absolute">
                                                <x-analytics-display
                                                    title="Last 7 Days"
                                                    :labels="['January', 'February', 'March', 'April', 'May']"
                                                    :data="[120, 150, 180, 90, 140]"
                                                    chartType="line"
                                                    :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                />
                                            </div>
                                            <div x-show="activeFilter === 'This Month'" x-cloak class="w-[60%] h-[80%] absolute">
                                                <x-analytics-display
                                                    title="This Month"
                                                    :labels="['January', 'February', 'March', 'April', 'May']"
                                                    :data="[120, 150, 180, 90, 140]"
                                                    chartType="line"
                                                    :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                />
                                            </div>
                                            <div x-show="activeFilter === 'Last Month'" x-cloak class="w-[60%] h-[80%] absolute">
                                                <x-analytics-display
                                                    title="Last Month"
                                                    :labels="['January', 'February', 'March', 'April', 'May']"
                                                    :data="[120, 150, 180, 90, 140]"
                                                    chartType="line"
                                                    :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                />
                                            </div>
                                            <div x-show="activeFilter === 'Custom Range'" x-cloak class="w-[60%] h-[80%] absolute">
                                                <x-analytics-display
                                                    title="Custom Range"
                                                    :labels="['January', 'February', 'March', 'April', 'May']"
                                                    :data="[120, 150, 180, 90, 140]"
                                                    chartType="line"
                                                    :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                />
                                            </div>
                                        </div>
                                        <div class="flex flex-col w-full lg:w-[50%] h-[50%] lg:h-[80%]">
                                            <span class="text-base lg:text-xl font-bold">Title</span>
                                            <span class="text-sm lg:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                        </div>
                                    </div>
                                </div>
                            </dialog>   
                        </div>
                    </div>
                    <div class="relative justify-center w-full h-[80%] mt-2">
                        <div x-show="activeFilter === 'Today'" x-cloak class="h-full w-full absolute">
                            <x-analytics-display
                                title="Today"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 140]"
                                chartType="line"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                            />
                        </div>
                        <div x-show="activeFilter === 'Yesterday'" x-cloak class="h-full w-full absolute">
                            <x-analytics-display
                                title="Yesterday"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 140]"
                                chartType="line"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                            />
                        </div>
                        <div x-show="activeFilter === 'This Week'" x-cloak class="h-full w-full absolute">
                            <x-analytics-display
                                title="This Week"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 140]"
                                chartType="line"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                            />
                        </div>
                        <div x-show="activeFilter === 'Last 7 Days'" x-cloak class="h-full w-full absolute">
                            <x-analytics-display
                                title="Last 7 Days"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 140]"
                                chartType="line"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                            />
                        </div>
                        <div x-show="activeFilter === 'This Month'" x-cloak class="h-full w-full absolute">
                            <x-analytics-display
                                title="This Month"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 140]"
                                chartType="line"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                            />
                        </div>
                        <div x-show="activeFilter === 'Last Month'" x-cloak class="h-full w-full absolute">
                            <x-analytics-display
                                title="Last Month"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 140]"
                                chartType="line"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                            />
                        </div>
                        <div x-show="activeFilter === 'Custom Range'" x-cloak class="h-full w-full absolute">
                            <x-analytics-display
                                title="Custom Range"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 140]"
                                chartType="line"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Second Row --}}
        <div class="flex md:w-full md:justify-center">
            <div class="flex flex-col lg:flex-row h-[600px] lg:h-[300px] ml-5 lg:ml-0 w-[440px] lg:w-full mt-3 lg:-mt-3 gap-3 items-center justify-center">
                {{-- Top Performer Sale Reps --}}
                <div onclick="my_modal_SalesRep.showModal()" class="group cursor-pointer hover:scale-105  duration-300 transform flex flex-col w-full lg:w-[50%] h-[50%] lg:h-full bg-white shadow-md rounded-md">
                    <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                        <div class="flex flex-row w-[90%] h-[10%] justify-start items-center">
                            <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm lg:text-lg text-[#151847] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-[17px]">Top Performing Sales Representatives</span>
                            </div>
                            {{-- Full button --}}
                            <dialog id="my_modal_SalesRep" class="modal w-[70%] h-[70%] rounded-xl border border-[#151847]">
                                <div class="modal-box p-5 w-full h-full ">
                                    <form method="dialog">
                                        <div class="flex flex-row gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                                <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm lg:text-2xl text-[#151847] font-extrabold uppercase">Top Performing Sales Representatives</span>
                                        </div>
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                        <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full">
                                            <x-analytics-display
                                                title="Sales Representatives Performance"
                                                :labels="['Anne', 'Vhong', 'Jhong', 'Vice Ganda', 'Ryan']"
                                                :data="[120, 150, 180, 90, 150]"
                                                chartType="bar"
                                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                axis="y"
                                            />
                                        </div>
                                        <div class="flex flex-col w-full lg:w-[30%] h-[50%] lg:h-[80%]">
                                            <span class="text-base lg:text-xl font-bold">Title</span>
                                            <span class="text-sm lg:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center text-sm lg:rounded-md">
                            <x-analytics-display
                                title="Sales Reps Performance"
                                :labels="['Anne', 'Vhong', 'Jhong', 'Vice Ganda', 'Ryan']"
                                :data="[120, 150, 180, 90, 150]"
                                chartType="bar"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                axis="y"
                            />
                        </div>
                    </div>   
                </div>
                {{-- Target vs. Actual --}}
                <div class="group cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full lg:w-[50%] h-[50%] lg:h-full bg-white shadow-md rounded-md">
                    <div x-data="{activeChart: 'chart1'}" class="flex flex-col bg-white shadow-lg h-full w-full rounded-lg shadow-xs justify-center items-center gap-3">
                        <div class="flex flex-row h-[10%] w-[90%] items-center justify-between gap-2">
                            <div class="flex flex-row w-full h-full justify-start items-center gap-2">
                                <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                        <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-sm lg:text-lg text-[#151847] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-[17px]">Target vs. Actual</span>
                                </div>
                                <div class="flex hover:scale-105 duration-300 transform justify-end w-[40%] lg:w-[50%] h-full items-center">
                                    {{-- Buttons --}}
                                    <div class="flex flex-row w-full lg:w-[90%] h-full lg:h-[80%] border border-[#151847] rounded-md justify-between items-center px-0.5 py-0.5">
                                        <button @click="activeChart = 'chart1'" :class="activeChart === 'chart1' ? 'bg-[#151847] text-white' : 'text-[#151847]'" 
                                            class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] focus:text-white w-[33.3%] h-full text-center rounded-l-md hover:bg-[#151847] hover:text-white truncate">Revenue</button>
                                        <button @click="activeChart = 'chart2'" :class="activeChart === 'chart2' ? 'bg-[#151847] text-white' : 'text-[#151847]'"
                                            class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] focus:text-white w-[33.3%] h-full text-center hover:bg-[#151847] hover:text-white">Deals</button>
                                        <button @click="activeChart = 'chart3'" :class="activeChart === 'chart3' ? 'bg-[#151847] text-white' : 'text-[#151847]'"
                                            class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] focus:text-white w-[33.3%] h-full text-center rounded-r-md hover:bg-[#151847] hover:text-white truncate">New Customer</button>
                                    </div>
                                </div>
                                {{-- Full button --}}
                                <img src="{{ asset('full.png') }}" onclick="my_modal_TargetVsActual.showModal()" alt="full" class="size-5 hidden cursor-pointer group-hover:block flex-justify-end duration-399 transform">
                                <dialog id="my_modal_TargetVsActual" class="modal w-[70%] h-[70%] rounded-xl  border border-[#151847]">
                                    <div class="modal-box p-5 w-full h-full ">
                                        <form method="dialog">
                                            <div class="flex flex-row gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                                </svg>
                                                <span class="text-sm lg:text-2xl text-[#151847] font-extrabold uppercase">Target vs. Actual</span>
                                            </div>
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                        </form>
                                        <div class="flex flex-col lg:flex-row w-full h-[50%] lG:h-[80%] justify-center items-center text-sm lg:rounded-md">
                                            <div class="bg-yellow w-full h-full flex justify-center items-center">
                                                <div x-show="activeChart === 'chart1'" x-cloak class="h-[50%] w-full lg:h-[60%] lg:w-[60%] absolute">
                                                    <x-analytics-display
                                                            title="Revenue"
                                                            :labels="['Week 1', 'Week 2', 'Week 3', 'Week 4']"
                                                            :data="[120, 150, 180, 90]"
                                                            chartType="bar"
                                                            :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                    />
                                                </div>
                                                <div x-show="activeChart === 'chart2'" x-cloak class="h-[50%] w-full lg:h-[60%] lg:w-[60%] absolute">
                                                    <x-analytics-display
                                                            title="Deals"
                                                            :labels="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August']"
                                                            :data="[120, 150, 180, 90, 150, 180, 90, 130]"
                                                            chartType="bar"
                                                            :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                    />
                                                </div>
                                                <div x-show="activeChart === 'chart3'" x-cloak class="h-[50%] w-full lg:h-[60%] lg:w-[60%] absolute">
                                                    <x-analytics-display
                                                            title="New Customer"
                                                            :labels="['2020', '2021', '2022', '2023' , '2024' , '2025']"
                                                            :data="[120, 150, 180, 90, 150, 140]"
                                                            chartType="bar"
                                                            :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                    />
                                                </div>
                                            </div>
                                            <div class="flex flex-col w-full lg:w-[40%] h-[50%] lg:h-[80%]">
                                                <span class="text-base lg:text-xl font-bold">Title</span>
                                                <span class="text-sm lg:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                            </div>
                                        </div>
                                    </div>
                                </dialog>
                            </div>
                        </div>
                        <div class="flex h-[75%] w-[90%] relative">
                            <div x-show="activeChart === 'chart1'" x-cloak class="h-full w-full absolute">
                                <x-analytics-display
                                        title="Revenue"
                                        :labels="['Week 1', 'Week 2', 'Week 3', 'Week 4']"
                                        :data="[120, 150, 180, 90]"
                                        chartType="bar"
                                        :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                />
                            </div>
                            <div x-show="activeChart === 'chart2'" x-cloak class="h-full w-full absolute">
                                <x-analytics-display
                                        title="Deals"
                                        :labels="['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August']"
                                        :data="[120, 150, 180, 90, 150, 180, 90, 130]"
                                        chartType="bar"
                                        :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                />
                            </div>
                            <div x-show="activeChart === 'chart3'" x-cloak class="h-full w-full absolute">
                                <x-analytics-display
                                        title="New Customer"
                                        :labels="['2020', '2021', '2022', '2023' , '2024' , '2025']"
                                        :data="[120, 150, 180, 90, 150, 140]"
                                        chartType="bar"
                                        :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Third Row --}}
        <div class="flex md:w-full md:justify-center">
            <div class="flex flex-col lg:flex-row h-[900px] lg:h-[300px] ml-5 lg:ml-0 w-[440px] lg:w-full mt-3 lg:-mt-3 gap-3 items-center justify-center">
                {{-- Sales by Region --}}
                <div onclick="my_modal_Region.showModal()" class="cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full lg:w-[33.3%] h-[33.3%] lg:h-full bg-white shadow-md rounded-md">
                    <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                        <div class="flex flex-row w-[90%] h-[10%] justify-start items-center gap-2">
                            <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm lg:text-lg text-[#151847] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-lg">Sales by Region</span>
                            </div>
                            {{-- Full button --}}
                            <dialog id="my_modal_Region" class="modal w-[70%] h-[70%] rounded-xl border border-[#151847]">
                                <div class="modal-box p-5 w-full h-full ">
                                    <form method="dialog">
                                        <div class="flex flex-row gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                                <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm lg:text-2xl text-[#151847] font-extrabold uppercase">Sales by Region</span>
                                        </div>
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                        <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full">
                                            <x-analytics-display
                                                title="Sales By Region  "
                                                :labels="['NCR', 'CAR', 'Region I', 'Region II', 'Region III', 'Region IV-A', 'MIMAROPA', 'Region V', 'Region VI', 'Region VII', 'Region VIII', 'Region IX', 'Region X', 'Region XI', 'Region XII', 'CARAGA', 'BARMM']"
                                                :data="[120, 150, 180, 90, 150,120, 150, 180, 90, 150,120, 150, 180, 90, 150,90,80]"
                                                chartType="bar"
                                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                axis="y"
                                            />
                                        </div>
                                        <div class="flex flex-col w-full lg:w-[30%] h-[50%] lg:h-[80%]">
                                            <span class="text-base lg:text-xl font-bold">Title</span>
                                            <span class="text-sm lg:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center text-sm lg:rounded-md">
                            <x-analytics-display
                                title="Sales by Region"
                                :labels="['NCR', 'CAR', 'Region I', 'Region II', 'Region III', 'Region IV-A', 'MIMAROPA', 'Region V', 'Region VI', 'Region VII', 'Region VIII', 'Region IX', 'Region X', 'Region XI', 'Region XII', 'CARAGA', 'BARMM']"
                                :data="[120, 150, 180, 90, 150,120, 150, 180, 90, 150,120, 150, 180, 90, 150,90,80]"
                                chartType="bar"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                axis="y"
                            />
                        </div>
                    </div>   
                </div>
                {{-- Customer Segments   --}}
                <div  onclick="my_modal_CustomerSegment.showModal()" class="cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full lg:w-[33.3%] h-[33.3%] lg:h-full bg-white shadow-md rounded-md">
                    <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                        <div class="flex flex-row w-[90%] h-[10%] justify-start items-center gap-2">
                            <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm lg:text-lg text-[#151847] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-lg">Customer Segment</span>
                            </div>
                            {{-- Full button --}}
                            <dialog id="my_modal_CustomerSegment" class="modal w-[70%] h-[70%] rounded-xl border border-[#151847]">
                                <div class="modal-box p-5 w-full h-full ">
                                    <form method="dialog">
                                        <div class="flex flex-row gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                                <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm lg:text-2xl text-[#151847] font-extrabold uppercase">Customer Segment</span>
                                        </div>
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                        <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full">
                                            <x-analytics-display
                                                title="Customers Segment"
                                                :labels="['January', 'February', 'March', 'April', 'May']"
                                                :data="[120, 150, 180, 90, 150]"
                                                chartType="pie"
                                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                            />
                                        </div>
                                        <div class="flex flex-col w-full lg:w-[30%] h-[50%] lg:h-[80%]">
                                            <span class="text-base lg:text-xl font-bold">Title</span>
                                            <span class="text-sm lg:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center text-sm lg:rounded-md">
                            <x-analytics-display
                                title="Customers Segment"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 150]"
                                chartType="pie"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                            />
                        </div>
                    </div>   
                </div>
                {{-- Sales by Stage --}}
                <div onclick="my_modal_SalesStage.showModal()" class="cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full lg:w-[33.3%] h-[33.3%] lg:h-full bg-white shadow-md rounded-md">
                    <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                        <div class="flex flex-row w-[90%] h-[10%] justify-start items-center gap-2">
                            <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm lg:text-lg text-[#151847] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-lg">Sales by Stage</span>
                            </div>
                            {{-- Full button --}}
                            <dialog id="my_modal_SalesStage" class="modal w-[70%] h-[70%] rounded-xl border border-[#151847]">
                                <div class="modal-box p-5 w-full h-full ">
                                    <form method="dialog">
                                        <div class="flex flex-row gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                                <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm lg:text-2xl text-[#151847] font-extrabold uppercase">Sales by Stage</span>
                                        </div>
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                        <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full">
                                            <x-analytics-display
                                                title="Sales by Stage"
                                                :labels="['January', 'February', 'March', 'April', 'May']"
                                                :data="[120, 150, 180, 90, 150]"
                                                chartType="radar"
                                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                            />
                                        </div>
                                        <div class="flex flex-col w-full lg:w-[30%] h-[50%] lg:h-[80%]">
                                            <span class="text-base lg:text-xl font-bold">Title</span>
                                            <span class="text-sm lg:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center text-sm lg:rounded-md">
                            <x-analytics-display
                                title="Sales by Stage"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 150]"
                                chartType="radar"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                            />
                        </div>
                    </div>   
                </div>
            </div>
        </div>
        {{-- Fourth Row --}}
        <div class="flex md:w-full md:justify-center">
            <div class="flex flex-col lg:flex-row h-[600px] lg:h-[300px] ml-5 lg:ml-0 w-[440px] lg:w-full mt-3 lg:-mt-3 gap-3 items-center justify-center">
                {{-- Deals Status Breakdown --}}
                <div onclick="my_modal_DealStatus.showModal()" class="cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full lg:w-[40%] h-[50%] lg:h-full bg-white shadow-md rounded-md">
                    <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                        <div class="flex flex-row w-[90%] h-[10%] justify-start items-center gap-2">
                            <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm lg:text-lg text-[#151847] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-lg">Deals Status Breakdown</span>
                            </div>
                            {{-- Full button --}}
                            <dialog id="my_modal_DealStatus" class="modal w-[70%] h-[70%] rounded-xl border border-[#151847]">
                                <div class="modal-box p-5 w-full h-full ">
                                    <form method="dialog">
                                        <div class="flex flex-row gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                                <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm lg:text-2xl text-[#151847] font-extrabold uppercase">Deals Status Breakdown</span>
                                        </div>
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                        <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full">
                                            <x-analytics-display
                                                title="Deals Status Breakdown"
                                                :labels="['January', 'February', 'March', 'April', 'May']"
                                                :data="[120, 150, 180, 90, 150]"
                                                chartType="doughnut"
                                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                axis="y"
                                            />
                                        </div>
                                        <div class="flex flex-col w-full lg:w-[30%] h-[50%] lg:h-[80%]">
                                            <span class="text-base lg:text-xl font-bold">Title</span>
                                            <span class="text-sm lg:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center text-sm lg:rounded-md">
                            <x-analytics-display
                                title="Deals Status Breakdown"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 150]"
                                chartType="doughnut"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                axis="y"
                            />
                        </div>
                    </div>   
                </div>
                {{-- Sales by Product/Service --}}
                <div onclick="my_modal_ProductsService.showModal()" class="cursor-pointer hover:scale-105 duration-300 transform flex flex-col w-full lg:w-[60%] h-[50%] lg:h-full bg-white shadow-md rounded-md">
                    <div class="flex flex-col w-full h-full bg-white shadow-md rounded-md items-center justify-center">
                        <div class="flex flex-row w-[90%] h-[10%] justify-start items-center gap-2">
                            <div class="w-full h-full flex flex-row justify-start items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                    <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm lg:text-lg text-[#151847] font-extrabold uppercase group-hover:text-sm lg:group-hover:text-lg">Sales by Product/Service</span>
                            </div>
                            {{-- Full button --}}
                            <dialog id="my_modal_ProductsService" class="modal w-[70%] h-[70%] rounded-xl border border-[#151847]">
                                <div class="modal-box p-5 w-full h-full ">
                                    <form method="dialog">
                                        <div class="flex flex-row gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-[#151847]">
                                                <path fill-rule="evenodd" d="M15.22 6.268a.75.75 0 0 1 .968-.431l5.942 2.28a.75.75 0 0 1 .431.97l-2.28 5.94a.75.75 0 1 1-1.4-.537l1.63-4.251-1.086.484a11.2 11.2 0 0 0-5.45 5.173.75.75 0 0 1-1.199.19L9 12.312l-6.22 6.22a.75.75 0 0 1-1.06-1.061l6.75-6.75a.75.75 0 0 1 1.06 0l3.606 3.606a12.695 12.695 0 0 1 5.68-4.974l1.086-.483-4.251-1.632a.75.75 0 0 1-.432-.97Z" clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-sm lg:text-2xl text-[#151847] font-extrabold uppercase">Sales by Product/Service</span>
                                        </div>
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                    </form>
                                    <div class="flex flex-col lg:flex-row w-full h-[80%] justify-center items-center text-sm lg:rounded-md">
                                        <div class="bg-yellow w-full lg:w-[70%] h-[50%] lg:h-full">
                                            <x-analytics-display
                                                title="Sales by Product/Service"
                                                :labels="['January', 'February', 'March', 'April', 'May']"
                                                :data="[120, 150, 180, 90, 150]"
                                                chartType="bar"
                                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                                axis="x"
                                            />
                                        </div>
                                        <div class="flex flex-col w-full lg:w-[30%] h-[50%] lg:h-[80%]">
                                            <span class="text-base lg:text-xl font-bold">Title</span>
                                            <span class="text-sm lg:text-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta sequi deserunt distinctio! Molestiae voluptatem est veniam, obcaecati quaerat recusandae dolorem! Recusandae eveniet dolor laboriosam voluptatibus impedit quo voluptate nisi minus!</span>
                                        </div>
                                    </div>
                                </div>
                            </dialog>
                        </div>
                        <div class="flex flex-row w-[90%] h-[75%] justify-center items-center text-sm lg:rounded-md">
                            <x-analytics-display
                                title="Sales by Product/Service"
                                :labels="['January', 'February', 'March', 'April', 'May']"
                                :data="[120, 150, 180, 90, 150]"
                                chartType="bar"
                                :color="['#151847', '#565CC5', '#030525', '#101674', '#171E92', '#2733E7', '#010BAF', '#383E94']"
                                axis="x"
                            />
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
        {{-- <script>
            document.addEventListener('DOMContentLoaded', function () {
                const toggle = document.getElementById('filter');
                const content = document.getElementById('filterContent');
                const icon = document.getElementById('filterArrow')

                toggle.addEventListener('click', (e) => {
                    e.preventDefault(); // prevent navigation
                    content.classList.toggle('hidden');

                    rotated = !rotated;
                    icon.classList.toggle('rotate-180', rotated);
                    icon.classList.toggle('rotate-0', !rotated);
                });

                document.addEventListener('click', (e) => {
                    if (!toggle.contains(e.target) && !content.contains(e.target)) {
                    content.classList.add('hidden');

                    rotated = false;
                    icon.classList.toggle('rotate-180', rotated);
                    icon.classList.toggle('rotate-0', !rotated);
                    }
                });
            });

            
        </script> --}}
</x-app-layout>