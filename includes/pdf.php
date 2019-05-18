<?php

require('pdf/fpdf.php');

class PDF extends FPDF
{

// En-tête
    function Header() {
        // Logo
        $this->Image('images/logo.jpg', 90, 30, 30);
        // Saut de ligne
        $this->Ln(55);
    }

    function retourneMois($numMois, $numAnnee) {
        $listeMois = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        $mois = $listeMois[$numMois - 1] . ' ' . $numAnnee;
        $mois = utf8_decode($mois);
        return $mois;
    }

    function Body($numMois, $numAnnee, $idVisiteur, $prenomVisiteur, $nomvisiteur, $lesFraisForfait, $lesFraisHorsForfait, $totalFiche, $dateModif) {
        $this->SetLeftMargin(20);
        $this->SetFont('Times', 'B', 13.5);
        $this->SetTextColor(31, 73, 125);
        $this->Cell(170, 5, 'REMBOURSEMENT DE FRAIS ENGAGES', 1, 0, 'C');
        $this->Ln();

        $this->Ln();
        $this->SetLeftMargin(30);
        $this->SetFont('Times', '', 11);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(5, 15, 'Visiteur', 0, 0);
        $this->SetLeftMargin(80);
        $this->Cell(5, 15, $idVisiteur, 0, 0);
        $this->SetLeftMargin(130);
        $visiteur = $prenomVisiteur . ' ' . strtoupper($nomvisiteur);
        $this->Cell(5, 15, $visiteur, 0, 0);
        $this->Ln();
        $this->SetX(0);
        $this->SetLeftMargin(30);
        $this->Cell(5, 0, 'Mois', 0, 1);
        $this->SetLeftMargin(80);
        $mois = $this->retourneMois($numMois, $numAnnee);
        $this->Cell(5, 0, $mois, 0, 0);
        $this->Ln(10);
        // Header Frais Forfaitaires
        $this->SetX(0);
        $this->SetLeftMargin(30);
        $this->SetFont('Times', 'IB', 11);
        $this->SetTextColor(31, 73, 125);
        $this->SetDrawColor(31, 73, 125);
        $this->Cell(50, 10, 'Frais Forfaitaires', 'LTB', 0, 'C');
        $this->Cell(30, 10, utf8_decode('Quantité'), 'TB', 0, 'C');
        $this->Cell(50, 10, 'Montant Unitaire', 'TB', 0, 'C');
        $this->Cell(20, 10, 'Total', 'TBR', 1, 'C');
        $this->SetFont('Times', '', 11);
        $this->SetTextColor(0, 0, 0);
        foreach ($lesFraisForfait as $unFraisForfait) {
            $libelle = $unFraisForfait['libelle'];
            $quantite = $unFraisForfait['quantite'];
            $montant = $unFraisForfait['montant'];
            $total = $quantite * $montant;
            $this->Cell(50, 5, utf8_decode($libelle), 'LTBR', 0, 'L');
            $this->Cell(30, 5, $quantite, 'TBR', 0, 'R');
            $this->Cell(50, 5, $montant, 'TBR', 0, 'R');
            $this->Cell(20, 5, $total, 'TBR', 1, 'R');
        }
        
        // Autres Frais        
        $this->SetFont('Times', 'IB', 11);
        $this->SetTextColor(31, 73, 125);
        $this->Cell(150, 15, 'Autres Frais', 'LBR', 1, 'C');
        // Header Frais Hors Forfait
        $this->Cell(50, 10, 'Date', 'LB', 0, 'C');
        $this->Cell(80, 10, utf8_decode('Libellé'), 'B', 0, 'C');
        $this->Cell(20, 10, 'Montant', 'BR', 1, 'C');
        
        $hauteurCadre = 110;
        
        // Frais hors forfait
        $this->SetFont('Times', '', 11);
        $this->SetTextColor(0, 0, 0);
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $hauteurCadre += 5;
            $date = $unFraisHorsForfait['date'];
            $libelle = $unFraisHorsForfait['libelle'];
            $montant = $unFraisHorsForfait['montant'];
            $this->Cell(50, 5, $date, 'LBR', 0, 'L');
            $this->Cell(80, 5, utf8_decode($libelle), 'BR', 0, 'L');
            $this->Cell(20, 5, $montant, 'BR', 1, 'R');
        }
        $this->Ln(10);

        // Total
        $this->SetLeftMargin(110);
        $libelleTotal = 'TOTAL ' . $numMois . '/' . $numAnnee;
        $this->Cell(50, 10, $libelleTotal, 'LTBR', 0, 'L');
        $this->Cell(20, 10, $totalFiche, 'TBR', 1, 'R');

        $this->SetDrawColor(0, 0, 0);
        $this->Rect(20, 70, 170, $hauteurCadre);
        $this->Ln(30);
        
        $this->SetFont('Times', '', 12);
        $jourFooter = substr($dateModif, 0, 2);
        $moisFooter = substr($dateModif, 3, 2);
        $anneeFooter = substr($dateModif, 6, 4);
        $dateFooter = $jourFooter . ' ' . $this->retourneMois($moisFooter, $anneeFooter);
        $libelleDateFooter = 'Fait à Paris, le ' . $dateFooter;
        $this->Cell(70, 10, utf8_decode($libelleDateFooter), 0, 1, 'L');
        $this->Cell(70, 10, 'Vu l\'agent comptable', 0, 1, 'L');
        $this->SetX(100);
        $this->Image('images/signatureComptable.png');
    }
}
?>