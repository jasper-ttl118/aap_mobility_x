{{-- Filter dropdown --}}
<div class="flex justify-end mb-1 items-center">
    <label for="" class="m-1 text-[#5556AB]">Filter:</label>
    <select name="" id="" class="m-1 text-[#5556AB] font-bold border-none pl-1" wire:model="birthday_filter"  wire:change="changeBirthdayFilter">>
        <option value="Today" class="text-[#5556AB] font-bold">Today</option>
        <option value="This Week" class="text-[#5556AB] font-bold">This Week</option>
        <option value="This Month" class="text-[#5556AB] font-bold">This Month</option>
    </select>
</div>