<?php require "db_connect.php";

// get form data from form post and insert it
function dbInsert($conn, $table_name, $form_data) {
    $fields = array_keys($form_data);
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";
    return mysqli_query($conn, $sql);
};

function dbDelete($conn, $table_name, $where_clause='') {
$where = '';
if(!empty($where_clause))
    {
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            $where = " WHERE ".$where_clause;
        } else
        {
            $where = " ".trim($where_clause);
        }
    }

$sql = "DELETE FROM ".$table_name.$where;

return mysqli_query($conn, $sql);
    
};

function dbUpdate($conn, $table_name, $form_data, $where_clause='')
{
    
    $where = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $where = " WHERE ".$where_clause;
        } else
        {
            $where = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";

    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);

    // append the where statement
    $sql .= $where;

    // run and return the query result
    return mysqli_query($conn, $sql);
};

?>