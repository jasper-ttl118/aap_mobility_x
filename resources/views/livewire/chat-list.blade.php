<div x-data="{ show: false }">
    <div class="flex w-[250px] h-[300px] border-2 border-[#605E5E] bg-base-100 mr-2">
            {{-- w-[250px] h-[300px] --}}
        <div class="body w-full" x-on:click.outside="show=false">
            <div class="border-b-2 border-[#605E5E] p-1 pl-2">
                <h2 class="card-title">Chat List</h2>
            </div>

            @foreach ($employees as $employee)
                <a @click="
                    employee_id = {{ $employee->employee_id }};
                    active_chat = 'chat_message';
                    display = 'true';
                    window.Livewire.dispatch('openChatModal', { employee_id: employee_id });
                    console.log(employee_id);
                "  class="cursor-pointer">
                    <div class="flex flex-row border-b-2 border-[#605E5E] justify-between p-2">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2">
                                <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                            </svg>
                            <p>{{ $employee->employee_firstname }} {{ $employee->employee_lastname }}</p>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0 1 12 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 0 1-3.476.383.39.39 0 0 0-.297.17l-2.755 4.133a.75.75 0 0 1-1.248 0l-2.755-4.133a.39.39 0 0 0-.297-.17 48.9 48.9 0 0 1-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97ZM6.75 8.25a.75.75 0 0 1 .75-.75h9a.75.75 0 0 1 0 1.5h-9a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5H12a.75.75 0 0 0 0-1.5H7.5Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </a>
            @endforeach
        </div>
        
    </div>
</div>
