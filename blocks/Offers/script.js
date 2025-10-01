/**
 * Script pour le bloc Offers - Gestion des onglets mensuel/annuel
 */

document.addEventListener('DOMContentLoaded', function() {

    // Fonction pour gérer le changement d'onglets
    function initPricingTabs() {
        const tabButtons = document.querySelectorAll('.tab-btn');

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetTab = this.getAttribute('data-tab');

                // Retirer la classe active de tous les boutons
                tabButtons.forEach(btn => btn.classList.remove('active'));

                // Ajouter la classe active au bouton cliqué
                this.classList.add('active');

                // Gérer l'affichage des prix avec animation
                const monthlyPrices = document.querySelectorAll('.price-monthly');
                const yearlyPrices = document.querySelectorAll('.price-yearly');
                const monthlyPeriods = document.querySelectorAll('.period-monthly');
                const yearlyPeriods = document.querySelectorAll('.period-yearly');

                if (targetTab === 'monthly') {
                    // Masquer les prix annuels
                    yearlyPrices.forEach(price => {
                        price.style.opacity = '0';
                        setTimeout(() => {
                            price.style.display = 'none';
                        }, 300);
                    });
                    yearlyPeriods.forEach(period => {
                        period.style.opacity = '0';
                        setTimeout(() => {
                            period.style.display = 'none';
                        }, 300);
                    });

                    // Afficher les prix mensuels
                    setTimeout(() => {
                        monthlyPrices.forEach(price => {
                            price.style.display = 'block';
                            setTimeout(() => {
                                price.style.opacity = '1';
                            }, 50);
                        });
                        monthlyPeriods.forEach(period => {
                            period.style.display = 'inline';
                            setTimeout(() => {
                                period.style.opacity = '1';
                            }, 50);
                        });
                    }, 300);

                } else if (targetTab === 'yearly') {
                    // Masquer les prix mensuels
                    monthlyPrices.forEach(price => {
                        price.style.opacity = '0';
                        setTimeout(() => {
                            price.style.display = 'none';
                        }, 300);
                    });
                    monthlyPeriods.forEach(period => {
                        period.style.opacity = '0';
                        setTimeout(() => {
                            period.style.display = 'none';
                        }, 300);
                    });

                    // Afficher les prix annuels
                    setTimeout(() => {
                        yearlyPrices.forEach(price => {
                            price.style.display = 'block';
                            setTimeout(() => {
                                price.style.opacity = '1';
                            }, 50);
                        });
                        yearlyPeriods.forEach(period => {
                            period.style.display = 'inline';
                            setTimeout(() => {
                                period.style.opacity = '1';
                            }, 50);
                        });
                    }, 300);
                }
            });
        });
    }

    // Initialiser les onglets de tarification
    initPricingTabs();
});
