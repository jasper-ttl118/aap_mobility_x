<?php

namespace App\Livewire\Ams\Asset;

use App\Models\Asset;
use Livewire\Component;

class TransferList extends Component
{
    public $showAssetModal = false;
    public $availableAssets = [];
    public $assigneeName = '';
    protected $listeners = ['open-transfer-list' => 'open'];

    public function open($id)
    {
        $asset = Asset::select(['asset_id', 'asset_type', 'department_id', 'employee_id'])
            ->findOrFail($id);

        $q = Asset::with(['status', 'brand', 'department', 'employee'])
            ->where('ams_active', 1)
            ->where('asset_id', '!=', $asset->asset_id);

        if ((int) $asset->asset_type === 1 && $asset->department_id) {
            $q->where('asset_type', 1)->where('department_id', $asset->department_id);
            $this->assigneeName = strtoupper($asset->department->department_name);
        } elseif ((int) $asset->asset_type === 2 && $asset->employee_id) {
            $q->where('asset_type', 2)->where('employee_id', $asset->employee_id);
            $this->assigneeName = strtoupper($asset->employee->employee_lastname) . ', ' . strtoupper($asset->employee->employee_firstname);
        }

        $this->availableAssets = $q->orderBy('asset_name')->get();
        $this->showAssetModal = true;
    }

    public function render()
    {
        return view('livewire.ams.asset.transfer-list');
    }
}
