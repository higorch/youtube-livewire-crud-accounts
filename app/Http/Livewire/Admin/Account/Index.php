<?php

namespace App\Http\Livewire\Admin\Account;

use App\Models\Account;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $account;

    protected $listeners = ['$refresh'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.account.index', [
            'accounts' => Account::paginate(2),
        ]);
    }
}
