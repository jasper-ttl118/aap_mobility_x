@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-[#dedede] border-l-0 focus:border-[#dedede] focus:ring-[#dedede] rounded-md shadow-lg w-[62%] -ml-3']) }}>
