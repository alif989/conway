 <ul class="pagination">
    <!-- Previous Page Link -->
    <?php if ($paginator->onFirstPage()): ?>
        <li class="pagination-item disabled">
            <span class="pagination-item__link">&laquo;</span>
        </li>
    <?php else: ?>
        <li class="pagination-item">
            <a class="pagination-item__link" href="<?php echo $paginator->previousPageUrl() ?>" rel="prev">&laquo;</a>
        </li>
    <?php endif;?>

    <!-- Pagination Elements -->
    <?php foreach ($elements as $element): ?>
        <!-- "Three Dots" Separator -->
        <?php if (is_string($element)): ?>
            <li class="pagination-item disabled">
                <span class="pagination-item__link"><?php echo $element ?></span>
            </li>
        <?php endif;?>

        <!-- Array Of Links -->
         <?php if (is_array($element)): ?>
            <?php foreach ($element as $page => $url): ?>
                <?php if ($page == $paginator->currentPage()): ?>
                    <li class="pagination-item active">
                        <span class="pagination-item__link"><?php echo $page ?></span>
                    </li>
                <?php else: ?>
                    <li class="pagination-item">
                        <a class="pagination-item__link" href="<?php echo $url ?>"><?php echo $page ?></a>
                    </li>
                <?php endif;?>
            <?php endforeach;?>
        <?php endif;?>
    <?php endforeach;?>

    <!-- Next Page Link -->
    <?php if ($paginator->hasMorePages()): ?>
        <li class="pagination-item">
            <a class="pagination-item__link" href="<?php echo $paginator->nextPageUrl() ?>" rel="next">&raquo;</a>
        </li>
    <?php else: ?>
        <li class="pagination-item disabled">
            <span class="pagination-item__link">&raquo;</span>
        </li>
    <?php endif;?>
</ul>
