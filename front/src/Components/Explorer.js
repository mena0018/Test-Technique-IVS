import axios from "axios";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faSpinner } from "@fortawesome/free-solid-svg-icons";
import { useEffect, useState } from "react";
import Building from "./Building/BuildingList";
import PieceList from "./Piece/PieceList";


export default function Explorer() {

   // J'initialise le state à null afin d'éviter qu'il soit undefined
  const [dataBuilding, setDataBuilding] = useState(null);
  const [dataPiece, setDataPiece] = useState(null);

  let apiBuilding = "http://127.0.0.1:8000/api/buildings";
  let apiPiece = "http://127.0.0.1:8000/api/pieces";


   // le Hook useEffect prend en 2nd paramètre un tableau vide afin de faire l'appel à l'API qu'une fois : lors de l'affichage du composant et non à chaque mise à jour du composant.
  useEffect(() => {
    axios.get(`${apiBuilding}`)
       //   Je met à jour le state de dataBuilding avec les bonne données
      .then((res) => setDataBuilding(res.data["hydra:member"]));
  }, [apiBuilding]);

  
   //   Je met à jour le state de dataPiece avec les bonne données
  useEffect(() => {
   axios.get(`${apiPiece}`)
     .then((res) => setDataPiece(res.data["hydra:member"]));
 }, [apiPiece]);


  return (
    <>
      {/* Tant que les données ne sont pas chargées on affiche le loader */}
      { !dataBuilding || !dataPiece ? <FontAwesomeIcon icon={faSpinner} spin /> : 

      // Une fois les données récupérées, on envoie aux composants Building et Piece qui s'occuperont de mettre en forme la data
      <>
         <Building  datas={dataBuilding} />
         <PieceList datas={dataPiece} />
      </>
      }
    </>
  );
}
