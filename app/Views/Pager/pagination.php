<?php if ($pager->getPageCount() > 1): ?>
<div class="card-footer clearfix">
    <div class="d-flex justify-content-center">
        <ul class="pagination pagination-sm m-0">
            <?php if ($pager->hasPrevious()) : ?>
                <li class="page-item">
                    <a href="<?= $pager->getPrevious() ?>" class="page-link"><i class="fas fa-angle-left"></i></a>
                </li>
            <?php endif ?>

            <?php foreach ($pager->links() as $link): ?>
                <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                    <a href="<?= $link['uri'] ?>" class="page-link"><?= $link['title'] ?></a>
                </li>
            <?php endforeach ?>

            <?php if ($pager->hasNext()) : ?>
                <li class="page-item">
                    <a href="<?= $pager->getNext() ?>" class="page-link"><i class="fas fa-angle-right"></i></a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</div>
<?php endif ?>




