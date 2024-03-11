<div class="wrap">
<h2><?php print __( 'Simple Table Manager - Add New Record', 'simple-table-manager' ); ?></h2>
<h3><?php print sprintf( __( 'Table: %s', 'simple-table-manager' ), $table_name ); ?></h3>

  <div class="stm_controls">
  <a href="<?php print $this->url['list'] ?>" class="button button-secondary"><?php print __( 'Return to list', 'simple-table-manager' ); ?></a>&nbsp;&nbsp;
  <a href="<?php print $this->url['settings'] ?>" class="button button-secondary"><?php print __( 'Settings', 'simple-table-manager' ); ?></a>
  </div>

  <form method="post" action="<?php print $this->url['edit'] ?>">
    <table class="wp-list-table widefat fixed">
<?php
    foreach ( $columns as $name => $type ) {
      if ( $name == $primary_key ) {
        print '<tr>';
        print '<th>'.$name.' *</th>';
        print '<td>' . data_type2html_input( $columns[$name], $name, $new_id ) . '</td>';
        print '</tr>'.PHP_EOL;
      } else {
        print '<tr>';
        print '<th>'.$name.'</th>';
        print '<td>' . data_type2html_input( $columns[$name], $name, '' ) . '</td>';
        print '</tr>'.PHP_EOL;
      }
    }
?>
    </table>
    <div class="tablenav bottom">
    <input type="submit" name="add" value="<?php print __( 'Add record', 'simple-table-manager' ); ?>" class="button button-primary">
    </div>
  </form>
</div>