<?php
/**
 * Vue Erreurs
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
<div class="alert alert-success cacheSucess" role="alert">
    <?php
    foreach ($_REQUEST['modifications'] as $modification) {
        echo '<p>' . htmlspecialchars($modification) . '</p>';
    }
    ?>
</div>
