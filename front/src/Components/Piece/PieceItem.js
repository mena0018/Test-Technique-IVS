import PropTypes from "prop-types";
import "../../styles/Item.css";

export default function PieceItem({ dataPiece }) {

  return (
    <div className="piece-item">
      <p>
        <span> ID : </span>
        {dataPiece.id}
      </p>
      <p>
        <span> Nom : </span>
        {dataPiece.nom}
      </p>
      <p>
        <span> Nombre de Personnes dans cette pièce: </span>
        {dataPiece.nbPers}
      </p>
    </div>
  );
}

PieceItem.propTypes = {
   dataPiece: PropTypes.shape({
    id: PropTypes.number.isRequired,
    nom: PropTypes.string.isRequired,
    nbPers: PropTypes.string.isRequired,
  }),
};
