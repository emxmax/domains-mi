<?php

// Simple Table Manager

defined( 'ABSPATH' ) or die( 'Direct access is not permitted' );
  
if ( ! function_exists( 'write_log' ) ) {
  function write_log ( $log )  {
    if ( true === WP_DEBUG ) {
      if ( is_array( $log ) || is_object( $log ) ) {
        error_log( print_r( $log, true ) );
      } else {
        error_log( $log );
      }
    }
  } // end function
}

function data_type2html_input( $type, $name, $value ) {
  switch ( $type ) {
    // numeric
    case 'int':
    case 'real':
    case '3':
    case '8':
      return '<input type="number" name="'.$name.'" value="'.$value.'" />';

    // date
    case 'date':
    case '10':
      return '<input type="date" name="'.$name.'" value="'.$value.'" />';

    case 'time':
    case '11':
      return '<input type="time" name="'.$name.'" value="'.$value.'" />';

    case 'datetime':
    case 'timestamp':
    case '7':
    case '12':
      return '<input type="text" name="'.$name.'" value="'.$value.'" />';
      // return "<input type='datetime-local' name='$name' value='$value'/>";

    // long text
    case 'blob':
    case '252':
      return '<textarea name="'.$name.'">'.$value.'</textarea>';
    default:
      // default: text
      return '<input type="text" name="'.$name.'" value="' . htmlspecialchars( $value, ENT_QUOTES ) . '" />';
  }
} // end function
