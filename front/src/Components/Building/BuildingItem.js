import PropTypes from "prop-types";
import { useEffect, useState } from "react";
import "../../styles/Item.css";
import axios from "axios";


export default function BuildingItem({ dataBuilding }) {

   const [nbPers, setNbPers] = useState(0);
   let apiNbPers = "http://127.0.0.1:8000/api/buildings/";


   // Ici on fait un appel à la route api/buildings/{id}/countNbPers afin d'avoir le nombre de personnes par building
   useEffect(() => {
      axios.get(`${apiNbPers}${dataBuilding.id}/countNbPers`)

        // On met à jour le state avec la réponse de la route
        .then((res) => setNbPers(res.data));
    }, []);


  return (
    <div className="building-item">
      <p>
        <span> ID : </span>
        {dataBuilding.id}
      </p>
      <p>
        <span> Nom : </span>
        {dataBuilding.nom}
      </p>
      <p>
        <span> Code Postal : </span>
        {dataBuilding.zipcode}
      </p>
      <p>
        <span> Pièces : </span>
        {dataBuilding["pieces"].map((piece) => piece.nom + " / ")}
      </p>
      <p>
        <span> Nombre de personnes dans ce building : </span>
        {nbPers}
      </p>
    </div>
  );
}


BuildingItem.propTypes = {
   dataBuilding: PropTypes.shape({
    id: PropTypes.number.isRequired,
    nom: PropTypes.string.isRequired,
    zipcode: PropTypes.string.isRequired,
    pieces: PropTypes.array,
  }),
};
