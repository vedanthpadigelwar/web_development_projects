<?php $col_width = (int)((float)$cols/100.00); ?>
<div class="mngl-user-grid">
  <table width="100%" class="mngl-user-grid-table">
    <?php
      for ($i=0; $i < $rows; $i++) { 
        ?>
          <tr>
            <?php
            for ($j=0; $j < $cols; $j++) { 
              $user_index = ($i * $cols) + $j;
              
              if($user_index >= $user_count)
                break;

              $user = $users[$user_index];
              $avatar = $user->get_avatar(50);
              ?>
                <td width="50px" style="max-width: 50px;" valign="top"><center><div class="mngl-grid-cell" rel="<strong><?php echo $user->full_name; ?></strong><br/><?php echo $user->full_name; ?>"><?php echo $avatar; ?></div></center></td>
              <?php
            }
            ?>
          </tr>
        <?php
      }
    ?>
  </table>
</div>
