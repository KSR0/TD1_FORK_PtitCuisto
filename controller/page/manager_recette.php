<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php
            $nombre_fois_btn_clique = 1;
        ?>
        document.querySelector("#btn").addEventListener("click", function() {
            document.querySelector("#recettes").innerHTML = `<?php recupererToutesLesRecettes($bdd, $nombre_fois_btn_clique); ?>`;
            
            <?php
                $nombre_fois_btn_clique += 1;
            ?>;
            console.log(<?php echo $nombre_fois_btn_clique?>);
        })
    });

    
</script>