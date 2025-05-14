<?php

// création d'une fonction qui va récupérer tous nos articles


// création d'une fonction qui insert un message dans
// la table `article` en bloquant les injections SQL

// fonction qui prend le nombre total de `article`
function countTotalArticle(PDO $connect): int
{
    try {
        $query = $connect->query("SELECT COUNT(*) as nb FROM article");
        $nb = $query->fetch()['nb'];
        $query->closeCursor();
        return $nb;
    }catch (Exception $e){
        die($e->getMessage());
    }
}

// fonction qui ne prend que les articles visibles sur cette page
function getArticleByPage(PDO $c, int $offset, int $limit): array
{
    $prepare = $c->prepare("
        SELECT * 
        FROM article 
    ORDER BY `create_date` ASC
    LIMIT ?, ?");
    $prepare->bindParam(1,$offset, PDO::PARAM_INT);
    $prepare->bindParam(2,$limit, PDO::PARAM_INT);

    try{
        $prepare->execute();
        $articles = $prepare->fetchAll();
        $prepare->closeCursor();
        return $articles;
    }catch(Exception $e){
        die($e->getMessage());
    }

}

// création d'une fonction qui créer la pagination
function pagination (int $nbItemTotal, int $pageActu, string $get='page', int $itemPerPage=5 ): string
{
    // variable de sortie
    $sortie = "";

    // pour connaître le nombre total de page, on divise
    // le nombre total d'articles par le nombre par page
    $nbPages = $nbItemTotal/$itemPerPage;
    // on arrondit au supérieur pour avoir le bon nombre de page
    $nbPages = ceil($nbPages);

    // si il y a moins de 2 pages
    if($nbPages<2) return "";

    for($i=1; $i<=$nbPages;$i++){
        // si le tour de boucle est sur la pâge actuelle
        if($i==$pageActu){
            $sortie .= " $i  | ";
        }else {
            $sortie .= "<a href='?$get=$i'>$i</a> | ";
        }
    }

    return $sortie;
}

