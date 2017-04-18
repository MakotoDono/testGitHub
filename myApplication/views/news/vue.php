<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<h1>Bonjour</h1>

<p>
    Ceci est mon paragraphe !
</p>

<p>
    Votre pseudo est <?php echo $pseudo; ?>.
</p>

<p>
    Votre email est <?php echo $email; ?>.
</p>

<p>
<?php if($en_ligne): ?>
    Vous êtes en ligne.
<?php else: ?>
    Vous n'êtes pas en ligne.
<?php endif; ?>
</p>

<p>
    <?php url('Déconnexion', 'news', 'deconnexion'); ?>
</p>

<p>
    Id de la session : <?php echo $session_id; ?>.<br />
    adresse ip       : <?php echo $adresse_ip; ?>.<br />
    navigateur       : <?php echo $user_agent_du_navigateur; ?>.<br />
    visite le        : <?php echo $derniere_visite; ?>.<br />
    votre pseudo     : <?php echo $pseudo; ?>.
</p>
