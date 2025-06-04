{{-- Filter dropdown --}}


<div class="flex items-center space-x-2">
    <label for="birthday_filter" class="text-[#151848] text-sm">Filter:</label>
    <select name="birthday_filter" id="birthday_filter"
            class="text-[#151848] font-bold border-none bg-gray-100 text-sm cursor-pointer"
            wire:model="birthday_filter"
            wire:change="changeBirthdayFilter">
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
    </select>
</div>
