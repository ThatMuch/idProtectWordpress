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

    // Fonction pour gérer l'affichage/masquage des détails
    function initToggleDetails() {
        const toggleButtons = document.querySelectorAll('.toggle-details-btn');

        toggleButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                // Utiliser closest pour s'assurer qu'on a le bon bouton même si on clique sur un enfant
                const clickedButton = e.target.closest('.toggle-details-btn');
                if (!clickedButton) return;

                const targetId = clickedButton.getAttribute('data-target');
                const detailsElement = document.querySelector(`.offer-details[data-details-for="${targetId}"]`);

                // Chercher le texte du bouton - peut être directement dans .btn-text ou dans .btn__content .btn-text
                let buttonText = clickedButton.querySelector('.btn-text');
                if (!buttonText) {
                    buttonText = clickedButton.querySelector('.btn__content .btn-text');
                }

                if (detailsElement) {
                    // Basculer la classe pour afficher/masquer
                    detailsElement.classList.toggle('details-hidden');
                    clickedButton.classList.toggle('active');

                    // Changer le texte du bouton
                    if (buttonText) {
                        if (detailsElement.classList.contains('details-hidden')) {
                            buttonText.textContent = 'Voir le détail';
                        } else {
                            buttonText.textContent = 'Masquer le détail';
                        }
                    }
                }
            });
        });
    }

    // Initialiser le toggle des détails
    initToggleDetails();
});
