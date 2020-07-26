<?php

namespace Kcy\DynamicDatatables;

use Illuminate\Support\Facades\Log;
use PDO;
use PDOException;

class ConnectionDB
{

    public $pdoObj = "";
    public function __construct($dsn, $username = "", $password = "")
    {
        try {
            if ($username == "" || $password == "") {
                $this->pdoObj = new PDO($dsn);
                dd($this->pdoObj);
            } else
                $this->pdoObj = new PDO($dsn, $username, $password);
            $this->pdoObj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            Log::error($e->getMessage());
            return abort("500");
        }
    }
    public function sqlExec($sql)
    {
        $result = [];
        try {
            $qdb = $this->pdoObj->prepare($sql);
            $qdb->setFetchMode(PDO::FETCH_ASSOC);
            $qdb->execute();
            $result = $qdb->fetchAll();
        } catch (PDOException $e) {
            Log::error($e->getMessage());
        }
        return $result;
    }
}
