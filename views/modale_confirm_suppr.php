<div id="staticModal" data-modal-backdrop="static" aria-hidden="true" class="font-pacifico z-20 modal1 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="marge modal1-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>                                
    <div class="marge modal1-container bg-white w-auto mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
        <div class="marge modal1-content py-4 text-left px-6">
            
            <div class="flex justify-between items-center pb-3">
            <h1 class="text-charte_bleu_fonce font-permanent_marker pr-3 pb-3 text-4xl font-bold text-center leading-tight">Supprimer un compte</h1>

                <div class="modal1-close cursor-pointer z-50">
                    <button>
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </button>
                </div>
            </div>

                <div>
                    <label for="password">Entrez votre mot de passe : </label>
                    <input type="password" id="password" name="password"/>
                </div>

                <div>
                    <label for="password_conf">Confirmez votre mot de passe : </label>
                    <input type="password" id="password_conf" name="password_conf"/>
                </div>

                <br>
                    <div id="erreur" class="text-red-600"></div>
                <br>

        </div>
    </div>
</div>

<script>
    let password = document.querySelector('#password');
    let password_conf = document.querySelector('#password_conf');
    let btnSubmit = document.querySelector('#submit_btn');
    let erreursDiv = document.querySelector("#erreur");
    erreursDiv.innerHTML = "L'ancien mot de passe ne peut pas etre vide.";

    old_password.addEventListener("input", function () {
        let password_value = document.querySelector('#password').value;
        let password_conf_value = document.querySelector('#password_conf').value;

        if (password_value == '') {
            erreursDiv.innerHTML = "Veuillez entrer votre mot de passe.";
        } else {
            erreursDiv.innerHTML = "";
        }
    });

    password.addEventListener("input", function () {
        let password_value = document.querySelector('#password').value;
        let password_conf_value = document.querySelector('#password_conf').value;

        if (password_value == password_conf_value) {
            btnSubmit.disabled = false;
            btnSubmit.className = "text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2";
            erreursDiv.innerHTML = "";
        } else {
            btnSubmit.disabled = true;
            btnSubmit.className = "text-charte_bleu_clair border border-charte_bleu_fonce focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2 opacity-50";
            erreursDiv.innerHTML = "Les deux mots de passe ne correspondent pas";
        }
    });

    password_conf.addEventListener("input", function () {
        let password_value = document.querySelector('#password').value;
        let password_conf_value = document.querySelector('#password_conf').value;
        
        if (password_conf_value == password_value) {
            btnSubmit.disabled = false;
            btnSubmit.className = "text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2";
            erreursDiv.innerHTML = "";
        } else {
            btnSubmit.disabled = true;
            btnSubmit.className = "text-charte_bleu_clair border border-charte_bleu_fonce focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2 opacity-50";
            erreursDiv.innerHTML = "Les deux mots de passe ne correspondent pas";
        }
    });

</script>