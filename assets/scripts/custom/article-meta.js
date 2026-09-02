(function () {
	document.addEventListener('click', function (event) {
		var button = event.target.closest('.article-meta__copy');
		if (!button) {
			return;
		}

		var url = button.getAttribute('data-copy-url');
		var label = button.querySelector('.article-meta__copy-label');
		if (!url || !label || !navigator.clipboard) {
			return;
		}

		navigator.clipboard.writeText(url).then(function () {
			var originalLabel = label.textContent;
			label.textContent = 'Lien copié !';
			button.classList.add('is-copied');

			setTimeout(function () {
				label.textContent = originalLabel;
				button.classList.remove('is-copied');
			}, 2000);
		});
	});
})();
