<?php

/**
 * Gestion du Suivi du paiement des frais
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author    Réseau CERTA <contact@reseaucerta.org>
 * @author    José GIL <jgil@ac-nice.fr>
 * @copyright 2017 Réseau CERTA
 * @license   Réseau CERTA
 * @version   GIT: <0>
 * @link      http://www.reseaucerta.org Contexte « Laboratoire GSB »
 */
$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);

$lesVisiteurs = $pdo->getLesVisiteurs();

switch ($action) {
    case 'selectionnerVisiteur':
        include 'vues/v_listeVisiteurs.php';
        break;

    case 'voirFichesFrais':
        $_SESSION['lstVisiteur'] = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING);
        $leVisiteur = $_SESSION['lstVisiteur'];
        include 'vues/v_listeVisiteurs.php';
        $lesFicheDeFrais = $pdo->getLesFichesDeFrais($leVisiteur);
        include 'vues/v_paiementFrais.php';
        break;
    
    case 'rembourseFicheFrais':
        $leVisiteur = $_SESSION['lstVisiteur'];
        $mois = filter_input(INPUT_GET, 'mois', FILTER_SANITIZE_STRING);
        $montantValide = filter_input(INPUT_GET, 'montantValide', FILTER_SANITIZE_STRING);
        $pdo->majEtatFicheFraisMontant($leVisiteur, $mois, 'RB', $montantValide);
        ajouterModification('La Fiche de frais a été signalée comme remboursée');
        include 'vues/v_modifications.php';
        include 'vues/v_listeVisiteurs.php';
        $lesFicheDeFrais = $pdo->getLesFichesDeFrais($leVisiteur);        
        include 'vues/v_paiementFrais.php';
        break;
}