<?php

namespace App\Controller;

use App\Entity\Piece;

class PieceCountController
{
    /**
     * @param Piece $data Ici $data représente la pièce d'id passer en paramètre de l'URL pieces/{id}/countNbPers
     * @return int La valeur du champ nbPers de la table Piece 'caster' en int
     */
    public function __invoke(Piece $data): int
    {
          return $data->getNbPers();
    }
}