<?php include __DIR__ . '/../header.php' ?>

    <div class="container home-page">
        <a type="button" class="add-category" data-toggle="modal" data-target="#newCategoryModal">
            <span class="material-icons md-36 add">add_circle</span>
        </a>

        <div class="container container-categories">
            <div class="row justify-content-center categories">
                <?php if (count($categories) > 0) : ?>
                    <?php foreach ($categories as $category): ?>

                    <div onclick="openCategory(<?= $category->getId(); ?>)" class="col-4 category">
                        <span class="align-middle category-name"><?= $category->getName(); ?></span>
                    </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <span class="warning-text">Não há categorias cadastradas</span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/../Modal/modal-new-category.php' ?>
    
<?php include __DIR__ . '/../footer.php' ?>
