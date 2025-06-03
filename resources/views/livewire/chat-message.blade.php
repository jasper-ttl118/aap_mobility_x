<div class="flex w-[250px] h-[300px] card card-border border-2 border-[#605E5E] bg-base-100 mr-2">
  <div class="card-body w-full flex flex-col">
    <div class="flex border-b-2 border-[#605E5E] p-1 pl-2 justify-between">
        <div class="flex">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2">
              <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
            </svg>

            @if ($employee)
              <h2 class="card-title ">{{ $employee->employee_firstname }} {{ $employee->employee_middlename }} {{ $employee->employee_lastname }}</h2>
            @else
              <h2 class="card-title ">Loading...</h2>
            @endif 
        </div>

      <a class="mr-2 cursor-pointer">X</a>
    </div>  

    <div class="h-full overflow-y-auto hide-scrollbar ">
        {{-- <div class="w-full p-2 flex min-w-0">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2 flex-shrink-0">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
          </svg>

          <p class="border-2 rounded-xl p-2 text-sm bg-[#605E5E] text-white max-w-[160px] break-words min-w-0">
            I miss you po ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
          </p>
        </div>

        <div class="w-full p-2 flex min-w-0">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 mr-2 flex-shrink-0">
            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
          </svg>

          <p class="border-2 rounded-xl p-2 text-sm bg-[#605E5E] text-white max-w-[160px] break-words min-w-0">
            I miss you po ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss
          </p>
        </div> --}}
        @foreach ($messages as $message)
          <div class="w-full p-2 flex min-w-0 justify-end">
            <p class="border-2 rounded-xl p-2 text-sm bg-[#151847] text-white max-w-[160px] break-words min-w-0">
                  {{ $message }}
            </p>
          </div>
        @endforeach
    </div>

    <div class="flex-grow"></div>

    <div class="flex flex-row card-actions justify-end items-center w-full border-t-2 border-[#605E5E] py-2">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-9 mr-1 ml-2">
        <path d="M8.25 4.5a3.75 3.75 0 1 1 7.5 0v8.25a3.75 3.75 0 1 1-7.5 0V4.5Z" />
        <path d="M6 10.5a.75.75 0 0 1 .75.75v1.5a5.25 5.25 0 1 0 10.5 0v-1.5a.75.75 0 0 1 1.5 0v1.5a6.751 6.751 0 0 1-6 6.709v2.291h3a.75.75 0 0 1 0 1.5h-7.5a.75.75 0 0 1 0-1.5h3v-2.291a6.751 6.751 0 0 1-6-6.709v-1.5A.75.75 0 0 1 6 10.5Z" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-9 mr-2">
        <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
      </svg>

      <svg xmlns="http://www.w3.org/2000/svg" class="size-7 mr-2" fill="currentColor" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 414 512.01">
        <path d="M35.95 0h213.36v146.7c0 5.51 4.47 9.98 9.98 9.98H414v319.39c0 9.83-4.04 18.81-10.55 25.34l-.08.08c-6.53 6.49-15.49 10.52-25.31 10.52H35.95c-9.9 0-18.89-4.04-25.4-10.55C4.04 494.95 0 485.96 0 476.07V35.94c0-9.89 4.04-18.88 10.55-25.39C17.06 4.04 26.05 0 35.95 0zm233.33 2.23a13.2 13.2 0 012.49 2.17l136.55 132.31H269.28V2.23zM91.31 419.73c-5.52 0-9.99-4.47-9.99-9.98 0-5.51 4.47-9.99 9.99-9.99h231.38c5.52 0 9.99 4.48 9.99 9.99s-4.47 9.98-9.99 9.98H91.31zm0-76.35c-5.52 0-9.99-4.47-9.99-9.98 0-5.52 4.47-9.99 9.99-9.99h227.78c5.52 0 9.99 4.47 9.99 9.99 0 5.51-4.47 9.98-9.99 9.98H91.31zm0-76.35c-5.52 0-9.99-4.47-9.99-9.99 0-5.51 4.47-9.98 9.99-9.98h184.31c5.51 0 9.99 4.47 9.99 9.98 0 5.52-4.48 9.99-9.99 9.99H91.31zm0-76.36c-5.52 0-9.99-4.47-9.99-9.98 0-5.52 4.47-9.99 9.99-9.99h102.9c5.52 0 9.99 4.47 9.99 9.99 0 5.51-4.47 9.98-9.99 9.98H91.31zm0-76.35c-5.52 0-9.99-4.47-9.99-9.99 0-5.51 4.47-9.98 9.99-9.98h55.41c5.52 0 9.99 4.47 9.99 9.98 0 5.52-4.47 9.99-9.99 9.99H91.31z"/>
      </svg>

      <input type="text" class="input input-bordered w-full mr-2 rounded-2xl text-sm" placeholder="Type a message" wire:model="message"/>
      <a wire:click.throttle.500ms="sendMessage">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 mr-2">
          <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
        </svg>
      </a>
    </div>
  </div>
</div>
