<h1>
    Test
</h1>

<p>
    <?php echo $user_info['auteur'];?> <br />
    <?php echo $user_info['date'];?> <br />
    <?php echo $user_info['email'];?> <br />
    <?php
    //	On parcourt l'ensemble des résultats
    foreach($resultat as $ligne) {
        echo $ligne->id . ' --> ' . $ligne->auteur . ' ' . $ligne->titre . ' ' . $ligne->contenu . ' ' . date('d/m/Y H:i:s', strtotime($ligne->date_ajout)) . ' ' . date('d/m/Y H:i:s', strtotime($ligne->date_modif)) . '<br />';
    }
    ?>
    nb news  : <?php echo $nb_news; ?> <br />
    bob news : <?php echo $nb_news_de_bob; ?> <br />
    <?php var_dump($var_dump); ?>
    
</p>
