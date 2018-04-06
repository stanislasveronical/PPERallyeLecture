<?php echo validation_errors(); ?>
<?php echo form_open('Account/Create'); ?>

<label for="nom">Nom :</label>
<input type="text" name="nom" value="<?php echo $this->input->post('nom'); ?>"/><br/>

<label for="prenom">Prenom :</label>
<input type="text" name="prenom" value="<?php echo $this->input->post('prenom'); ?>"/><br/>

<label for="login">Votre Email :</label>
<input type="text" name="login" value="<?php echo $this->input->post('login'); ?>"/><br/>

<label for="password">Mot de passe :</label>
<input type="password" name="password"/><br/>

<label for="passwordConfirmation">Confirmez le mot de passe :</label>
<input type="password" name="passwordConfirmation"/><br/>

<br/><?php echo $this->aauth->generate_recaptcha_field(); ?><br/>

<button type="submit">Créez votre compte</button>
<?php echo form_close(); ?>
