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

function desactiver_boutons() {
    var boutons = document.getElementsByClassName('bouton');
    for (var i = 0; i < boutons.length; i++) {
        boutons[i].disabled = true;
        boutons[i].style.cursor = 'default';
    }
}
  
function activer_boutons() {
    var boutons = document.getElementsByClassName('bouton');
    for (var i = 0; i < boutons.length; i++) {
        boutons[i].disabled = false;
        boutons[i].style.cursor = 'pointer';
    }
}

function fond_clair() {
    var liens_menu = document.getElementsByClassName('lien_menu');
    for (var i = 0; i < liens_menu.length; i++) {
        liens_menu[i].addEventListener('mouseover', function() {
            this.style.background ='#7890cd';
        });
    }
}

function fond_fonce() {
    var liens_menu = document.getElementsByClassName('lien_menu');
    for (var i = 0; i < liens_menu.length; i++) {
        liens_menu[i].addEventListener('mouseover', function() {
            this.style.background ='#2a3990';
        });
        liens_menu[i].addEventListener('mouseout', function() {
            this.style.background ='#7890cd';
        });
    }
}