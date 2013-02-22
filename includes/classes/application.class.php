<?php

require_once(INC_PATH_CONFIG . DS . "path_includes.php");
require_once(INC_PATH_PHP . DS . "base.php");

class BaseApplication extends Connection {

  function __construct() {
    Connection::__construct();
  }

  function select($sql, $iDim = 0) {
    $ret = array();
    $res = pg_query($sql); #or die($this->error(pg_error(),"Select Query: ".$sql));

    if ($iDim == 1) {
      while ($row = pg_fetch_row($res)) {
        $ret[] = $row;
      }
    } elseif ($iDim == 2) {
      while ($row = pg_fetch_array($res)) {
        $ret[] = $row;
      }
    } else {
      while ($row = pg_fetch_assoc($res)) {
        $ret[] = $row;
      }
    }
    return $ret;
  }

  function insert($sql) {
    $result = pg_query($sql) or die($this->error(pg_error(), "Insert Query: " . $sql)); //("Problem In Query Execution!", ""));
    return pg_insert_id();
  }

  /**
   * 	UPDATE QUERY OPERATIONS WILL BE DONE BY update($sql)
   * 	METHOD YOU HAVE TO PASS SQL QUERY AS ARGUMENT
   * 	$sql	=	sql query to be executed
   */
  function update($sql) {
    $result = pg_query($sql) or die($this->error(pg_error(), "Update Query: " . $sql)); //("Problem In Query Execution!", ""));
    return pg_affected_rows();
  }

  function delete($sql) {
    $result = pg_query($sql) or die($this->error(pg_error(), "Delete Query: " . $sql)); //("Problem In Query Execution!", ""));
    return pg_affected_rows();
  }

}
