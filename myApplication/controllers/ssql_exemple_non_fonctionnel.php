<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->load->database(); //Dans le controlleur.

$resultat = $this->db->select('id, email')
                     ->from('utilisateurs')
                     ->where('pseudo', 'ChuckNorris')
                     ->limit(1)
                     ->get()
                     ->result(); //Une requête.

//	Mise en place de notre requête
$sql = "SELECT	`id`,
		`email`
	FROM	`utilisateurs`
	WHERE	`pseudo` = ?
	LIMIT	0,1
     ;";

// Les valeurs seront automatiquement échappées
$data = array('ChuckNorris');

//	On lance la requête
$query = $this->db->query($sql, $data);

//	On récupère le nombre de résultats
$nb_resultat = $query->num_rows();

//	On parcourt l'ensemble des résultats
foreach($query->result() as $ligne)
{
	echo $ligne->id;
}

//	On libère la mémoire de la requête (fortement conseillé pour lancer une seconde requête)
$query->free_result();