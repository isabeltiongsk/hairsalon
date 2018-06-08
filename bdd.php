<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=calendar', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
