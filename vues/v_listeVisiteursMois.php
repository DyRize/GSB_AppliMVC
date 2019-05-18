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

    <?php if (!empty($lesVisiteurs)) { ?>

        <div class="col-md-4">
            <h3>
                Sélection d'un visiteur
            </h3>
        </div>

        <div class="col-md-4">
            <form action="index.php?uc=validerFrais&action=selectionnerMois"
                  method="post" 
                  role="form">

                <div class="form-group">
                    <label 
                        for="lstVisiteur" 
                        accesskey="n">
                        Visiteur : 
                    </label>

                    <!--Solution temporaire, Ajax de Monsieur Roche à mettre en oeuvre-->
                    <select 
                        id="lstVisiteur" 
                        name="lstVisiteur" 
                        class="form-control selectpicker" 
                        data-live-search="true"
                        onchange="if (this.value != 0) {
                                    this.form.submit();
                                }">

                        <option 
                            value=""
                            selected="selected"
                            disabled="disabled">
                        </option>

                        <?php
                        foreach ($lesVisiteurs as $unVisiteur) {
                            $id = $unVisiteur['id'];
                            $nom = $unVisiteur['nom'];
                            $prenom = $unVisiteur['prenom'];
                            if ($id == $leVisiteur) {
                                ?>

                                <option 
                                    value="<?php echo $id ?>" 
                                    selected="true">
                                        <?php echo $nom . ' ' . $prenom ?>
                                </option>

                                <?php
                            } else {
                                ?>

                                <option value="<?php echo $id ?>">
                                    <?php echo $nom . ' ' . $prenom ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </form>

            <form 
                action="index.php?uc=validerFrais&action=voirFicheFrais"
                method="post" 
                role="form">

                <div class="form-group">
                    <label 
                        for="lstMois" 
                        accesskey="n">
                        Mois : 
                    </label>

                    <!--Solution temporaire, Ajax de Monsieur Roche à mettre en oeuvre-->
                    <select 
                        id="lstMois" 
                        name="lstMois" 
                        class="form-control selectpicker" 
                        data-live-search="true"
                        onchange="if (this.value != 0) {
                                    this.form.submit();
                                }">

                        <option 
                            disabled="disabled" 
                            selected="selected"
                            value="">
                        </option>

                        <?php
                        foreach ($lesMois as $unMois) {
                            $mois = $unMois['mois'];
                            $numAnnee = $unMois['numAnnee'];
                            $numMois = $unMois['numMois'];
                            if ($mois == $leMois) {
                                ?>

                                <option 
                                    value="<?php echo $mois ?>"
                                    selected="true">
                                        <?php echo $numMois . '/' . $numAnnee ?>
                                </option>

                                <?php
                            } else {
                                ?>

                                <option value="<?php echo $mois ?>">
                                    <?php echo $numMois . '/' . $numAnnee ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
            </form>  
        </div>

        <?php
    } else {
        ?>

        <div 
            class="alert alert-warning" 
            role="alert">
            Aucun visiteur dans cette entreprise
        </div>

        <?php
    }
    ?>
</div>