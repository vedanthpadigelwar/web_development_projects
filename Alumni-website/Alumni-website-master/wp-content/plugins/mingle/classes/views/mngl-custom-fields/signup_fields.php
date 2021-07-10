<?php
if(isset($fields) and !empty($fields) and is_array($fields))
{
  foreach($fields as $field)
  {
    ?>
      <p>
          <?php MnglCustomFieldsHelper::custom_field($field, '', 'input mngl_signup_input'); ?>
        
      </p>  
    <?php
  }
}
?>