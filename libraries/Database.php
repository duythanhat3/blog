<?php

class Database {

    private $pdo;

    private $sql;

    public function __construct($host, $db, $user, $password, $charset = 'utf8'){
        $this->connect($host, $db, $user, $password, $charset = 'utf8');
    }

    /**
     * connect to database
     * 
     * @param string $host
     * @param string $db
     * @param string $user
     * @param string $password
     * @param string $charset
     */
    public function connect($host, $db, $user, $password, $charset = 'utf8') {
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $password, $opt);
    }

    /**
     * select database
     * 
     * @param array $fields
     * @param string $table
     */
    public function select(array $arrayfields, $table) {
        $fields = implode(',', $arrayfields);
        $this->sql = "SELECT $fields FROM $table";
        return $this;
    }

    /**
     * insert record
     * @param array $arrayFieldValues
     * [
     *       'fields' => 'name,time,trainer',
     *       'values' => [
     *          ['HTML', 10, 'Mr.Thanh'],
     *          ['CSS', 10, 'Mr.Thanh'],
     *          ['JAVASCRIPT', 10, 'Mr.Thanh']
     *        ]
     * ];
     * @param string $table
     * @return self
     */
    public function insert(array $arrayFieldValues, $table) {
        
        $sql = "INSERT INTO $table (" . $arrayFieldValues['fields'] . ") VALUES ";
        $fieldVals = '';

        foreach($arrayFieldValues['values'] as $fieldValues){
            $fieldVals .= '(';
            foreach($fieldValues as $value){
                $fieldVals .= "'$value',";
            }
            $fieldVals = substr($fieldVals,0,-1) . '),';
        }
        $fieldVals = substr($fieldVals, 0, -1);
        $sql .= $fieldVals;

        $this->sql = $sql;

        return $this;
    }

    /**
     * update one record on database
     * 
     * @param string $field
     * @param mixed $value
     * @param string $table
     */
    public function update($field, $value, $table) {
        $this->sql = "UPDATE `$table` SET `$field` = $value";
        return $this;
    }

    /**
     * delete a record
     * @param string $table
     * @return boolean
     */
    public function delete($table) {
        $this->sql = "DELETE FROM $table";

        return $this;
    }

    /**
     * add where clause for query
     * @param string $strWhere
     */
    public function where($strWhere) {
        $this->sql .= ' WHERE ' . $strWhere;
        return $this;
    }

    /**
     * execute query
     */
    public function execute() {
        $this->pdo->prepare($this->sql)->execute();
    }

    /**
     * Fetch all data 
     * @return array
     */
    public function fetchAll() {
        return $this->pdo->query($this->sql)->fetchAll();
    }


}