<?php

namespace ContactApp\SDK\services;

use  ContactApp\SDK\models\UserModel As UserModel;

class UserService
{

    public function save($object)
    {
        $model= new UserModel($object);
        $model->save();
        return  $model->iduser;
    }

   public function find($idPerson)
   {
       $model= UserModel::find($idPerson);
       if($model)
            return $model->attributesToArray();
        return null;

   }

   public function delete($id)
   {
        $model= UserModel::find($id);
        $model->delete();
   }
}