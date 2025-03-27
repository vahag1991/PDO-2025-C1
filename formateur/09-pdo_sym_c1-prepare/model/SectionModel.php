<?php
# modèle qui gère les sections

/**
 * fonction qui récupère toutes les sections
 * uniquement id, section_title et section_slug
 * @param PDO $db
 * @return array|string
 */
function getAllSectionsMenu(PDO $db) : array|string
{
    try {
        $request = $db->query("SELECT id, section_title, section_slug FROM section");
        // pas de résultat on envoie l'erreur
        if($request->rowCount() === 0) return "Pas encore de section";
        return $request->fetchAll();
    }catch (Exception $e){
        return $e->getMessage();
    }
}
