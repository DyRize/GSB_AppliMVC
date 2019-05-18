<?php
/**
 * Vue Liste des frais au forfait
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
?>
<div class="row">
    <h2>
        Suivi du Paiement des fiches de frais
    </h2>
    <div class="panel panel-warning filterable">
        <div class="panel-heading">
            <h3 class="panel-title">
                Fiches de frais
            </h3>
            <div class="pull-right">
                <button class="btn btn-default btn-xs btn-filter">
                    <span class="glyphicon glyphicon-filter">                        
                    </span> 
                    Filter
                </button>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr class="filters">
                    <th>
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="Mois" 
                            disabled>
                    </th>

                    <th>
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="Derniere Modification" 
                            disabled>
                    </th>

                    <th>
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="Montant Validé" 
                            disabled>
                    </th>

                    <th>
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="Justificatifs" 
                            disabled>
                    </th>

                    <th>
                        <input 
                            type="text" 
                            class="form-control" 
                            placeholder="Etat" 
                            disabled>
                    </th>

                    <th>
                        <input 
                            type="label" 
                            class="form-control" 
                            placeholder="Action" 
                            disabled>
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($lesFicheDeFrais as $uneFicheDeFrais) {
                    $idEtat = $uneFicheDeFrais['idEtat'];
                    $mois = $uneFicheDeFrais['mois'];
                    $dateModif = $uneFicheDeFrais['dateModif'];
                    $montantValide = $uneFicheDeFrais['montantValide'];
                    $nbJustificatifs = $uneFicheDeFrais['nbJustificatifs'];
                    $libelle = $uneFicheDeFrais['libEtat'];
                    ?>   

                    <tr>

                        <td>
                            <?php echo $mois ?>
                        </td>

                        <td>
                            <?php echo $dateModif ?>
                        </td>

                        <td>
                            <?php echo $montantValide . ' €' ?>
                        </td>

                        <td>
                            <?php echo $nbJustificatifs ?>
                        </td>

                        <td>
                            <?php echo $libelle ?>
                        </td>

                        <td>
                            <?php
                            if ($idEtat == 'VA') {
                                ?>
                                <a 
                                    href="index.php?uc=paiementFrais&action=rembourseFicheFrais&mois=<?php echo $mois ?>&montantValide=<?php echo $montantValide ?>" 
                                    onclick="return confirm('Cette fiche a-t-elle vraiment été remboursée?');">
                                    Signaler cette fiche comme remboursée
                                </a>
                                <?php
                            } elseif ($idEtat == 'CL') {
                                ?>
                                Veuillez d'abord valider cette fiche avant de pouvoir la signaler comme remboursée
                                <?php
                            } elseif ($idEtat == 'CR') {
                                ?>
                                Veuillez attendre la cloturation de cette fiche avant de pouvoir la valider
                                <?php
                            }
                            ?>
                        </td>
                    </tr>

                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>