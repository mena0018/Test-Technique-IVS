import PieceItem from "./PieceItem";
import PropTypes from "prop-types";
import "../../styles/List.css";

export default function PieceList({ datas }) {
  // On récupère la liste des pièces que l'on parcours afin de renvoyer les données d'une pièce par composant. 
  // On donne un identifiant pour la props key pour que React s'y retrouve.

  const listPieces = datas.map((piece) => (
    <PieceItem dataPiece={piece} key={piece.id} />
  ));

  return (
    <>
      <h1>Liste des Pièces </h1>
      <div className="pieces-list">
        {listPieces}
      </div>
    </>
  );
}

// Ajout de PropTypes afin de vérifier les données que l'on reçoit.
// Ici, la props datas est un tableau de pièces
PieceList.propTypes = {
  datas: PropTypes.array,
};
