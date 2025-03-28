<nav>
    <?php
    foreach($menu as $item):
        ?>
        <a href="?section=<?=$item['section_slug']?>"><?=$item['section_title']?></a> |
    <?php
    endforeach;
    ?>
</nav>
