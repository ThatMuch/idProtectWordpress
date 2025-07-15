<?php
$title = get_field('titre') ?: 'Default title';
$accent = get_field('titre_accent') ?: 'Default accent';

$items = get_field('items');
$speed = get_field('vitesse') ?: 8;
?>

<section class="mb-50">
    <div class="container-stats container">
        <h2 class="text-white section__title h1"><?= $title ?> <span class="text__orange title"><?= $accent ?></span></h2>
        <div class="statistiques">
            <?php foreach ($items as $item) : ?>
                <div class="stat">
                    <div class="statistique__chiffre">
                        <span class="percent"><?= htmlspecialchars($item['nbr_start']) ?></span>
                        <span class="unit"><?php echo $item['unite'] ?></span>
                        <span class="percent__end d-none"><?= htmlspecialchars($item['nbr_end']) ?></span>
                    </div>
                    <div class="statistique__texte">
                        <?= $item['text'] ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            function incrementerPourcentage(element, pourcentageCible, pourcentageDepart, vitesse) {
                var pourcentageActuel = pourcentageDepart; // Début à pourcentageDepart
                var interval = setInterval(function() {
                    ++pourcentageActuel;
                    element.text(pourcentageActuel);
                    if (pourcentageActuel >= pourcentageCible) {
                        clearInterval(interval);
                        element.text(pourcentageActuel);
                    }
                }, vitesse);
            }

            // loops throughs all the stats
            $('.stat').each(function() {
                var pourcentageCible = parseInt($(this).find('.percent__end').text());
                var pourcentageDepart = 0;
                var vitesse = <?= $speed ?>;
                var element = $(this).find('.percent');
                incrementerPourcentage(element, pourcentageCible, pourcentageDepart, vitesse);
            });
        });
    </script>
</section>
