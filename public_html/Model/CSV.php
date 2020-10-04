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
     * @return mixed
     */
    public function getAll()
    {
        $query = "SELECT * from tuto_import_csv ORDER BY import_time DESC LIMIT 20";

        if ($result = $this->ds->select($query)) {
            return $result;
        }

        return false;
    }
    
    /**
     * @param string $columnName
     * @param string $columnValue
     * @param string $questionId
     */
    public function editRecord(string $columnName, string $columnValue, string $questionId): void
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
