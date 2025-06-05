<div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">

  <div @click.outside="open=false" 
       x-transition:leave="transition ease-in duration-200"
       x-transition:leave-start="opacity-100 scale-100"
       x-transition:leave-end="opacity-0 scale-90"
       class="relative flex flex-col bg-white rounded-b-lg rounded-t-xl shadow-lg w-[80%] max-w-xl gap-y-4 pb-4">

    {{ $slot }}

    <div class="flex justify-center">
      <div class="flex w-full max-w-[96%] h-10 items-center">
        <span class="h-full p-2 text-gray-400 text-sm border-b-2 border-gray-400">To:</span>
        <input type="text" class="h-full w-full border-0 border-b-2 p-2 pt-1 border-gray-400" value="Everyone" readonly>
      </div>
    </div>

    <div class="flex justify-center">
      <div class="flex w-full max-w-[96%] h-10 items-center">
        <span class="h-full p-2 text-gray-400 text-sm border-b-2 border-gray-400">Subject:</span>
        <input type="text" class="h-full w-full border-0 border-b-2 p-2 pt-1 border-gray-400" value="Message Title" readonly>
      </div>
    </div>

    <div x-data="{ today: (new Date()).toISOString().split('T')[0] }" class="flex justify-center">
      <div class="flex w-full max-w-[96%] h-10 items-center">
        <span class="h-10 w-40 flex items-center pl-2 text-gray-400 text-sm border-b-2 border-gray-400 leading-none">
          Scheduled Date:
        </span>
        <input
          type="date"
          class="-ml-[20px] h-full w-full border-0 border-b-2 pt-1 border-gray-400"
          :value="today"
        />
      </div>
    </div>

    <div class="flex w-full px-3">
      <div class="flex-1 h-[260px]">
        <form class="w-full h-full bg-[#EAE8E8] p-4 rounded-lg flex flex-col">
          <label for="message" class="block mb-2 text-md font-bold text-[#151848]">Message</label>
          <textarea
            id="message"
            rows="4"
            class="resize-none flex-1 overflow-auto hide-scrollbar block p-4 w-full text-sm text-gray-900 border-0 bg-gray-100 rounded-lg dark:bg-gray-300 dark:placeholder-gray-600"
            placeholder="Enter Your Message..." readonly>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus eaque debitis cumque provident. Voluptate animi voluptatum sed quos officiis? A vitae ea autem facere magni consequatur officiis eos, quia error.
          </textarea>
        </form>
      </div>
    </div>

    <div class="flex w-full justify-end gap-x-4 px-4">
      <button @click="open=false" class="border-2 bg-[#605E5E] p-2 rounded-lg text-white w-[25%] font-semibold">
        Close  
      </button>
    </div>

  </div>
</div>
