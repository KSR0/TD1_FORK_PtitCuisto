function Openbar() {
    document.querySelector('.sidebar').classList.toggle('left-[-300px]')
}

function ouvrir_modale(numero) {
  let ouvrir_modale = document.querySelectorAll(`.modal-open${numero}`)
  for (let i = 0; i < ouvrir_modale.length; i++) {
    ouvrir_modale[i].addEventListener('click', function(event){
    event.preventDefault()
    toggleModal()
    Openbar()
    })
  }
  
  let fermer_modale = document.querySelectorAll(`.modal${numero}-close`)
  for (let i = 0; i < fermer_modale.length; i++) {
    fermer_modale[i].addEventListener('click', toggleModal)
  }
  
  document.onkeydown = function(evt) {
    evt = evt || window.Event
    let isEscape = false
    if ("key" in evt) {
    isEscape = (evt.key === "Escape" || evt.key === "Esc")
    } else {
    isEscape = (evt.keyCode === 27)
    }
    if (isEscape && document.body.classList.contains(`modal${numero}-active`)) {
    toggleModal()
    }
  };
  
  
  function toggleModal () {
    const body = document.querySelector('body')
    const modal = document.querySelector(`.modal${numero}`)
    modal.classList.toggle('opacity-0')
    modal.classList.toggle('pointer-events-none')
    body.classList.toggle(`modal${numero}-active`)
  }
}

function bouton_recherche_par_categorie() {
  window.location.href = 'filtre_categorie.php';
}

function bouton_recherche_par_titre() {
  window.location.href = 'filtre_titre.php';
}

function bouton_recherche_par_ingredients() {
  window.location.href = 'filtre_ingredients.php';
}