<div class="rounded-md border-2 border-gray-100 bg-white shadow-lg">
    <div class="flex h-14 border-b border-gray-200">

        <button wire:click="setTab('dashboard')"
             class="w-32 p-4 text-center border-b-2 cursor-pointer
             {{ $tab === 'dashboard' ? 'border-blue-900' : 'border-transparent' }}">
            <span class="{{ $tab === 'dashboard'
                ? 'font-semibold text-blue-900'
                : 'text-gray-600 hover:text-blue-800 font-inter' }}">
                Dashboard
            </span>
        </button>

        <button wire:click="setTab('assets')"
             class="w-32 p-4 text-center border-b-2 cursor-pointer
             {{ $tab === 'assets' ? 'border-blue-900' : 'border-transparent' }}">
            <span class="{{ $tab === 'assets'
                ? 'font-semibold text-blue-900'
                : 'text-gray-600 hover:text-blue-800 font-inter' }}">
                Assets
            </span>
        </button>

        <button wire:click="setTab('employees')"
             class="w-32 p-4 text-center border-b-2 cursor-pointer
             {{ $tab === 'employees' ? 'border-blue-900' : 'border-transparent' }}">
            <span class="{{ $tab === 'employees'
                ? 'font-semibold text-blue-900'
                : 'text-gray-600 hover:text-blue-800 font-inter' }}">
                Employees
            </span>
        </button>

    </div>
</div>

