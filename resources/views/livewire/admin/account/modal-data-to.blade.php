<div>
    
    <div wire:ignore.self class="modal fade" id="modal-data-to" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        @if ($action == 'store')
                        Cadastrar conta
                        @endif
                        @if ($action == 'edit')
                        Atualizar conta
                        @endif
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" class="form-control" wire:model.defer="name">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" wire:model.defer="email">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Celular</label>
                        <input type="text" class="form-control" wire:model.defer="cell_phone">
                        @error('cell_phone') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Tipo</label>
                        <select class="combo" name="type" wire:model.defer="type" data-placeholder="---" style="width: 100%">
                            <option></option>
                            <option value="client">Cliente</option>
                            <option value="lead">Lead</option>
                        </select>
                        @error('type') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="combo" name="status" wire:model.defer="status" data-placeholder="---" style="width: 100%">
                            <option></option>
                            <option value="active">Ativada</option>
                            <option value="closed">Fechada</option>
                        </select>
                        @error('status') <span class="error">{{ $message }}</span> @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block" wire:click="submit">
                        <i class="fas fa-cloud-upload-alt"></i>
                        SALVAR
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

@push('component-scripts')
    <script>
        (function($){

            $(document).on('livewire:load', function() {

                $('.combo').select2({ 
                    "language": "pt-BR",
                })

                $('select[name="type"]').on('change', function(){
                    @this.type = $(this).val()
                })

                $('select[name="status"]').on('change', function(){
                    @this.status = $(this).val()
                })

                Livewire.on('modalClose', (modalId) => {
                    $(modalId).modal('hide')
                })

                Livewire.hook('message.processed', (message, component) => {
                    $('.combo').select2();
                })                

            })

        })(jQuery)
    </script>
@endpush
