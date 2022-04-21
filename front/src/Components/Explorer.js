import axios from "axios";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faSpinner } from "@fortawesome/free-solid-svg-icons";
import { useEffect, useState } from "react";
import Building from "./Building/BuildingList";


export default function Explorer() {
  const [dataBuilding, setDataBuilding] = useState(null);
  let apiBuilding = "http://127.0.0.1:8000/api/buildings";

  useEffect(() => {
    axios
      .get(`${apiBuilding}`)
      .then((res) => setDataBuilding(res.data["hydra:member"]));
  }, [apiBuilding]);


  return (
    <>
      {/* Tant que les données ne sont pas chargées on affiche le loader */}
      { !dataBuilding ? <FontAwesomeIcon icon={faSpinner} spin /> : 

      // Une fois les données récupérées, on envoie au composant Building qui s'occupera de mettre en forme la data
      <Building datas={dataBuilding} />
      }
    </>
  );
}
