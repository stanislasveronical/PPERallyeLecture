<?php echo validation_errors(); ?>
<?php echo form_open_multipart('Livre/Add'); ?>
<div>Titre      : <input type="text" name="titre" value="<?php echo $this->input->post('titre'); ?>" /></div>
<!--<div>Couverture : <input type="text" name="couverture" value="<?php //echo ($this->input->post('couverture') ? $this->input->post('couverture') : $livre['couverture']); ?>" /></div>-->

<div>Couverture : <input type="file" name="couverture" value="" /></div>

<div>Auteur     :<?php $comboBoxAuteur->Render(); ?></div>
<div>Editeur    :<?php $comboBoxEditeur->Render(); ?></div>
<div>Quizz      :<?php $comboBoxQuizz->Render(); ?></div>
<div><img src="<?php echo base_url('img/'.($this->input->post('couverture'))) ?>" alt="" height="100" width="100" ></div>
<button type="submit">Sauvegarder</button>
<?php echo form_close(); ?>
<?php echo $this->input->post('couverture'); ?>