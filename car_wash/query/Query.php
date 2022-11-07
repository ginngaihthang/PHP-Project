<?php 

    require "query/Dbconnect.php";

    class Query extends Dbconnect{
        public function __construct() {
            parent::__construct();
        }

      
        public function select($table, $rows="*", $join=null, $where=null, $order=null, $limit=null) {
            $sql = "SELECT $rows FROM $table";
            if($join != null) {
                $sql .= " INNER JOIN $join";
            }

            if($where != null) {
                $sql .= " WHERE $where";
            }

            if($order != null) {
                $sql .= " GROUP BY $order";
            }

            if($limit != null) {
                $sql .= " Limit $limit";
            }
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            if($limit == '1' ) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            }else{
                $result = $stmt->fetchAll(); //fetchAll(ArrayFormate)
            }
            
            return $result;
        }

        public function store($table, $datas = []) {
            $table_columns = implode(',', array_keys($datas));
            $sql = "INSERT INTO $table ($table_columns) VALUE (:".implode(', :', array_keys($datas)).")";
            $stmt = $this->pdo->prepare($sql);
            foreach ($datas as $key => &$data) {
                $stmt->bindParam(":$key", $data, PDO::PARAM_STR);
            }
            $stmt->execute();
        }

        public function update($table, $datas, $where) {

            $args = [];
            foreach ($datas as $key => $value) {
                $args[] = "$key = '$value'";
            }
            $sql = "UPDATE $table SET ".implode(',', $args)." WHERE $where ";
            //echo $sql;
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

        public function delete($table, $where ) {
            $sql = "DELETE FROM $table WHERE $where";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }

    }

?>