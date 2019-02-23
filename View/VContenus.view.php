<?php
/**
 * Affichage du contenu
 */
class VContenus
{
  public function __construct() {}
  public function __destruct() {}

    /**
     * Affichage du contenu
     * @param array données du contenu
     *
     * @return
     */
  public function showContenu($_data)
  {
    $titre = $_data['CONTENU']['TITRE'];
    $texte = nl2br($_data['CONTENU']['PARAGRAPHE']);
    
    echo <<<HERE
    <h1>$titre</h1>
    <p>$texte</p>
HERE;

    $i = 0;
    echo '<table>';

    foreach ($_data['IMAGES'] as $val)
    {
      if (!$i) echo '<tr>';
      
      echo '<td><img src="../Upload/'.$val['IMAGE'].'" alt="" /></td>';
      
      ++$i;
      
      if (3 == $i)
      {
          $i = 0;
          echo '</tr>';
      }
    }
    echo '</table>';
    
  } // showContenu($_data)

  /**
   * Affichage du formulaire des images
   * @param array données des images
   *
   * @return
   */
  public function showFormImage($_data)
  {
      $options = '' ;
      $nbrTheme = 0 ;

      foreach ($_data as $val)
      {
          $options .= '<option value="'.$val['ID_THEME'].'">'.$val['THEME'].'</option>';
          $nbrTheme ++ ;
      }

      echo <<<HERE
<form action="../Php/index.php?EX=insert_image" method="post" enctype="multipart/form-data">
 <fieldset>
  <legend>Formulaire Image</legend>
  <p>
   <label for="image">Image</label>
   <input id="image" name="IMAGE" type="file" />
  </p>
  <p>
   <label>Thèmes</label>
   <select name="ID_THEME[]" size=$nbrTheme multiple="multiple">
    $options
   </select>
  <p class="submit">
   <input type="submit" value="Ok" />
  </p>
 </fieldset>
</form>
HERE;
      
  } // showFormImage($_data)
  
} // VContenus
