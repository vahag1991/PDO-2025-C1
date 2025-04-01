<nav>
    <a href="./">Accueil</a> |
    <?php
    foreach($menu as $item):
        ?>
        <a href="./?section=<?=$item['section_slug']?>"><?=$item['section_title']?></a> |
    <?php
    endforeach;
    ?>
    <a href="./?connect">Connexion</a>
</nav>
