<div>
    
    <div wire:ignore.self class="modal fade" id="modal-delete" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Deseja excluir permanentemente?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Confirmar e excluir permanentemente!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-block btn-danger" wire:click="delete">
                        <i class="fas fa-check"></i>
                        CONFIRMAR
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

                Livewire.on('modalClose', (modalId) => {
                    $(modalId).modal('hide')
                })                

            })

        })(jQuery)
    </script>
@endpush
