import React from 'react'

export default function BuildingItem({ datas}) {
  return (
   
   <div className='building-item'>
      <h1> Nom : {datas.nom} </h1>
   </div>
  )
}
