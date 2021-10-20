<?php

namespace App\Http\Livewire\Admin\Account;

use App\Models\Account;
use Livewire\Component;

class ModalDelete extends Component
{
    public $accountId;

    protected $listeners = ['evenConfirm'];

    public function render()
    {
        return view('livewire.admin.account.modal-delete');
    }

    public function evenConfirm($accountId)
    {
        $this->accountId = $accountId;
    }

    public function delete()
    {
        $account = Account::find($this->accountId);

        $account->delete();

        $this->emitTo('admin.account.index', '$refresh');
        $this->emit('modalClose', '#modal-delete');
    }
}
