{{-- Filter dropdown --}}
<div class="flex justify-end items-center">
    <label for="" class="m-1 text-[#5556AB] text-sm">Filter:</label>
    <select name="" id="" class="m-1 text-[#5556AB] font-bold border-none pl-1 bg-gray-100 text-sm cursor-pointer" wire:model="birthday_filter"  wire:change="changeBirthdayFilter">>
        {{-- <option value="Today" class="text-[#5556AB] font-bold text-sm">Today</option>
        <option value="This Week" class="text-[#5556AB] font-bold text-sm">This Week</option>
        <option value="This Month" class="text-[#5556AB] font-bold text-sm">This Month</option> --}}
        <option value="1" class="text-[#5556AB] font-bold text-sm">January</option>
        <option value="2" class="text-[#5556AB] font-bold text-sm">February</option>
        <option value="3" class="text-[#5556AB] font-bold text-sm">March</option>
        <option value="4" class="text-[#5556AB] font-bold text-sm">April</option>
        <option value="5" class="text-[#5556AB] font-bold text-sm">May</option>
        <option value="6" class="text-[#5556AB] font-bold text-sm">June</option>
        <option value="7" class="text-[#5556AB] font-bold text-sm">July</option>
        <option value="8" class="text-[#5556AB] font-bold text-sm">August</option>
        <option value="9" class="text-[#5556AB] font-bold text-sm">September</option>
        <option value="10" class="text-[#5556AB] font-bold text-sm">October</option>
        <option value="11" class="text-[#5556AB] font-bold text-sm">November</option>  
        <option value="12" class="text-[#5556AB] font-bold text-sm">December</option>
    </select>
</div>