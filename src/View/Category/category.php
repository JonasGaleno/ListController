<?php include __DIR__ . '/../header.php' ?>

    <div class="container category-items">
        <div class="delete-category">
            <a href="/delete-category?id=<?= $category->getId(); ?>" class="remove-category">
                <span class="material-icons delete">delete</span>
            </a>
        </div>
        
        <div class="card-name">
            <div class="edit-name">
                <a type="button" class="edit-category" data-toggle="modal" data-target="#editCategoryModal">
                    <span class="material-icons md-36 edit">edit</span>
                </a>
                <span class="name-category"><?= $category->getName(); ?></span>
            </div>
        </div>

        <div class="d-flex justify-content-between action-buttons">
            <a href="#" class="add-list" data-toggle="modal" data-target="#newItemModal">
                <span class="material-icons md-36 add">add_circle</span>
            </a>
            <a href="/finished-items" class="btn btn-primary">Finalizados</a>
        </div>

        <div class="container-items">
            <?php if (count($items) > 0) : ?>
                <?php foreach ($items as $item): ?>
                    <div class="d-flex justify-content-between item">
                        <div class="d-flex justify-content-center">
                            <a 
                                onclick="fillForm(<?= $item->getId(); ?>, '<?= $item->getDescription(); ?>')" 
                                type="button" 
                                class="edit-icon" 
                                data-toggle="modal" 
                                data-target="#editItemModal"
                            >
                                <span class="material-icons edit-item">edit</span>
                            </a>
                            <span class="item-name"><?= $item->getDescription(); ?></span>
                        </div>
                        <div class="form-buttons">
                            <a href="/delete-item?id=<?= $item->getId(); ?>" class="remove-item">
                                <span class="material-icons delete">delete</span>
                            </a>
                            <a href="/finish-item?id=<?= $item->getId(); ?>" class="finish-item">
                                <span class="material-icons check-item">check_circle</span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="d-flex justify-content-center warning-text">
                    <h3>Não há itens</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include __DIR__ . '/../Modal/modal-edit-category.php' ?>

    <?php include __DIR__ . '/../Modal/modal-new-item.php' ?>

    <?php include __DIR__ . '/../Modal/modal-edit-item.php' ?>

<?php include __DIR__ . '/../footer.php' ?>
