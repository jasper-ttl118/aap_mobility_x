<!-- Modal overlay -->
<div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
  <!-- Modal content -->
  <div @click.outside="open=false" 
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="relative flex flex-col bg-white rounded-b-lg rounded-t-xl shadow-lg w-[50%] max-w-4xl pb-6 gap-y-4">

    <div class="flex justify-between rounded-t-lg p-3 px-5 items-center bg-[#494949]">
        <h1 class="text-white text-sm">New Message</h1>
        <button @click="open=false" class="text-white hover:text-gray-800 text-xl font-bold">&times;</button>
    </div>

    <div class="flex justify-center">
        <div class="flex w-[96%] h-10 items-center">
            <span class="h-full p-2 text-gray-400 text-sm border-b-2 border-gray-400">To:</span>
            <input type="text" class="h-full w-full border-0 border-b-2 p-2 pt-1 border-gray-400">
       </div>
    </div>

    <div class="flex justify-center">
        <div class="flex w-[96%] h-10 items-center">
            <span class="h-full p-2 text-gray-400 text-sm border-b-2 border-gray-400">Subject:</span>
            <input type="text" class="h-full w-full border-0 border-b-2 p-2 pt-1 border-gray-400">
       </div>
    </div>

    <div class="flex justify-center">
        <div class="flex w-[96%] h-10 items-center">
            <span class="h-10 w-40 flex items-center pl-2 text-gray-400 text-sm border-b-2 border-gray-400 leading-none">
                 Schedule Date:
            </span>
            <input
                type="date"
                class="-ml-[30px] h-full w-full border-0 border-b-2 pt-1 border-gray-400"
            />
        </div>
    </div>

    <div class="flex flex-row w-full h-full justify-evenly px-4 gap-4">
        <div class="flex justify-center items-center  w-[70%] h-[272px]">
            <!-- Left form section -->
            <form class=" w-full h-[252px] bg-[#EAE8E8] p-4 rounded-lg  flex flex-col justify-between ">
                <label for="message" class="block mb-2 text-md font-bold text-[#151848]">Message</label>
                <textarea id="message" rows="4" class="overflow-auto hide-scrollbar resize-none h-[200px] block p-4 w-full text-sm text-gray-900 border-0 bg-gray-100 rounded-lg dark:bg-gray-300 dark:placeholder-gray-600" placeholder="Enter Your Message...">
                </textarea>
            </form>
        </div>
        <div class="flex flex-col w-[30%] h-full justify-evenly items-center gap-3">
            <!-- Right variable section -->
            <div class="flex flex-col w-full h-[200px] p-4 gap-4 bg-[#EAE8E8] rounded-lg">
                <p class="font-semibold text-[#151848]">Add Variable:</p>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="inline-flex items-center rounded-2xl bg-gray-300 px-2 text-xs font-medium text-[#151848] ring-1 ring-gray-500/10 ring-inset text-center h-5">Customer Name</a>
                    <a href="#" class="inline-flex items-center rounded-2xl bg-gray-300 px-2 text-xs font-medium text-[#151848] ring-1 ring-gray-500/10 ring-inset text-center h-5">Birthdate</a>
                    <a href="#" class="inline-flex items-center rounded-2xl bg-gray-300 px-2 text-xs font-medium text-[#151848] ring-1 ring-gray-500/10 ring-inset text-center h-5">Coupon</a>
                    <a href="#" class="inline-flex items-center rounded-2xl bg-gray-300 px-2 text-xs font-medium text-[#151848] ring-1 ring-gray-500/10 ring-inset text-center h-5">Validity Date</a>
                    <a href="#" class="inline-flex items-center rounded-2xl bg-gray-300 px-2 text-xs font-medium text-[#151848] ring-1 ring-gray-500/10 ring-inset text-center h-5">+</a>
                </div>
            </div>
        
            <div class="flex justify-end w-full gap-x-4">
                <button type="submit" class="border-2 bg-[#151848] p-2 rounded-lg text-white w-[50%] font-semibold">
                    Send
                </button>
                <button @click="open=false" class="border-2 bg-[#605E5E] p-2 rounded-lg text-white w-[50%] font-semibold">
                    Cancel  
                </button>
            </div>
        </div>
    </div>

  </div>
</div>