<?php
namespace Phppot;

class DataSource
{
    const HOST = 'mysql';

    const USERNAME = 'root';

    const PASSWORD = 'root';

    const DATABASENAME = 'tuto_toons';

    private $conn;

    public function __construct()
    {
        $this->conn = $this->getConnection();
    }

    /**
     * @return \mysqli
     */
    public function getConnection(): \mysqli
    {
        $conn = new \mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASENAME);

        if (mysqli_connect_errno()) {
            trigger_error("Problem with connecting to database.");
        }
        $conn->set_charset("utf8");

        return $conn;
    }

    /**
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return mixed
     */
    public function select(string $query, string $paramType="", array $paramArray=array())
    {
        $stmt = $this->conn->prepare($query);
        
        if (!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        if (! empty($resultset)) {
            return $resultset;
        }
        return false;
    }
    
    /**
     * To insert
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return int
     */
    public function insert(string $query, string $paramType, array $paramArray): int
    {
        $stmt = $this->conn->prepare($query);
        $this->bindQueryParams($stmt, $paramType, $paramArray);
        $stmt->execute();
        $insertId = $stmt->insert_id;

        return $insertId;
    }
    
    /**
     * To execute query
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     */
    public function execute(string $query, string $paramType="", $paramArray=array()): void
    {
        $stmt = $this->conn->prepare($query);
        
        if (!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        $stmt->execute();
    }

    /**
     * @param $stmt
     * @param $paramType
     * @param array $paramArray
     */
    public function bindQueryParams($stmt, string $paramType, $paramArray=array()): void
    {
        $paramValueReference[] = & $paramType;
        for ($i = 0, $iMax = count($paramArray); $i < $iMax; $i ++) {
            $paramValueReference[] = & $paramArray[$i];
        }
        call_user_func_array(array(
            $stmt,
            'bind_param'
        ), $paramValueReference);
    }

    /**
     * @param string $query
     * @param string $paramType
     * @param array $paramArray
     * @return int
     */
    public function numRows(string $query, string $paramType="", $paramArray=array()): int
    {
        $stmt = $this->conn->prepare($query);
        
        if (!empty($paramType) && !empty($paramArray)) {
            $this->bindQueryParams($stmt, $paramType, $paramArray);
        }
        
        $stmt->execute();
        $stmt->store_result();

        return $stmt->num_rows;
    }

}
