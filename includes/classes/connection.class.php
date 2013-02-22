<?php

class Connection {

  var $db;

  function __construct() {
    $conn_string = "host=" . DB_HOST . " port=5432 dbname= " . DB_NAME . " user=" . DB_USER . " password=" . DB_PASSWORD ;
    pg_connect($conn_string);
    $this->declare_db_constants();
  }

  function __destruct() {
    if ($this->db) {
      pg_close();
    }
  }

  /**
   * Creates constants for tables in connected database.
   * <p>
   * This function will define the constants same as the table created in connected database.
   * It make the word capitalized with no underscore and space. 
   * For example:
   * 1. store_promotions will be StorePromotions
   * 2. store_promotion_users will be StorePromotionUsers
   * </p>
   */
  private function declare_db_constants() {
    $qry = "select relname from pg_stat_user_tables WHERE schemaname='public' AND relname != 'schema_migration'";
    $n = pg_query($qry);

    $tbnames = array();
    while ($row = pg_fetch_row($n)) {
      $nm = "";
      $tbname = explode('_', $row[0]);
      foreach ($tbname as $value) {
        $nm .= ucwords($value);
      }
//  $nm = substr_replace($nm ,"",-1);
      array_push($tbnames, $nm);
      defined($nm) or define($nm, $row[0]);
    }

    defined('TABLE_NAMES') or define('TABLE_NAMES', serialize($tbnames));
  }

}

?>