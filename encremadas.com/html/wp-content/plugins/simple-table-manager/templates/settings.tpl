<div class="wrap">
<h2><?php print __( 'Simple Table Manager - Settings', 'simple-table-manager' ); ?></h2>
<h3><?php print sprintf( __( 'Table: %s', 'simple-table-manager' ), $table_name ); ?></h3>
  
<?php 
  if ( 'error' == $status ) {
    print '<div class="error"><p>' . $message . '</p></div>';
  } else if ( 'success' == $status ) {
    print '<div class="updated"><p>' . $message . '</p></div>';
  }
?>
  <div class="stm_controls">
  <a href="<?php print $this->url['list'] . '" class="button button-secondary">' . __( 'Return to list', 'simple-table-manager' ); ?></a>&nbsp;&nbsp;
  <a href="<?php print $this->url['settings']; ?>&#038restore" class="button button-secondary"><?php print __( 'Restore default settings', 'simple-table-manager' ); ?></a>
  </div>
    
    <form method="post" name="settings" action="<?php print $this->url['settings'] ?>">
    <table class="wp-list-table widefat fixed">
    
    <tr><th class="simple-table-manager"><? print __( 'Table name', 'simple-table-manager' ); ?></th><td><select name="table_name">   
<?php
  foreach ( $table_options as $v ) {
    if ( $table_name == $v ) {
      print '<option value="' . $v . '" selected>' . $v . '</option>'.PHP_EOL;
    } else {
      print '<option value="' . $v . '">' . $v . '</option>'.PHP_EOL;
    }
  }
?>
    </select>
    <br />
    <span class="stm_help"><?php print __( 'Only one primary key must be set at first column', 'simple-table-manager' ); ?></span></td></tr>

    <tr><th class="simple-table-manager"><?php print __( 'Max rows on page', 'simple-table-manager' ); ?></th><td><input type='number' name='rows_per_page' value='<?php print $this->rows_per_page ?>'/></td></tr>
    <tr><th class="simple-table-manager"><?php print __( 'CSV file name', 'simple-table-manager' ); ?></th><td><input type='text' name='csv_file_name' value='<?php print $this->csv['file_name'] ?>'/></td></tr>
    <tr><th class="simple-table-manager"><?php print __( 'CSV encoding', 'simple-table-manager' ); ?></th><td><input type='text' name='csv_encoding' value='<?php print $this->csv['encoding'] ?>'/></td></tr>

    </table>
    <div class="tablenav bottom">
    <input type="submit" name="apply" value="<?php print __( 'Apply Changes', 'simple-table-manager' ); ?>" class="button button-primary" />&nbsp;
    </div>
    </form>
    </div>

</div>
