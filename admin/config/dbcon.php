<?php

    $option=array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8',);
    $sql = new PDO('mysql:host=localhost;dbname=ecommernce', 'root', '',$option);
    define('conn',$sql);
function query($statement) {
  // Connect to the database
  //$option=array(PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES utf8',);
  try{
    //global $conn = new PDO('mysql:host=localhost;dbname=ecommernce', 'root', '',$option);

    // Create a PDOStatement object
    $stmt = conn->prepare($statement);

    // Execute the query
    $stmt->execute();

    // Get the results
    $results = $stmt->fetchAll();

    // Close the connection
    $conn = null;

    // Convert the results to an array
    $results = $results ?: [];

    return $results;
  }
  catch(PDOException $e)
  {
    echo 'Failed: ' .  $e->getMessage();
  }

}
//why this
function qselect($tbl,$col,$value)
{
            $stmt = conn->prepare("SELECT * FROM $tbl where $col = :value ");
            $stmt->bindValue(':value', $value);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
}
function qselectfetchall($tbl,$col,$value)
{
            $stmt = conn->prepare("SELECT * FROM $tbl where $col = :value ");
            $stmt->bindValue(':value', $value);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
}
function qselectf($statament)
{
            $stmt = conn->prepare($statament);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
}