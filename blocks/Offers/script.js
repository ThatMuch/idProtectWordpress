/**
 * Offers Block - Details toggle
 */

(function() {
    'use strict';

    const SELECTORS = {
        toggleDetailsBtn: '.toggle-details-btn',
        offerDetails: '.offer-details',
        optionCheckbox: '.price__option-checkbox',
        offerCard: '[data-offer-id]',
        paymentLinkBase: '.payment-link-base',
        paymentLinkOption: '.payment-link-option'
    };

    const CLASSES = {
        active: 'active',
        hidden: 'details-hidden'
    };

    function initToggleDetails() {
        const toggleButtons = document.querySelectorAll(SELECTORS.toggleDetailsBtn);
        if (!toggleButtons.length) return;

        toggleButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const clickedButton = e.target.closest(SELECTORS.toggleDetailsBtn);
                if (!clickedButton) return;

                const targetId = clickedButton.dataset.target;
                if (!targetId) return;

                const detailsElement = document.querySelector(
                    `${SELECTORS.offerDetails}[data-details-for="${targetId}"]`
                );
                const buttonText = clickedButton.querySelector('.btn-text') ||
                                  clickedButton.querySelector('.btn__content .btn-text');

                if (!detailsElement || !buttonText) return;

                const isHidden = detailsElement.classList.toggle(CLASSES.hidden);
                clickedButton.classList.toggle(CLASSES.active);
                buttonText.textContent = isHidden ? 'Voir le détail' : 'Masquer le détail';
            });
        });

    }

    function initOptionPaymentLink() {
        const optionCheckboxes = document.querySelectorAll(SELECTORS.optionCheckbox);
        if (!optionCheckboxes.length) return;

        optionCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const card = this.closest(SELECTORS.offerCard);
                if (!card) return;

                const baseLink = card.querySelector(SELECTORS.paymentLinkBase);
                const optionLink = card.querySelector(SELECTORS.paymentLinkOption);
                if (!baseLink || !optionLink) return;

                baseLink.style.display = this.checked ? 'none' : '';
                optionLink.style.display = this.checked ? '' : 'none';
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        initToggleDetails();
        initOptionPaymentLink();
    });
})();
