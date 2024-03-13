<?php
require_once("base/Database.php");

class CrmPostItType extends Database
{

    public static function  getItem($typeID){
            $query = "SELECT *
                    FROM crm_postit_type
                    WHERE 
                        typeID='$typeID'";
            return parent::GetObject(parent::GetResult($query));
    }


    public static function  getList(){
            $query ="SELECT *
                    FROM crm_postit_type
                    ORDER BY typeID ASC";
            //echo $query;
            return parent::GetCollection(parent::GetResult($query));
    }


    public static function  AddNew($oPostItType){
            //Search the max Id
            $query = "SELECT MAX(typeID) FROM crm_postit_type";
            $result = parent::GetResult($query);
            $oPostItType->typeID = parent::fetchScalar($result)+1;
            //Insert data to table
            $query = "INSERT INTO crm_postit_type(typeID, typeName, description, active)
                            VALUES('$oPostItType->typeID', '$oPostItType->typeName', '$oPostItType->description', '$oPostItType->active')";

            return parent::Execute($query);
    }

    public static function  Update($oPostItType){
            //Update data to table
            $query = "UPDATE crm_postit_type SET 
                        typeName ='$oPostItType->typeName', 
                        description ='$oPostItType->description', 
                        active  =$oPostItType->active
                    WHERE
                        typeID    ='$oPostItType->typeID'";
            return parent::Execute($query);
    }

    public static function  Delete($oPostItType){
            $query = "DELETE
                    FROM crm_postit_type
                        WHERE typeID='$oPostItType->typeID'";
            parent::Execute($query);
    }

}

?>