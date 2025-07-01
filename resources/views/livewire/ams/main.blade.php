<div x-data="{ viewMode: @entangle('viewMode').live }" class="flex flex-col lg:ml-52 mt-12 overflow-y-auto p-10 gap-7 bg-[#f3f4f6]">
    {{-- Navigation Bar --}}
    @if ($viewMode !== 'create')
        <livewire:ams.navigation-bar :tab="$tab" />
    @endif
    
    @if ($tab === 'dashboard')
        <livewire:ams.dashboard.dashboard-page />
    @elseif ($tab === 'assets')
        <livewire:ams.asset.asset-page />
    @elseif ($tab === 'employees')
        <livewire:ams.employee.employee-page />
    @endif
</div>
