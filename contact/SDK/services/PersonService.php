<?php

namespace ContactApp\SDK\services;

use  ContactApp\SDK\models\PersonsModel As PersonsModel;

class PersonService
{

    public function save($object)
    {
        $model= new PersonsModel($object);
        $model->save();
        return  $model->idpersons;
    }

   public function find($idPerson)
   {
       $model= PersonsModel::find($idPerson);
       return $model->attributesToArray();

   }

   public function delete($id)
   {
        $model= PersonsModel::find($id);
        $model->delete();
   }

   public function update($object)
   {
        $model= new PersonsModel($object);
        $model->update();
   }

}