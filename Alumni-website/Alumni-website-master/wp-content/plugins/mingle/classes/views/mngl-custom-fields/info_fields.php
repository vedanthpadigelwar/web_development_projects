<?php

if(isset($fields) and !empty($fields) and is_array($fields))
{
  foreach($fields as $field)
  {
    $field_value = $mngl_custom_field->get_value( $user_id, $field['id'] );

    ?>
        <p class=""><?php echo stripslashes($field_value->value); ?></p>
    <?php
  }
}
?>
