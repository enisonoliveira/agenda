<?php

namespace ContactApp\SDK\services;

use  ContactApp\SDK\models\PhoneModel As PhoneModel;

class PhoneService
{

    public function save($object)
    {
        $model= new PhoneModel($object);
        $model->save();
        if($model)
             return $model->idpersons;
        return null;
    }

   public function find($idPerson)
   {
       $model= PhoneModel::find($idPerson);
       if($model)
            return $model->attributesToArray();
        return null;

   }

   public function delete($id)
   {
        $model= PhoneModel::where('contact_id',$id)->delete();
   }

   public function update($object)
   {
        $model= new PhoneModel($object);
        $model->update();
   }

}