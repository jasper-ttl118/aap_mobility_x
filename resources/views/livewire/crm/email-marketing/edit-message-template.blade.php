<div x-data="{ show:false }"> 
    <!-- Modal overlay -->
    <div x-show="view_edit" class="fixed inset-0 flex items-center justify-center"         
        x-transition>
    <!-- Modal content -->
        <div @click.outside="view_edit=false" 

            class="relative flex flex-col bg-white rounded-b-lg rounded-t-xl shadow-lg w-[80%] max-w-4xl pb-6 gap-y-4">

            <div class="flex justify-between rounded-t-lg p-3 px-5 items-center bg-[#494949]">
                <h1 class="text-white text-sm">New Message Template</h1>
                <button @click="view_edit=false" class="text-white hover:text-gray-800 text-xl font-bold">&times;</button>
            </div>

            <div class="flex justify-center">
                <div class="flex w-[96%] h-10 items-center">
                    <span class="h-full p-2 text-gray-400 text-sm border-b-2 border-gray-400">To:</span>
                    <input type="text" class="h-full w-full border-0 border-b-2 p-2 pt-1 border-gray-400 text-gray-900" value="Everyone">
                </div>
            </div>

            <div class="flex justify-center">
                <div class="flex w-[96%] h-10 items-center">
                    <span class="h-full p-2 text-gray-400 text-sm border-b-2 border-gray-400">Subject:</span>
                    <input type="text" class="h-full w-full border-0 border-b-2 p-2 pt-1 border-gray-400 text-gray-900" value="Message Template 1">
            </div>
            </div>

            <div class="flex flex-row w-full h-full justify-evenly px-4 gap-4">
                <div class="flex justify-center items-center  w-[70%] h-[272px]">
                    <!-- Left form section -->
                    <div class=" w-full h-[252px] bg-[#EAE8E8] p-4 rounded-lg  flex flex-col justify-between ">
                        <label for="message" class="block mb-2 text-md font-bold text-[#151848]">Message</label>
                        <textarea id="message" rows="4" class="overflow-auto hide-scrollbar resize-none h-[200px] block p-4 w-full text-sm text-gray-900 border-0 bg-gray-100 rounded-lg dark:bg-gray-300 dark:placeholder-gray-600" placeholder="Enter Your Message...">💥 A Special Surprise Just for You, [Customer Name]! 💥

        We couldn’t keep this deal a secret—enjoy 15% off your next purchase as a thank-you for being part of our community! 🙌
        Use code [Coupon Code] at checkout. This exclusive offer is valid until [Validity Date], so don’t miss out!

        Happy shopping! 🛍️
                        </textarea>
                    </div>
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
                        <button wire:click="save" @click="toast=true, view_edit=false"  class="border-2 bg-[#151848] p-2 rounded-lg text-white w-[50%] font-semibold">
                            Save
                        </button>
                        <button @click="view_edit=false" class="border-2 bg-[#605E5E] p-2 rounded-lg text-white w-[50%] font-semibold">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>
