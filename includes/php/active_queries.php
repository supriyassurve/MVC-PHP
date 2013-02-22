<?php

defined('PATHINC') or define("PATHINC", '/var/www/MVC-PHP/config/path_includes.php');

require_once PATHINC;
require_once INC_PATH_CONFIG . '/database.php';

$conn_string = "host=" . DB_HOST . " port=5432 dbname= " . DB_NAME . " user=" . DB_USER . " password=" . DB_PASSWORD;
$conn = pg_connect($conn_string);

/**
 * For Updating a single record
 * @param array $records <p>Array of records</p>
 * @param string $model <p>Table name in which you want to make changes</p>
 */
function update_attributes($record, $model) {
  $fields = count($record);
  if ($fields > 0) {
    $i = 0;
    $update = "UPDATE " . $model . " SET ";
    foreach ($record as $key => $value) {
      $i++;
      if (gettype($value) == 'string') {
        $update .= $key . "= '" . pg_escape_string($value) . "'";
      } else {
        $update .= $key . "= " . $value;
      }
      if ($fields > $i) {
        $update .= ", ";
      }
    }
    $update .= " WHERE id = " . $record['id'];
    $result = pg_query($update);
    return pg_affected_rows($result);
  }
}

/**
 * For Updating a single record
 * @param array $records <p>Array of records</p>
 * @param string $model <p>Table name in which you want to make changes</p>
 */
function update_nested_attributes($records, $model) {
  $del = 0;
  $new = 0;
  $up = 0;
  $del_records = array();
  $new_records = array();
  $up_records = array();

  foreach ($records as $record) {
    if (isset($record['id'])) {
      if ($record["destroy"] == 'true') {
        $del_records[$del] = $record;
        $del++;
      } else {
        unset($record['destroy']);
        $up_records[$up] = $record;
        $up++;
      }
    } else {
      if ($record['description'] != "") {
        $new_records[$new] = $record;
        $new++;
      }
    }
  }
  update_multiple_records($up_records, $model);
  delete_records($del_records, $model);
  insert_multiple_records($new_records, $model);
}

/**
 * For Updating a multiple record
 * @param array $records <p>Array of records</p>
 * @param string $model <p>Table name in which you want to make changes</p>
 */
function update_multiple_records($records, $model) {
  foreach ($records as $record) {
    update_attributes($record, $model);
  }
}

/**
 * For Deleting a single/ multiple record
 * @param array $records <p>Array of records</p>
 * @param string $model <p>Table name in which you want to make changes</p>
 */
function delete_records($records, $model) {
  $ids = array();

  foreach ($records as $record) {
    array_push($ids, $record['id']);
  }

  if (count($ids) > 0) {
    $delete = "DELETE FROM " . $model . " WHERE id in (" . implode(', ', $ids) . ")";
    $result = pg_query($delete);
    return pg_affected_rows($result);
  }
}

/**
 * For Inserting a single record
 * @param array $record <p>Array of single record</p>
 * @param string $model <p>Table name in which you want to make changes</p>
 */
function insert_record($record, $model, $result = 0) {
  $fields = count($record);
  if ($fields > 0) {
    $i = 0;
    $k = 0;
    $insert = "INSERT INTO " . $model . " (";

    foreach ($record as $key => $value) {
      $k++;
      $insert .= $key;
      if ($fields > $k) {
        $insert .= ", ";
      }
    }

    $insert .= ", created_at ";
    $insert .= ", updated_at ";

    $insert .= ") VALUES (";
    foreach ($record as $key => $value) {
      $i++;
      if (gettype($value) == 'string') {
        $insert .= " '" . pg_escape_string($value) . "'";
      } else {
        $insert .= $value;
      }

      if ($fields > $i) {
        $insert .= ", ";
      }
    }
    $d = strftime('%F %T');
    $insert .= ", '" . $d . "' ";
    $insert .= ", '" . $d . "' ";

    $insert .= ") RETURNING id;";
    error_log($insert);
    $result = pg_query($insert);
    return pg_fetch_row($result);
  }
}

/**
 * For Inserting multiple records
 * @param array $records <p>Array of records</p>
 * @param string $model <p>Table name in which you want to make changes</p>
 */
function insert_multiple_records($records, $model) {
  foreach ($records as $record) {
    insert_record($record, $model);
  }
}

