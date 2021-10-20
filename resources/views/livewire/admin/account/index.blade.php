<div>
   
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Contas</h3>
            <div>
                <a href="#" class="btn btn-dark" data-toggle="modal" data-target="#modal-data-to" wire:click="$emit('eventAction', 'store')">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="card-body">

            @if ($accounts->isEmpty())
                <div class="alert alert-secondary text-center mb-0" role="alert">
                    Nenhuma conta, <a href="#">cadastrar.</a>
                </div>
            @else
            <table class="table table-striped table-hover">
                <tr class="table-secondary">
                    <th class="text-center" width="80px"></th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Celuar</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Status</th>
                </tr>
                
                @foreach ($accounts as $account)
                <tr>
                    <td class="text-center">
                        <div class="dropdown">
                            <a class="btn" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-data-to" wire:click="$emit('eventAction', 'edit', {{ $account->id }})">Editar</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-delete" wire:click="$emit('evenConfirm', {{ $account->id }})">Excluir</a>
                            </div>
                        </div>
                    </td>
                    <td>{{ $account->name }}</td>
                    <td>{{ $account->email }}</td>
                    <td>{{ $account->cell_phone }}</td>
                    <td class="text-center">{{ $account->type }}</td>
                    <td class="text-center">{{ $account->status }}</td>
                </tr>
                @endforeach

            </table>

            {{ $accounts->links() }}
            
            @endif

        </div>
    </div>

</div>

<livewire:admin.account.modal-data-to />
<livewire:admin.account.modal-delete />