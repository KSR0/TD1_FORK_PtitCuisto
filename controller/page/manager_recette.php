<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelector("#btn").addEventListener("click", function() {
            document.querySelector("#recettes").innerHTML = `<?php recupererToutesLesRecettes($bdd); ?>`;
        })
    });

    
</script>