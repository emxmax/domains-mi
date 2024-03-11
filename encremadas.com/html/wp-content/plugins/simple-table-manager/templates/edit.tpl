<div class='wrap'>
<h2><?php print __( 'Simple Table Manager - Edit Record', 'simple-table-manager' ); ?></h2>
<h3><?php print sprintf( __( 'Table: %s', 'simple-table-manager' ), $table_name ); ?></h3>

<?php
  switch ( $status ) {
    case 'error':
      print '<div class="error"><p>'.$message.'</p></div>';
      break;
    case 'success':
      print '<div class="updated"><p>'.$message.'</p></div>';
      break;
    default:
  }
?>

  <div class='stm_controls'>
    <a href="<?php print $this->url['list'] ?>" class="button button-secondary"><?php print __( 'Return to list', 'simple-table-manager' ); ?></a>&nbsp;&nbsp;
    <a href="<?php print $this->url['settings'] ?>" class="button button-secondary"><?php print __( 'Settings', 'simple-table-manager' ); ?></a>
  </div>

<?php if ( !empty( $row ) ) { ?>
    <form method="post" action="<?php print $this->url['edit'] ?>">
    <table class="wp-list-table widefat fixed">
<?php
    foreach ( $row as $name => $value ) {
      if ( $name == $primary_key ) {
        // print '<tr><th class="simple-table-manager">'.$name.' *</th><td>' . data_type2html_input( $columns[$name], $name, $value ) . '</td></tr>';
        print '<tr>';
        print '<th>'.$name.' *</th>';
        print '<td><input type="text" readonly="readonly" name="'.$name.'" value="'.$value.'"/></td>';
        print '</tr>'.PHP_EOL;
      } else {
        print '<tr>';
        print '<th>'.$name.'</th>';
        print '<td>' . data_type2html_input( $columns[$name], $name, $value ) . '</td>';
        print '</tr>'.PHP_EOL;
      }
    }
?>
    </table>
    <div class="tablenav bottom">
      <input type="submit" name="update" value="<?php print __( 'Update', 'simple-table-manager' ); ?>" class="button button-primary">&nbsp;
      <input type="submit" name="delete" value="<?php print __( 'Delete', 'simple-table-manager' ); ?>" class="button button-primary" onclick="return confirm( <?php print __( 'Are you sure you want to delete this record?', 'simple-table-manager' ); ?> )">
    </div>
    <input type="hidden" name="id" value="<?php print $id ?>">
    </form>
<?php } ?>
</div>