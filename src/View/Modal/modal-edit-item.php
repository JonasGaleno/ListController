<!-- Modal -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="modaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaLabel">Atualização do item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="editItemForm">
                    <div class="form-group">
                        <label for="inputItem">Nome do item</label>
                        <input type="text" name="description" class="form-control" id="inputDescriptionItem">
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" form="editItemForm" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
