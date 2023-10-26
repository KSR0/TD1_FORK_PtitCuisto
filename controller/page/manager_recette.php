<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector("#btn").addEventListener("click", function() {
        let div = createElement("div"); 
        div.innerHTML = <?php
            recupererToutesLesRecettes($bdd);    
        ?>;
        // rajouter l'element dans la page, le mettre enfant a une  div
    }
    )
    });
    
</script>