/* Keep the builder's category label in sync when WP Grid Builder replaces its select. */
(() => {
	const facet = document.getElementById('news-insights-filter-wp-grid-builder-facelet');
	const label = document.querySelector('#news-insights-active-category-display-text-module [data-insights-category]');
	if (!facet || !label) return;

	const all = label.textContent;
	function updateLabel() {
		const select = facet.querySelector('select');
		if (!select) return;
		const caption = select.labels[0]?.querySelector('.wpgb-sr-only');
		if (caption) {
			caption.classList.remove('wpgb-sr-only');
			caption.textContent = 'Filter by category';
		}
		const placeholder = Array.from(select.options).find(option => !option.value);
		if (placeholder && placeholder.text !== all) placeholder.text = all;
		label.textContent = select.value ? select.selectedOptions[0].text : all;
	}

	facet.addEventListener('change', updateLabel);
	new MutationObserver(updateLabel).observe(facet, { childList: true, subtree: true });
	updateLabel();
})();
