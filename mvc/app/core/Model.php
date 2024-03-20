<?php
class Model extends Database
{


    public function __construct()
    {
        if(!property_exists($this, 'table')){

            $this->table = strtolower($this::class) . 's';
        }


        public function findAll()
        {
            $query = "select * from $this->table";
            $result = $this->query($query);

            if($result){
                return $return;
            }
            return false;
        }

        public function where($data, $data_not = [])
        {
            $keys = array_keys($data);
            $key_not = array_keys($date_not);

            $query = "select* from $this->table where ";

            foreach($keys as $key){
                $query .= $keys . "= :" . $key . "&&";
            }

            foreach ($keys_not as $key ) {
                $query .= $keys . "= :" . $key . "&&";
            }

            $query = trim($query, ' && ');
            
            $data = array_merge($data, $data_not);
            $result = $this->query($query, $data);

            if ($result){
                return $return;
            }
            return false;
        }

        public function insert($data)
        {
            $columns = implode(',', array_keys($data));
            $values = implode(',', array_keys($data));
            $query = "inset into $this->table(columns) values(:$values)";
            show ($query);
            $this->query($query, $data);

            return false;
        }

        public function update ($id, $data, $column = 'id')
        {
            $keys = array_keys($data);
            $query = "update $this->table set";

            foreach ($keys as $key) {
                $query .= $key . " = :" . $key .",";
            }

            $query = trim ($query, ", ");

            $query .= " where $column = :$column";

            $data[$column] = $id;
            $this->query ($query,$data);

            return false;
        }

        public function delete($id, $column = 'id')
        {
            $data[$column] = $id;
            $query = "delete $this->table where $column =:$column";

            $this->query($query, $date);

            return false;
        }
    }
}