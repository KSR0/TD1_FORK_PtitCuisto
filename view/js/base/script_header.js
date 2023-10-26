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


function desactiver_sous_menu() {
    var div = document.getElementsByClassName('element_menu');
    for (var i = 0; i < div.length; i++) {
        div[i].disabled = true;
        div[i].style.cursor = 'default';
    }
}
  
function activer_sous_menu() {
    var div = document.getElementsByClassName('element_menu');
    for (var i = 0; i < div.length; i++) {
        div[i].disabled = false;
        div[i].style.cursor = 'pointer';
    }
}

function desactiver_sous_menu_deroulant() {
    var div = document.getElementsByClassName('element_menu_deroulant');
    for (var i = 0; i < div.length; i++) {
        div[i].style.cursor = 'default';
        div[i].onclick = null;
    }
}

function activer_sous_menu_deroulant() {
    var div = document.getElementsByClassName('element_menu_deroulant');
    for (var i = 0; i < div.length; i++) {
        div[i].style.cursor = 'pointer';
        div[i].onclick = function() {
            dropDown(this);
        };
    }
}

function desactiver_bouton_mobile() {
    var div = document.getElementsByClassName('bouton_menu_mobile');
    for (var i = 0; i < div.length; i++) {
        div[i].style.cursor = 'default';
        div[i].onclick = null;
    }
}

function activer_bouton_mobile() {
    var div = document.getElementsByClassName('bouton_menu_mobile');
    for (var i = 0; i < div.length; i++) {
        div[i].style.cursor = 'pointer';
        div[i].onclick = function() {
            Openbar(this);
        };
    }
}

function desactiver_logo_menu() {
    var div = document.getElementsByClassName('logo_menu');
    for (var i = 0; i < div.length; i++) {
        div[i].disabled = true;
        div[i].style.cursor = 'default';
    }
}

function activer_logo_menu() {
    var div = document.getElementsByClassName('logo_menu');
    for (var i = 0; i < div.length; i++) {
        div[i].disabled = false;
        div[i].style.cursor = 'pointer';
    }
}

function fond_clair() {
    var div = document.getElementsByClassName('element_menu');
    for (var i = 0; i < div.length; i++) {
        div[i].addEventListener('mouseover', function() {
            this.style.background ='#7890cd';
        });
    }
}

function fond_fonce() {
    var div = document.getElementsByClassName('element_menu');
    for (var i = 0; i < div.length; i++) {
        div[i].addEventListener('mouseover', function() {
            this.style.background ='#2a3990';
        });
        div[i].addEventListener('mouseout', function() {
            this.style.background ='#7890cd';
        });
    }
}

function fond_clair_deroulant() {
    var div = document.getElementsByClassName('element_menu_deroulant');
    for (var i = 0; i < div.length; i++) {
        div[i].addEventListener('mouseover', function() {
            this.style.background ='#7890cd';
        });
    }
}

function fond_fonce_deroulant() {
    var div = document.getElementsByClassName('element_menu_deroulant');
    for (var i = 0; i < div.length; i++) {
        div[i].addEventListener('mouseover', function() {
            this.style.background ='#2a3990';
        });
        div[i].addEventListener('mouseout', function() {
            this.style.background ='#7890cd';
        });
    }
}

function fond_clair_logo() {
    var div = document.getElementsByClassName('logo_menu');
    for (var i = 0; i < div.length; i++) {
        div[i].addEventListener('mouseover', function() {
            this.style.background ='#7890cd';
        });
    }
}

function pas_de_fond_logo() {
    var div = document.getElementsByClassName('element_menu');
    for (var i = 0; i < div.length; i++) {
        div[i].addEventListener('mouseover', function() {
            this.style.background ='#2a3990';
        });
        div[i].addEventListener('mouseout', function() {
            this.style.background ='#7890cd';
        });
    }
}