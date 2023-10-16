<?php
    class Orm{
        protected $id; //identificador
        protected $table; //nombre
        protected $bd; //conexion bd

        public function __construct($id,$table, PDO $conexion){
            $this->id = $id;
            $this->table = $table;
            $this->bd = $conexion;
        }

        public function getAll(){
            $stm = $this->bd->prepare("SELECT * from {$this->table}");
            $stm->execute();
            return $stm->fetchAll(); // fetch retorna varios registros

        }
        public function getById($id){
            $stm = $this->bd->prepare("SELECT * from {$this->table} where id = :id");
            $stm->bindValue(":id",$id);
            $stm->execute();
            return $stm->fetch(); // fetch solo retorna un registro
            
        }
        public function deleteById($id){
            $stm = $this->bd->prepare("DELETE from {$this->table} where id = :id");
            $stm->bindValue(":id",$id);
            $stm->execute();
            // en delete no retorna ni un registro
            
        }
        public function updateById($id, $data){
            $sql = "UPDATE {$this->table} SET ";
            foreach($data as $key => $value){
                $sql .="{$key} = :{$key},";
            }
            $sql = trim($sql, ',');
            $sql .=" where id = :id ";

            $stm = $this->bd->prepare($sql);
            foreach($data as $key => $value){
                $stm->bindValue(":{$key}",$value);

            }
            $stm->bindValue(":id",$id);
            $stm->execute();
            
        }
        public function insert($data){
            $sql = "INSERT INTO {$this->table} (";
            foreach ($data as $key => $value){
                $sql .="{$key},";
            }
            $sql = trim ($sql, ',');
            $sql .= ") VALUES(";
            
            foreach($data as $key => $value){
                $sql .= ":{$key},";
            }
            $sql = trim($sql, ',');
            $sql .=")";

            $stm = $this->bd->prepare($sql);
            foreach ($data as $key => $value){
                $stm->bindValue(":{$key}", $value);
            }
            // echo $sql;
            $stm->execute();
            
        }

        public function paginate($page, $limit){
            $offset = ($page - 1) * $limit;

            $rows = $this->bd->query("SELECT COUNT(*) FROM {$this->table}")->fetchColumn();

            $sql = "SELECT * FROM {$this->table} LIMIT {$offset},{$limit}";
            $stm = $this->bd->prepare($sql);
            $stm->execute();

            $pages = ceil($rows / $limit);

            $data = $stm->fetchAll();

            return [
                'data' => $data,
                'page' => $page,
                'limit' => $limit,
                'pages' => $pages,
                'rows' => $rows,
            ];
        }

    }


?>