<?php 
namespace Phppot\Model;

use mysql_xdevapi\Exception;
use Phppot\Datasource;

class CSV
{
    private $ds;

    public function __construct()
    {
        require_once __DIR__ . './../lib/DataSource.php';
        $this->ds = new DataSource();
    }
    
    /**
     * @return array result record
     */
    public function getAll()
    {

        $query = "SELECT * from tuto_import_csv ORDER BY import_time DESC LIMIT 20";
        $result = $this->ds->select($query);
        return $result;
    }
    
    /**
     * @param string $columnName
     * @param string $columnValue
     * @param string $questionId
     */
    public function editRecord($columnName, $columnValue, $questionId)
    {
        $query = "UPDATE tuto_import_csv set " . $columnName . " = ? WHERE  id = ?";
        
        $paramType = 'si';
        $paramValue = array(
            $columnValue,
            $questionId
        );
        $this->ds->execute($query, $paramType, $paramValue);
    }
}
