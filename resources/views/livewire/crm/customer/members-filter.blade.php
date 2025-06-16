<div class="flex justify-center items-center mt-5 space-x-2">
    <label for="member_filter" class="text-[#071d49] text-sm">Filter:</label>
    <select name="member_filter" id="member_filter"
            class="text-[#071d49] font-bold border-none bg-gray-100 text-sm cursor-pointer"
            wire:model="member_filter"
            wire:change="changeMemberFilter">
        <option value="1">Active Members</option>
        <option value="0">Inactive Members</option>
    </select>
</div>
