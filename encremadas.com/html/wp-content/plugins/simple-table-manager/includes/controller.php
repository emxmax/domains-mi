<?php

// Simple Table Manager

defined( 'ABSPATH' ) or die( 'Direct access is not permitted' );
  
/**
 * Controller Class
 *
 */
class Controller {

  private $model;
  private $rows_per_page;
  private $csv;
  private $slug;
  private $url;

  /**
     * Constructor - sets table variables and slugs
     *
     */
  public function __construct() {

    // get settings
    $this->rows_per_page = get_option( 'stm_rows_per_page' );
    $this->csv['file_name'] = get_option( 'stm_csv_file_name' );
    $this->csv['encoding']  = get_option( 'stm_csv_encoding' );
    $this->table_name = get_option( 'stm_table_name' );
    $this->base_slug = get_option( 'stm_base_slug' );

    // slugs
    $this->slug['list']     = $this->base_slug . '_list';
    $this->slug['add']      = $this->base_slug . '_add';
    $this->slug['edit']     = $this->base_slug . '_edit';
    $this->slug['settings'] = $this->base_slug . '_settings';
    $this->url['list']      = admin_url( 'admin.php?page=' . $this->slug['list'] );
    $this->url['edit']      = admin_url( 'admin.php?page=' . $this->slug['edit'] );
    $this->url['add']       = admin_url( 'admin.php?page=' . $this->slug['add'] );
    $this->url['settings']  = admin_url( 'admin.php?page=' . $this->slug['settings'] );

    // menu
    add_action( 'init', array( $this, 'export_csv' ) );
    add_action( 'admin_menu', array( $this, 'add_menu' ) );

    $this->model = new Model( $this->table_name );
    
  } // end function
      
  /**
     * Adds menus to left-hand sidebar
     *
     */
  public function add_menu() {
    // add_menu_page( page_title, menu_title, capability, menu_slug, callable_function, icon_url, position )
    add_menu_page( __( 'Simple Table Manager - List Table', 'simple-table-manager' ), __( 'Simple Table Manager', 'simple-table-manager' ), 'edit_posts', $this->slug['list'], array( $this, 'list_all' ) );
    // add_submenu_page( parent_slug, page_title, menu_title, capability, menu_slug, callable_function )
    add_submenu_page( null, __( 'Simple Table Manager - Add New Record', 'simple-table-manager' ), __( 'Add New Record', 'simple-table-manager' ), 'edit_posts', $this->slug['add'], array( $this, 'add_new' ) );
    add_submenu_page( null, __( 'Simple Table Manager - Edit Record', 'simple-table-manager' ), __( 'Edit Record', 'simple-table-manager' ), 'edit_posts', $this->slug['edit'], array( $this, 'edit' ) );
    add_submenu_page( null, __( 'Simple Table Manager - Settings', 'simple-table-manager' ), __( 'Settings', 'simple-table-manager' ), 'manage_options', $this->slug['settings'], array( $this, 'settings' ) );
  } // end function 
 
  /**
     * Top menu - Lists all data from table
     *
     */
  public function list_all() {

    if( ! $this->table_name ) {
      $table_name = '';
      $key_word = '';

    } else {
  
      // export csv via post
      $task_id = mt_rand();
      $_SESSION['export'] = $task_id;
  
      // key word search
      $key_word = "";
      if ( isset( $_POST['search'] ) ) {
        $key_word = $_POST['search'];
      }
      if ( isset( $_GET['search'] ) ) {
        $key_word = $_GET['search'];
      }
  
      $key_word = stripslashes_deep( $key_word );

      // order by
      $order_by = "";
      $order = "";
      if ( isset( $_GET['orderby'] ) ) {
        $order_by = $_GET['orderby'];
        $order = $_GET['order'];
      }
  
      // manage record quantity
      $begin_row = 0;
      if ( isset( $_GET['beginrow'] ) ) {
        if ( is_numeric( $_GET['beginrow'] ) ) {
          $begin_row = $_GET['beginrow'];
        }
      }
      $total = $this->model->count_rows( $key_word ); // count all data rows
      $next_begin_row = $begin_row + $this->rows_per_page;
      if ( $total < $next_begin_row ) {
        $next_begin_row = $total;
      }
      $last_begin_row = $this->rows_per_page * ( floor( ( $total - 1 ) / $this->rows_per_page ) );
  
      // stuff to display
      $table_name = $this->model->get_table_name();
      $primary_key = $this->model->get_primary_key();
      $columns = $this->model->get_columns();
      $result = $this->model->select( $key_word, $order_by, $order, $begin_row, $this->rows_per_page );
    
    }

    include( FILE_VIEW_LIST );
  } // end function


