<?php


class crud
{

    public static function conect()
    {
        try {
            $con = new PDO('mysql:localhost=host; dbname=crud_db', 'root', '');
            return $con;
        } catch (PDOException $e1) {
            echo "no fue posible conectarse" . $e1->getMessage();
        } catch (PDOException $e2) {
            echo "error generico" . $e2->getMessage();
        }
    }

    public static function select()
    {
        $data=array();
        try {
            $p=crud::conect()->prepare('SELECT * FROM crudtable');
            $p->execute();
            $data=$p->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e1) {
            echo "no fue posible conectarse" . $e1->getMessage();
        } catch (PDOException $e2) {
            echo "error generico" . $e2->getMessage();
        }
    }

    public static function delete($id)
    {
        $data=array();
        try {
            $p=crud::conect()->prepare('DELETE FROM crudtable WHERE id=:id');
            $p->bindValue(':id',$id);
            $p->execute();
        } catch (PDOException $e1) {
            echo "no fue posible conectarse" . $e1->getMessage();
        } catch (PDOException $e2) {
            echo "error generico" . $e2->getMessage();
        }
    }
}
