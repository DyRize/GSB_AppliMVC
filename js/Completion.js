function afficheMois(id)
{
//    parametres = construireParametres();
    //var xhr = new XMLHttpRequest();
    xhr = creationXHR();
//    var reponse;

    if (id == "") {
        var option = document.createElement('option');
        option.innerHtml = "";
        listeMoisSelect.appendChild(option);
        return;
    }

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var listeMois = JSON.parse(this.responseText);

            if (listeMois.length > 0) {
                listeMois.forEach(function (mois) {
                    var option = document.createElement('option');
                    option.innerHTML = mois['numMois'] + '/' + mois['numAnnee'];
                    option.value = mois['mois'];
                    listeMoisSelect.appendChild(option);
                });
            } else {
                //afficher "aucune fiche clotorée pour ce visiteur"
            }
        }
    }
    xhr.open("get", "index.php?uc=moisCloture&action=selectionnerMois&idVisiteur=" + id, true);
//    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send();
}

//var listeMoisSelect = document.getElementById("lstMois");
//listeMoisSelect.addEventListener("change", afficheMois(idVisiteur), false);


//function construireParametres() {
//    var lesCriteres = document.getElementsByTagName("select");
//    var test = false;
//    var i = 0;
//    // on va tester si au moins une liste déroulante a un critère autre que choisir (selectedIndex = 0 )
//    while (!test && i < lesCriteres.length)
//    {
//        if (lesCriteres[i].selectedIndex != 0)
//        {
//            test = true;
//        }
//        i++;
//    }
//    if (test)  // il y a au moins une liste qui contient un critère à chercher
//    {
//        document.getElementById("affichage").style.visibility = "visible"; // on affiche la div pour le résultat
//        var parametre = "";
//        for (var i = 0; i < lesCriteres.length; i++)
//        {
//            if (lesCriteres[i].selectedIndex != 0)
//            {
//                parametre += lesCriteres[i].name + "=" + lesCriteres[i].value + "&";
//            }
//        }
//        return parametre;
//    } else
//    {
//        document.getElementById("detailAffichage").innerHTML = "";  // on efface le détail de la div
//        document.getElementById("affichage").style.visibility = "hidden"; // on cache la div d'affichage des résultats
//    }
//}
//
//var chVille = document.getElementById("ville");
//chVille.addEventListener("change", ChargeDonnees, false);
//
//var chSexe = document.getElementById("sexe");
//chSexe.addEventListener("change", ChargeDonnees, false);
//
//var chidProjet = document.getElementById("idProjet");
//chidProjet.addEventListener("change", ChargeDonnees, false);