  /**
     * Add New data
     *
     */
  public function add_new() {

    $table_name = $this->model->get_table_name();
    $primary_key = $this->model->get_primary_key();
    $columns = $this->model->get_columns();
    $new_id = $this->model->get_new_candidate_id();
    
    include( FILE_VIEW_ADD );
  } // end function


  /**
     * Export data to csv file
     *
     */
  public function export_csv() {

    if ( isset( $_GET['export'] ) ) {

      // output contents
      header( "Content-Type: application/octet-stream" );
      header( "Content-Disposition: attachment; filename=" . $this->csv['file_name'] );

      // field names
      foreach ( $this->model->get_columns() as $name => $type ) {
        print( $name . DELMITER );
      }
      print( NEW_LINE );

      // data
      foreach ( $this->model->select_all() as $row ) {
        foreach ( $row as $k => $v ) {
          $str = preg_replace('/"/', '""', $v);
          print("\"" . mb_convert_encoding( $str, $this->csv['encoding'], 'UTF-8' )."\"" . DELMITER);
        }
        print( NEW_LINE );
      }
      exit;
    }
  } // end function

  /**
     * Edit data
     *
     */
  public function edit() {

    $message = "";
    $status = "";

    $id = isset( $_REQUEST['id'] ) ? $_REQUEST['id'] : '';
    
    // on update
    if ( isset($_POST['update'] ) ) {
      if ( $this->model->update( $_POST ) ) {
        $message = __( 'Record successfully updated', 'simple-table-manager' );
        $status = 'success';
      } else {
        $message = __( 'No rows were affected', 'simple-table-manager' );
        $status = 'error';
      }

    // on delete
    } else if( isset($_POST['delete'] ) ) {
      if ( $this->model->delete( $id ) ) {
        $message = __( 'Record successfully deleted', 'simple-table-manager' );
        $status = 'success';
      } else {
        $message = __( 'Error deleting record', 'simple-table-manager' );
        $status = 'error';
      }

    // on insert via add new page
    } else if( isset( $_POST['add'] ) ) {
      $id = $this->model->insert( $_POST );

      if ( '' != $id ) {
        $message = __( 'Record successfully inserted', 'simple-table-manager' );
        $status = 'success';
      } else {
        $message = __( 'Error inserting record', 'simple-table-manager' );
        $status = 'error';
      }
    }

    $table_name = $this->model->get_table_name();
    $primary_key = $this->model->get_primary_key();
    $columns = $this->model->get_columns();
    $row = $this->model->get_row( $id );

    include( FILE_VIEW_EDIT );
  } // end function

  /**
     * Configuration page
     *
     */
  public function settings() {

    $status = '';
    $message = '';

    if( isset( $_POST['apply'] ) ) {
      // update settings

      // check table validity
      $message = $this->model->validate( $_POST['table_name'] );
      if ( '' != $message ) {
        $status = 'error';
      } else {

        // get new settings
        $table_name = $_POST['table_name'];
      
        $rows_per_page = (int) $_POST['rows_per_page'];
        if( $rows_per_page < 1 ) {
          $rows_per_page = 1;
        }
        $csv_file_name = $_POST['csv_file_name'];
        $csv_encoding = $_POST['csv_encoding'];

        // update settings
        update_option( 'stm_table_name', $table_name );
        update_option( 'stm_rows_per_page', $rows_per_page );
        update_option( 'stm_csv_file_name', $csv_file_name );
        update_option( 'stm_csv_encoding', $csv_encoding );

        $message = __( 'Settings successfully changed', 'simple-table-manager' );
        $status = 'success';
      }
    }
    
    if ( isset( $_GET['restore'] ) ) {
      update_option( 'stm_table_name', '' );
      update_option( 'stm_rows_per_page', 20 );
      update_option( 'stm_csv_file_name', 'export.csv' );
      update_option( 'stm_csv_encoding', 'UTF-8' );
      $message = __( 'Default settings successfully restored', 'simple-table-manager' );
      $status = 'success';
    }

    // get settings
    $this->rows_per_page = get_option( 'stm_rows_per_page' );
    $this->csv['file_name'] = get_option( 'stm_csv_file_name' );
    $this->csv['encoding']  = get_option( 'stm_csv_encoding' );
    $this->table_name = get_option( 'stm_table_name' );
    
    $this->model = new Model( $this->table_name );    
    $table_name = $this->model->get_table_name();
    $table_options = $this->model->get_table_options();

    include( FILE_VIEW_SETTINGS );
  } // end function

} // end class