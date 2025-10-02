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

                // Gérer l'affichage des prix et liens avec animation
                const monthlyPrices = document.querySelectorAll('.price-monthly');
                const yearlyPrices = document.querySelectorAll('.price-yearly');
                const monthlyPeriods = document.querySelectorAll('.period-monthly');
                const yearlyPeriods = document.querySelectorAll('.period-yearly');
                const monthlyLinks = document.querySelectorAll('.payment-link-monthly');
                const yearlyLinks = document.querySelectorAll('.payment-link-yearly');

                if (targetTab === 'monthly') {
                    // Masquer les éléments annuels
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
                    yearlyLinks.forEach(link => {
                        link.style.opacity = '0';
                        setTimeout(() => {
                            link.style.display = 'none';
                        }, 300);
                    });

                    // Afficher les éléments mensuels
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
                        monthlyLinks.forEach(link => {
                            link.style.display = 'flex';
                            setTimeout(() => {
                                link.style.opacity = '1';
                            }, 50);
                        });
                    }, 300);

                } else if (targetTab === 'yearly') {
                    // Masquer les éléments mensuels
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
                    monthlyLinks.forEach(link => {
                        link.style.opacity = '0';
                        setTimeout(() => {
                            link.style.display = 'none';
                        }, 300);
                    });

                    // Afficher les éléments annuels
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
                        yearlyLinks.forEach(link => {
                            link.style.display = 'flex';
                            setTimeout(() => {
                                link.style.opacity = '1';
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
