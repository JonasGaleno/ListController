<?php include __DIR__ . '/../header.php' ?>

    <div class="container finished-items">
        <div class="card-name">
            <div class="edit-name">
                <span class="name-category"><?= $category->getName(); ?> - Finalizados</span>
            </div>
        </div>

        <div class="d-flex justify-content-left action-buttons">
            <a href="/category-items?id=<?= $category->getId(); ?>" class="back-icon">
                <span class="material-icons md-36 back">arrow_back</span>
            </a>
        </div>

        <div class="container-finished-items">
            <?php if (count($items) > 0) : ?>
                <?php foreach ($items as $item): ?>
                    <div class="d-flex justify-content-between item">
                        <span class="item-name"><?= $item->getDescription(); ?></span>
                        <a href="/remove-finish?id=<?= $item->getId(); ?>" class="finish-item" id="removeFinish">
                            <span class="material-icons remove-finished-item">remove_circle</span>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="alert alert-info d-flex justify-content-center">
                    <h3>Não há itens finalizados</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
<?php include __DIR__ . '/../footer.php' ?>
