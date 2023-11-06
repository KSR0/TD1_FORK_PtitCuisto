function Openbar() {
    document.querySelector('.sidebar').classList.toggle('left-[-300px]')
}

function bouton_edito() {
    window.location.href = 'edito.php';
}

function bouton_recette() {
    window.location.href = 'recette.php';
}

function bouton_detail_recette() {
    window.location.href = 'detail_recette.php';
}

function bouton_creation_recette() {
    window.location.href = 'creation_recette.php';
}

function bouton_modification_recette() {
    window.location.href = 'modification_recette.php';
}

function bouton_creation_compte() {
    window.location.href = 'creation_compte.php';
}

function bouton_mon_compte() {
    window.location.href = 'mon_compte.php';
}

function bouton_modification_compte() {
    window.location.href = 'modification_compte.php';
}

function bouton_connexion_compte() {
    window.location.href = 'connexion_compte.php';
}


function desactiver_div() {
    var div = document.getElementsByClassName('modif_div');
    for (var i = 0; i < div.length; i++) {
        div[i].disabled = true;
        div[i].style.cursor = 'default';
        div[i].onclick = null;
    }
}
  
function activer_div() {
    var div = document.getElementsByClassName('modif_div');
    for (var i = 0; i < div.length; i++) {
        div[i].disabled = false;
        div[i].style.cursor = 'pointer';
    }
}

function activer_filtre_deroulant() {
    var div = document.getElementsByClassName('filtre_deroulant');
    for (var i = 0; i < div.length; i++) {
        div[i].onclick = function() {
            dropDown(this);
        };
    }
}

function activer_bouton_mobile() {
    var div = document.getElementsByClassName('bouton_menu_mobile');
    for (var i = 0; i < div.length; i++) {
        div[i].onclick = function() {
            Openbar(this);
        };
    }
}

function activer_modale_categorie() {
    var div = document.getElementsByClassName('modale_categorie');
    for (var i = 0; i < div.length; i++) {
        div[i].onclick = function() {
            desactiver_div();
            fond_clair();
            ouvrir_modale(1);
            activer_div();
            activer_filtre_deroulant();
            activer_bouton_mobile();
            fond_fonce();
            activer_modale_categorie();
            activer_modale_titre();
            activer_modale_ingredients()
        };
    }
}

function activer_modale_titre() {
    var div = document.getElementsByClassName('modale_titre');
    for (var i = 0; i < div.length; i++) {
        div[i].onclick = function() {
            desactiver_div();
            fond_clair();
            ouvrir_modale(2);
            activer_div();
            activer_filtre_deroulant();
            activer_bouton_mobile();
            fond_fonce();
            activer_modale_categorie();
            activer_modale_titre();
            activer_modale_ingredients()
        };
    }
}

function activer_modale_ingredients() {
    var div = document.getElementsByClassName('modale_ingredients');
    for (var i = 0; i < div.length; i++) {
        div[i].onclick = function() {
            desactiver_div();
            fond_clair();
            ouvrir_modale(3);
            activer_div();
            activer_filtre_deroulant();
            activer_bouton_mobile();
            fond_fonce();
            activer_modale_categorie();
            activer_modale_titre();
            activer_modale_ingredients()
        };
    }
}

function fond_clair() {
    var div = document.getElementsByClassName('modif_div_couleur');
    for (var i = 0; i < div.length; i++) {
        div[i].addEventListener('mouseover', function() {
            this.style.background ='#7890cd';
        });
    }
}

function fond_fonce() {
    var div = document.getElementsByClassName('modif_div_couleur');
    for (var i = 0; i < div.length; i++) {
        div[i].addEventListener('mouseover', function() {
            this.style.background ='#2a3990';
        });
        div[i].addEventListener('mouseout', function() {
            this.style.background ='#7890cd';
        });
    }
}