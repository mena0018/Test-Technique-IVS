<?php

namespace App\Controller;

use App\Entity\Building;

class BuildingCountController
{
    /**
     * @param Building $data Ici $data représente le building d'id passer en paramètre de l'URL buildings/{id}/countNbPers.
     * @return int Le nombre de personnes présente dans un building caster en entier au format JSON.
     */
    public function __invoke(Building $data): int
    {
        // On initialise le compteur à 0
        $count = 0;

        // On récupère les pièces associées au building
        $piecesInBuilding = $data->getPieces();

        // On parcours le résultat qui est un tableau contenant : id, nom et nbPers pour une pièce
        foreach ($piecesInBuilding as $piece) {

            // On incrémente notre compteur avec le nombre de personnes présente par pièce.
             $count += (int) $piece->getNbPers();
        }
        // On retourne notre compteur :)
        return $count;
    }

}