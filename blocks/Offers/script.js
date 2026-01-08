/**
 * Offers Block - Pricing tabs and details toggle
 */

(function() {
    'use strict';

    const ANIMATION_DURATION = 300;
    const PRICING_TYPE_MONTHLY = 'monthly';
    const PRICING_TYPE_YEARLY = 'yearly';

    const SELECTORS = {
        tabButton: '.tab-btn',
        priceMonthly: '.price-monthly',
        priceYearly: '.price-yearly',
        periodMonthly: '.period-monthly',
        periodYearly: '.period-yearly',
        linkMonthly: '.payment-link-monthly',
        linkYearly: '.payment-link-yearly',
        toggleDetailsBtn: '.toggle-details-btn',
        offerDetails: '.offer-details'
    };

    const CLASSES = {
        active: 'active',
        hidden: 'details-hidden',
        fadeOut: 'fade-out',
        fadeIn: 'fade-in'
    };

    function toggleElementsVisibility(hideElements, showElements) {
        // Step 1: Ensure all elements are visible so transition can occur
        hideElements.forEach(el => {
            if (el.style.display === 'none') {
                const displayType = el.classList.contains('payment-link') ? 'flex' :
                                   el.classList.contains('period') ? 'inline' : 'block';
                el.style.display = displayType;
            }
            // Ensure element starts with full opacity
            el.classList.remove(CLASSES.fadeOut);
        });

        // Step 2: Force browser reflow to apply display change
        if (hideElements.length > 0) {
            hideElements[0].offsetHeight; // Force reflow
        }

        // Step 3: Trigger fade-out animation
        requestAnimationFrame(() => {
            hideElements.forEach(el => el.classList.add(CLASSES.fadeOut));
        });

        // Step 4: After animation completes, hide and show elements
        setTimeout(() => {
            // Hide the faded-out elements
            hideElements.forEach(el => {
                el.style.display = 'none';
                el.classList.remove(CLASSES.fadeOut);
            });

            // Prepare elements to show
            showElements.forEach(el => {
                const displayType = el.classList.contains('payment-link') ? 'flex' :
                                   el.classList.contains('period') ? 'inline' : 'block';
                el.style.display = displayType;
                el.classList.remove(CLASSES.fadeIn);
            });

            // Force reflow before fade-in
            if (showElements.length > 0) {
                showElements[0].offsetHeight;
            }

            // Trigger fade-in animation
            requestAnimationFrame(() => {
                showElements.forEach(el => el.classList.add(CLASSES.fadeIn));
            });
        }, ANIMATION_DURATION);
    }

    function switchPricingTab(tab) {
        const isMonthly = tab === PRICING_TYPE_MONTHLY;

        const elementsToHide = [
            ...document.querySelectorAll(isMonthly ? SELECTORS.priceYearly : SELECTORS.priceMonthly),
            ...document.querySelectorAll(isMonthly ? SELECTORS.periodYearly : SELECTORS.periodMonthly),
            ...document.querySelectorAll(isMonthly ? SELECTORS.linkYearly : SELECTORS.linkMonthly)
        ];

        const elementsToShow = [
            ...document.querySelectorAll(isMonthly ? SELECTORS.priceMonthly : SELECTORS.priceYearly),
            ...document.querySelectorAll(isMonthly ? SELECTORS.periodMonthly : SELECTORS.periodYearly),
            ...document.querySelectorAll(isMonthly ? SELECTORS.linkMonthly : SELECTORS.linkYearly)
        ];

        toggleElementsVisibility(elementsToHide, elementsToShow);
    }

    function initPricingTabs() {
        const tabButtons = document.querySelectorAll(SELECTORS.tabButton);
        if (!tabButtons.length) return;

        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                const targetTab = this.dataset.tab;
                if (!targetTab) return;

                tabButtons.forEach(btn => btn.classList.remove(CLASSES.active));
                this.classList.add(CLASSES.active);

                switchPricingTab(targetTab);
            });
        });
    }

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

    document.addEventListener('DOMContentLoaded', function() {
        initPricingTabs();
        initToggleDetails();
    });
})();
