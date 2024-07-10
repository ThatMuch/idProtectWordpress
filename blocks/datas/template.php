<?php
$title = get_field('titre') ?: 'Default title';
$accent = get_field('titre_accent') ?: 'Default accent';
$nbr_start1 = get_field('nbr_start1');
$nbr_end1 = get_field('nbr_end1');
$nbr_start2 = get_field('nbr_start2');
$nbr_end2 = get_field('nbr_end2');
$nbr_start3 = get_field('nbr_start3');
$nbr_end3 = get_field('nbr_end3');
$txt1 = get_field('txt1');
$txt2 = get_field('txt2');
$txt3 = get_field('txt3');
$speed = get_field('vitesse');
?>

<section name="data">
    <div class="container-stats container">
        <h1 class="h1-45-white margin-h1"><?= html_entity_decode($title) ?><span class="orange_title"><?= htmlspecialchars($accent) ?></span></h1>
        <div class="statistiques">
            <div class="stat">
                <p class="first-percent"><?= htmlspecialchars($nbr_start1) ?>M+</p>
                <div class="stat_detail"><?= html_entity_decode($txt1) ?></div>
            </div>
            <div class="stat">
                <p class="second-percent"><?= htmlspecialchars($nbr_start2) ?>M+</p>
                <div class="stat_detail"><?= html_entity_decode($txt2) ?></div>
            </div>
            <div class="stat">
                <p class="third-percent"><?= htmlspecialchars($nbr_start3) ?>M+</p>
                <div class="stat_detail"><?= html_entity_decode($txt3) ?></div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Fonction pour incrémenter le pourcentage progressivement
            function incrementerPourcentage($element, pourcentageCible, pourcentageDepart, vitesse) {
                var pourcentageActuel = pourcentageDepart; // Début à pourcentageDepart
                var increment = 1; // Augmentation de 1% à chaque itération
                var interval = setInterval(function() {
                    pourcentageActuel += increment;
                    $element.text(pourcentageActuel + 'M+');
                    if (pourcentageActuel >= pourcentageCible) {
                        clearInterval(interval);
                        $element.text(pourcentageCible + 'M+'); // Assurez-vous que le pourcentage final est correct
                    }
                }, vitesse); // Vitesse de l'incrémentation (plus bas = plus rapide)
            }

            // Appel de la fonction pour chaque élément
            incrementerPourcentage($('.first-percent'), <?= htmlspecialchars($nbr_end1) ?>, <?= htmlspecialchars($nbr_start1) ?>, <?= htmlspecialchars($speed) ?>);
            incrementerPourcentage($('.second-percent'), <?= htmlspecialchars($nbr_end2) ?>, <?= htmlspecialchars($nbr_start2) ?>, <?= htmlspecialchars($speed) ?>);
            incrementerPourcentage($('.third-percent'), <?= htmlspecialchars($nbr_end3) ?>, <?= htmlspecialchars($nbr_start3) ?>, <?= htmlspecialchars($speed) ?>);
        });
    </script>
</section>
