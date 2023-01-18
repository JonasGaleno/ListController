<!-- Modal -->
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="modaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaLabel">Nova categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/new-category" method="POST" id="newCategoryForm">
                    <div class="form-group">
                        <label for="inputCategory">Nome da categoria</label>
                        <input type="text" name="name" class="form-control" id="inputCategory">
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" form="newCategoryForm" class="btn btn-primary">Enviar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
