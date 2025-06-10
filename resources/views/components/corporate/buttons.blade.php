<div class="flex flex-row w-full lg:w-[50%] h-full lg:h-[80%] border border-[#151847] rounded-md justify-between items-center px-0.5 py-0.5">
    {{-- <a href="{{ route('corporate') }}" 
        class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] flex items-center justify-center focus:text-white w-[50%] h-full rounded-l-md hover:bg-[#151847] hover:text-white
        {{ request()->routeIs('corporate') ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white' }}">
            Resellers
    </a>
    <a href="{{ route('agent') }}"
        class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] flex items-center justify-center focus:text-white w-[50%] h-full rounded-r-md hover:bg-[#151847] hover:text-white
        {{ request()->routeIs('agent') ? 'bg-[#151847] text-white' : 'text-[#151847] hover:bg-[#151847] hover:text-white' }}">
            Agents
    </a> --}}
    <button @click="corporate = 'reseller'" :class="corporate === 'reseller' ? 'bg-[#151847] text-white' : 'text-[#151847]'" 
                                class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] focus:text-white w-[50%] h-full text-center rounded-l-md hover:bg-[#151847] hover:text-white">Resellers</button>
    <button @click="corporate = 'agent'" :class="corporate === 'agent' ? 'bg-[#151847] text-white' : 'text-[#151847]'" 
                                class="text-xs uppercase text-[#151847] font-semibold focus:bg-[#151847] focus:text-white w-[50%] h-full text-center rounded-r-md hover:bg-[#151847] hover:text-white">Agents</button>
</div>