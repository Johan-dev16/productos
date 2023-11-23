<?php

class Mysql extends Conexion
{
    private $conexion;
    private $strquery;
    private $arrValues;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    //Inserta un registro
    public function insert(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        try {
            $consulta = $this->conexion->prepare($this->strquery)->execute($this->arrValues);
            if ($consulta) {
                $idInsert = $this->conexion->lastInsertId();
            } else {
                $idInsert = 0;
            }
            return $idInsert;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Busca un registro
    public function select(string $query)
    {
        $this->strquery = $query;
        try {
            $consulta = $this->conexion->prepare($this->strquery);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //Busca todos los registros
    public function select_all(string $query)
    {
        $this->strquery = $query;
        try {
            $consulta = $this->strquery;
            $consulta = $this->conexion->prepare($consulta);
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    //Actualiza un registro
    public function update(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        try {
            $consulta = $this->strquery;
            $consulta = $this->conexion->prepare($consulta)->execute($this->arrValues);
            return $consulta;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    //Elimina un registro
    public function delete(string $query)
    {
        $this->strquery = $query;
        try {
            $consulta = $this->conexion->prepare($this->strquery);
            $del = $consulta->execute();
            return $del;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

?>