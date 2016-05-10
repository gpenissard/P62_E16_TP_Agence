<?php
/**
 * Tableau principal des données du site
 * Les clefs des items sont leurs "id" (un numéro)
 * (suivant le projet) Chaque item doit contenir au minimum les champs suivants
 * - nom
 * - categorie
 * - etc
 */

/* Tableau des catégories */
$categories = array(
    0 => 'aventure',
    1 => 'science-fiction',
    2 => 'sport',
    5 => 'jardinage',
);

/* Tableau des items (produits, livres, forfaits, etc) */
$data = array(
    0 => array(
        'nom' => 'Trekking',
        'categorie' => 0,
        'prix' => 1899.99,
        'photo' => 'toto.jpg',
        'dans_carousel' => true,
    ),
    1 => array(
        'nom' => 'Robots',
        'categorie' => 1,
        'prix' => 489.99,
        'photo' => 'kiki.jpg',
        'dans_carousel' => false,
    ),
    2 => array(
        'nom' => 'Football',
        'categorie' => 2,
        'prix' => 88.00,
        'photo' => 'foot.jpg',
        'dans_carousel' => true,
    ),
    3 => array(
        'nom' => 'Androides',
        'categorie' => 1,
        'prix' => 125.99,
        'photo' => 'androides.jpg',
        'dans_carousel' => true,
    ),
);