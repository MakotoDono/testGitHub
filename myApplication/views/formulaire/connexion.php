<?php echo validation_errors(); ?>

<?php echo form_open('connect'); ?>
<!--form method="post" action=""-->
    <label for="pseudo">Pseudo : </label>
    <input type="text" name="pseudo" id="pseudo" value="<?php echo set_value('pseudo'); ?>" />
    <?php echo form_error('pseudo'); ?>
    
    <label for="mdp">Mot de passe :</label>
    <input type="password" name="mdp" id="mdp" value="" />
    <?php echo form_error('mdp'); ?>
    
    <input type="submit" value="Envoyer" />
</form>

<p>
    <?php echo (($pseudo != '')? $pseudo : ''); ?><br />
    <?php echo (($mdp != '')? $mdp : ''); ?>
</p>