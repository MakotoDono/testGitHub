<h1>
    Test
</h1>

<p>
    <a href="<?php echo site_url(); ?>">accueil</a>
    <br />

    <a href="<?php echo site_url('test'); ?>">accueil</a> du test
    <br />

    <a href="<?php echo site_url('forum/bonjour/Jacques'); ?>">la première vue</a>
    <br />

    <a href="<?php echo site_url(array('test', 'secret')); ?>">page secrète</a>
</p>
