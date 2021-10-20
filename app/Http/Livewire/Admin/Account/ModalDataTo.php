<?php

namespace App\Http\Livewire\Admin\Account;

use App\Models\Account;
use Livewire\Component;

class ModalDataTo extends Component
{
    public $accountId;
    public $name;
    public $email;
    public $cell_phone;
    public $status;
    public $type;

    public $action;

    protected $listeners = ['eventAction'];

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'cell_phone' => 'required',
        'status' => 'required',
        'type' => 'required',
    ];

    protected $messages = [
        'name.required' => 'Obrigatório informar o nome',
        'email.required' => 'Obrigatório informar o e-mail',
        'email.email' => 'E-mail inválido',
        'cell_phone.required' => 'Obrigatório informar o celular',
        'status.required' => 'Obrigatório informar o status',
        'type.required' => 'Obrigatório informar o type',
    ];

    public function render()
    {
        return view('livewire.admin.account.modal-data-to');
    }

    public function eventAction($action, $account_id = '')
    {
        $this->reset();

        $this->action = $action;

        if ($account_id) {
            $this->edit($account_id);
        }
    }

    public function submit()
    {
        $this->validate();

        $this->createOrUpdate();
    }

    private function createOrUpdate()
    {
        Account::updateOrCreate([
            'id' => $this->accountId,
        ], [
            'name' => $this->name,
            'email' => $this->email,
            'cell_phone' => $this->cell_phone,
            'status' => $this->status,
            'type' => $this->type,
        ]);

        $this->emitTo('admin.account.index', '$refresh');
        $this->emit('modalClose', '#modal-data-to');
    }

    private function edit($account_id)
    {
        $account = Account::find($account_id);

        $this->accountId = $account->id;
        $this->name = $account->name;
        $this->email = $account->email;
        $this->cell_phone = $account->cell_phone;
        $this->status = $account->status;
        $this->type = $account->type;
    }
}
