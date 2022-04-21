import BuildingItem from "./BuildingItem"


export default function Building({ datas }) {

   const listBuildings = datas.map((building) => (
      <BuildingItem  datas={building} key={building.id}/>
   ))
   
  return (
    <div className='building-list'>
       {listBuildings}
    </div>
  )
}
