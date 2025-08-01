<?php

namespace App\Livewire\Ams\Asset;

use Livewire\Component;
use App\Models\Asset;

class TransferForm extends Component
{
    public $assetId;
    public $asset;

    public function render()
    {
        $this->asset = Asset::with(['category', 'employee', 'department', 'brand'])
            ->findOrFail($this->assetId);

        return view('livewire.ams.asset.transfer-form',['categories' => \App\Models\AssetCategory::all(),
            'conditions' => \App\Models\AssetCondition::all(),
            'statuses' => \App\Models\AssetStatus::all(),
            'brands' => \App\Models\Brand::all(),
            'departments' => \App\Models\Department::all(),
            'employees' => \App\Models\Employee::all(),]);
    }
}
