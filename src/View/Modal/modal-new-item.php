<!-- Modal -->
<div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="modaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaLabel">Novo item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/new-item?id=<?= $category->getId(); ?>" method="POST" id="newItemForm">
                    <div class="form-group">
                        <label for="inputItem">Descrição do item</label>
                        <input type="text" name="description" class="form-control" id="inputItem">
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" form="newItemForm" class="btn btn-primary">Enviar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
