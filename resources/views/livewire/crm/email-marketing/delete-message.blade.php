<!-- Modal overlay -->
<div class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
  <!-- Modal content -->
  <div @click.outside="display_delete=false" 
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="relative flex flex-col bg-white rounded-b-lg rounded-t-xl shadow-lg w-[80%] h-[50%] max-w-lg pb-6 gap-y-4 p-2 pr-3">

        <div class="flex justify-end">
            <button @click="display_delete=false" class="w-5 h-5 text-white flex items-center justify-center text-xs border-2 border-[#605E5E] rounded-full bg-[#605E5E]">
                X
            </button>
        </div>

        <div class="w-full flex flex-col items-center justify-center gap-y-4">
            <div class="p-4 text-[#E54E4F] bg-[#e8e4e4] rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-14">
                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                </svg>
            </div>
            <span class="text-xl font-semibold text-[#151847]">Delete</span>
            <span class="text-lg text-[#151847]">Would you like to delete this message?</span>
            <div class="flex gap-x-6">
                <button wire:click="delete" @click="display_delete=false" class="bg-[#151847] rounded-lg p-2 w-40 text-white font-semibold">Confirm</button>
                <button @click="display_delete=false" class="bg-[#605E5E] rounded-lg p-2 text-white w-40 font-semibold">Cancel</button>
            </div>
        </div>

  </div>
</div>