<?php

/**
 * buildings.php
 *
 * @version 1.0
 * @copyright 2009 by Dr.Isaacs f�r XNova-Germany
 * http://www.xnova-germany.org
 */

define('INSIDE'  , true);
define('INSTALL' , false);

$rocketnova_root_path = './';
include($rocketnova_root_path . 'extension.inc');
include($rocketnova_root_path . 'common.' . $phpEx);

	includeLang('buildings');
	
// Schutz vor unregestrierten
if ($IsUserChecked == false) {
	includeLang('login');
	message($lang['Login_Ok'], $lang['log_numbreg']);
}

	// Mise a jour de la liste de construction si necessaire
	UpdatePlanetBatimentQueueList ( $planetrow, $user );
	$IsWorking = HandleTechnologieBuild ( $planetrow, $user );

	switch ($_GET['mode']) {
		case 'fleet':
			// --------------------------------------------------------------------------------------------------
			FleetBuildingPage ( $planetrow, $user );
			break;

		case 'research':
			// --------------------------------------------------------------------------------------------------
			ResearchBuildingPage ( $planetrow, $user, $IsWorking['OnWork'], $IsWorking['WorkOn'] );
			break;

		case 'defense':
			// --------------------------------------------------------------------------------------------------
			DefensesBuildingPage ( $planetrow, $user );
			break;
		default:
			// --------------------------------------------------------------------------------------------------
			BatimentBuildingPage ( $planetrow, $user);
			break;
	}

// -----------------------------------------------------------------------------------------------------------
// History version
// 1.0 - Nettoyage modularisation
// 1.1 - Mise au point, mise en fonction pour lin�arisation du fonctionnement
// 1.2 - Liste de construction batiments
?>
