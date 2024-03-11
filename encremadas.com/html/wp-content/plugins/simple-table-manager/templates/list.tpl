<div class="wrap">
<h2><?php print __( 'Simple Table Manager - List Table', 'simple-table-manager' ); ?></h2>

<?php
  if( ! $table_name ) {
    print '<p>' . __( 'No table selected. Please go to Settings and select a table.', 'simple-table-manager' ) . '</p>';
    print '<div class="stm_controls">'.PHP_EOL;
    print '<a href="'.$this->url['settings'].'" class="button button-secondary">' . __( 'Settings', 'simple-table-manager' ) . '</a>'.PHP_EOL;
    print '</div>'.PHP_EOL; // end stm_controls
    print '</div>'.PHP_EOL; // end wrap
    return;
  }
?>

<h3><?php print sprintf( __( 'Table: %s', 'simple-table-manager' ), $table_name ); ?></h3>

<?php
  if ( '' != $key_word ) {
    print '<div class="updated">';
    print '<p>';
    print sprintf( __( 'Found %1$s results for search term: "%2$s"', 'simple-table-manager' ), number_format( $total ), $key_word );
    print ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp';
    print '<a href="' . $this->url['list'] . '" class="button button-secondary">' . __( 'Exit Search', 'simple-table-manager' ) . '</a>';
    print '</p>';
    print '</div>';
  }
?>
  <div class="stm_controls">
    <a href="<?php print $this->url['add']; ?>" class="button button-secondary"><?php print __( 'Add new record', 'simple-table-manager' ); ?></a>&nbsp;&nbsp;
    <a href="<?php print $this->url['list']; ?>&#038export" class="button button-secondary"><?php print __( 'Export CSV', 'simple-table-manager' ); ?></a>&nbsp;&nbsp;
    <a href="<?php print $this->url['settings'] ?>" class="button button-secondary"><?php print __( 'Settings', 'simple-table-manager' ); ?></a>
  </div>

  <form method="post" action="<?php print $this->url['list'] ?>">
    <p class="search-box">
      <input type="search" name="search" placeholder="<?php print __( 'Search', 'simple-table-manager' ); ?> &hellip;" value="" />
    </p>
  </form>

  <?php if ( empty( $result ) ) { ?>
    <table class="wp-list-table widefat fixed"><tr><th><?php print __( 'No results found.', 'simple-table-manager' ); ?></th></tr></table>

  <?php } else { ?>
    <table class="wp-list-table widefat fixed">
    <thead>
    <th></th>
<?php
    // column names
    $condition = array( 'search' => $key_word );
    foreach ( $columns as $name => $type ) {
      $condition['orderby'] = $name;
      if ( $name == $order_by and 'ASC' == $order ) {
        print '<th scope="col" class="manage-column sortable asc">';
        $condition['order'] = 'DESC';
      } else {
        print '<th scope="col" class="manage-column sortable desc">';
        $condition['order'] = 'ASC';
      }
      print "<a href='" . $this->url['list'] . "&#038;" . http_build_query( $condition ) . "'>";
      print '<span>'.$name.'</span><span class="sorting-indicator"></span></a></th>';
    }
?>
    <tbody>
<?php
    foreach ( $result as $row ) {
      print '<tr>';
      foreach ( $row as $k => $v ) {
        if ( $k == $primary_key ) {
          print '<td class="nowrap"><a href="' . $this->url['edit'] . '&#038id=' . $v . '">' . __( 'Edit', 'simple-table-manager' ) . '</a></td>';
        }
        print '<td>' . htmlspecialchars( $v ) . '</td>';
      }
      print '</tr>';
    }
?>
    </tbody>
    </thead>
    </table>

    <div class="tablenav bottom">
    <span class="displaying-num"><?php print sprintf( __( 'Total %s records', 'simple-table-manager' ), number_format( $total ) ); ?></span>
    <div class="tablenav-pages">
    <span class='pagination-links'>
<?php
      // navigation
      if( ! isset( $orderby ) ) {
        $orderby = '';
        $order ='';
      }
      $condition = array( 'search' => $key_word, 'orderby' => $orderby, 'order' => $order );
      $qry = http_build_query( $condition );
      if ( 0 < $begin_row) {
        print '<a href="' . $this->url['list'] . '&#038beginrow=0&#038' . $qry . '" title="first page" class="first-page disabled button button-secondary">&laquo;</a>';
        print '<a href="' . $this->url['list'] . '&#038beginrow='. ( $begin_row - $this->rows_per_page ) . '&#038' . $qry . '" title="previous page" class="first-page disabled button button-secondary">&lsaquo;</a>';
      } else {
        print '<a title="first page" class="first-page disabled button button-secondary">&laquo;</a>';
        print '<a title="previous page" class="prev-page disabled button button-secondary">&lsaquo;</a>';
      }
      print "<span class='paging-input'> " . number_format($begin_row + 1) . " - <span class='total-pages'>" . number_format($next_begin_row) . " </span></span>";
      if ( $next_begin_row < $total ) {
        print '<a href="' . $this->url['list'] . '&#038beginrow='.$next_begin_row.'&#038' . $qry . '" title="next page" class="next-page button button-secondary">&rsaquo;</a>';
        print '<a href="' . $this->url['list'] . '&#038beginrow='.$last_begin_row.'&#038' . $qry . '" title="last page" class="last-page button button-secondary">&raquo;</a>';
      } else {
        print '<a title="next page" class="next-page disabled button button-secondary">&rsaquo;</a>';
        print '<a title="last page" class="last-page disabled button button-secondary">&raquo;</a>';
      }
?>
    </span>
    </div>
    <br class="clear" />
    </div>
  <?php } ?>
</div>