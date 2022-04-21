import PropTypes from "prop-types";
import { useEffect, useState } from "react";
import "../../styles/Item.css";
import axios from "axios";

export default function BuildingItem({ datas }) {

   const [nbPers, setNbPers] = useState(0);
   let apiBuilding = "http://127.0.0.1:8000/api/buildings/";

   useEffect(() => {
      axios
        .get(`${apiBuilding}${datas.id}/countNbPers`)
        .then((res) => setNbPers(res.data));
    }, [apiBuilding, datas.id]);

  return (
    <div className="building-item">
      <p>
        <span> Nom : </span>
        {datas.nom}
      </p>
      <p>
        <span> Code Postal : </span>
        {datas.zipcode}
      </p>
      <p>
        <span> Pièces : </span>
        {datas["pieces"].map((piece) => piece.nom + " / ")}
      </p>
      <p>
        <span> Nombre de personnes dans ce building : </span>
        {nbPers}
      </p>
    </div>
  );
}

BuildingItem.propTypes = {
  datas: PropTypes.shape({
    id: PropTypes.number.isRequired,
    nom: PropTypes.string.isRequired,
    zipcode: PropTypes.string.isRequired,
    pieces: PropTypes.array,
  }),
};
