<?php

namespace ContactApp\SDK\services;

use  ContactApp\SDK\models\AddressModel;
use stdClass;

class AddressService
{
    public function save($object)
    {
        $model=  AddressModel::create($object);
        return $model->idaddress;
    }

   public function find($id)
   {
       $model= AddressModel::find($id);
       if($model)
            return $model->attributesToArray();
        return null;

   }

   public function delete($id)
   {
        $model= AddressModel::find($id);
        $model->delete();
        
   }
}