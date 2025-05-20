{{-- Filter dropdown --}}
<div class="flex justify-end items-center">
    <label for="" class="m-1 text-[#5556AB] text-sm">Filter:</label>
    <select name="" id="" class="m-1 text-[#5556AB] font-bold border-none pl-1 bg-gray-100 text-sm cursor-pointer" wire:model="birthday_filter"  wire:change="changeBirthdayFilter">>
        <option value="Today" class="text-[#5556AB] font-bold text-sm">Today</option>
        <option value="This Week" class="text-[#5556AB] font-bold text-sm">This Week</option>
        <option value="This Month" class="text-[#5556AB] font-bold text-sm">This Month</option>
    </select>
</div>