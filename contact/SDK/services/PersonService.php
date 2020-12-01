<?php

namespace ContactApp\SDK\services;

use  ContactApp\SDK\models\PersonsModel As PersonsModel;

class PersonService
{

    public function save($object)
    {
        $model=  new PersonsModel();
        if($object['idpersons']!=null){
            $model=  PersonsModel::find($object['idpersons']);
        }
        $model->idpersons=$object['idpersons'];
        $model->name=$object['name'];
        $model->email=$object['email'];
        $model->address_id=$object['address_id'];
        $model->avatar=$object['avatar'];
        $model->update();
        return  $model->idpersons;
    }

   public function find($idPerson)
   {

       $model= PersonsModel::find($idPerson);
       if($model)
             return $model->attributesToArray();
        return null;

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