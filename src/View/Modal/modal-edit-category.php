<!-- Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="modaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaLabel">Atualização da categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/edit-category?id=<?= $category->getId(); ?>" method="POST" id="editCategoryForm">
                    <div class="form-group">
                        <label for="inputCategory">Nome da categoria</label>
                        <input type="text" name="name" class="form-control" id="inputCategory" value="<?= $category->getName(); ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="submit" form="editCategoryForm" class="btn btn-primary">Salvar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
