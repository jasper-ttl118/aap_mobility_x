<div class="flex justify-between">
    <div class="flex gap-x-4 ">
        <a href=" {{route('email-marketing')}} " class="border-2 p-1.5 px-4 py-2 bg-[#151848] text-white text-sm text-center rounded-lg font-inter font-medium">Celebrant List</a>
        <a href="{{ route('message-template') }}" class="border-2 p-1.5 px-4 py-2 bg-[#151848] text-white text-sm text-center rounded-lg font-inter font-medium">Message Templates</a>
        <a href="{{ route('message-list') }}" class="border-2 p-1.5 px-4 py-2 bg-[#151848] text-white text-sm text-center rounded-lg font-inter font-medium">Message List</a>
    </div>

    <div class="flex gap-x-4">
        <a href="{{ route('compose-email') }}" class="border-2 p-1.5 px-4 py-2 bg-[#F6D400] text-[#151848] text-sm text-center rounded-lg font-inter font-medium">Send To All Via Email</a>
        <a href="{{ route('compose-mobile') }}" class="border-2 p-1.5 px-4 py-2 bg-[#F6D400] text-[#151848] text-sm text-center rounded-lg font-inter font-medium">Send To All Via Mobile No.</a>
    </div>
</div>
