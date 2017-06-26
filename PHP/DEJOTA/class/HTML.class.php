<?php
class HTML {

  public static function img($src, $alt='img', $atribute='') {
    echo '<img '.$atribute.' src="'.$src.'" alt="'.$alt.'">';
  }

  public static function a($value, $href, $atribute='') {
    echo '<a '.$atribute.' href="'.$href.'">'.$value.'</a>';
  }

  public static function label($value, $for, $atribute='') {
    echo '<label '.$atribute.' for="'.$for.'">'.$value.'</label>';
  }

  //precisa atencao
  public static function input($name, $atribute='', $type='text', $value='') {
    echo '<input type="'.$type.'" name="'.$name.'" value="'.$value.'">';
  }




}
?>
<!-- PROBLEMAS -->

<!-- <input type="text" name="" value=""> -->

<!-- <select class="" name="">
  <option value=""></option>
  <optgroup label="CASA">
    <option value="limo">Limo</option>
    <option value="quixa">quixa</option>
  </optgroup>
  <optgroup label="facu">
    <option value="ifce">IFCE</option>
    <option value="cato">cato</option>
  </optgroup>
</select> -->
