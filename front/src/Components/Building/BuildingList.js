import BuildingItem from "./BuildingItem";
import PropTypes from "prop-types";
import "../../styles/List.css";

export default function BuildingList({ datas }) {
   
  // On récupère la liste des buildings que l'on parcours afin de renvoyer les données d'un building par composant. On donne un identifiant pour la props key pour que React s'y retrouve.
  const listBuildings = datas.map((building) => (
    <BuildingItem dataBuilding={building} key={building.id} />
  ));

  return (
    <>
      <h1>Liste des Buildings </h1>
      <div className="building-list">
        {/* listBuildings correspond à une liste de composant BuildingItem */}
        {listBuildings}
      </div>
    </>
  );
}

// Ajout de PropTypes afin de vérifier les données que l'on reçoit.
// Ici, la props datas est un tableau de buildings
BuildingList.propTypes = {
  datas: PropTypes.array,
};
