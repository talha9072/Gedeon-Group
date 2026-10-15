/**
 * Query Loop pagination without a page reload: a click on a `.gh-pagination` link fetches the
 * target page, swaps the posts and pagination of that Query Loop in place and keeps the
 * address bar unchanged. Without JS (or if the request fails) the link works as a normal one.
 */
(function () {
	const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	document.addEventListener('click', (event) => {
		const link = event.target.closest('.gh-pagination a');
		const loop = link && link.closest('.wp-block-query');
		if (!loop || event.defaultPrevented || event.button || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
			return;
		}
		event.preventDefault();
		if (loop.getAttribute('aria-busy') === 'true') {
			return;
		}

		const index = [...document.querySelectorAll('.wp-block-query')].indexOf(loop);
		loop.setAttribute('aria-busy', 'true');

		fetch(link.href, { credentials: 'same-origin' })
			.then((response) => (response.ok ? response.text() : Promise.reject(new Error(response.status))))
			.then((html) => {
				const next = new DOMParser().parseFromString(html, 'text/html').querySelectorAll('.wp-block-query')[index];
				if (!next) {
					throw new Error('Query Loop not found');
				}
				loop.innerHTML = next.innerHTML;
				loop.removeAttribute('aria-busy');

				// Start of the list, just below the sticky header when there is one.
				const header = document.querySelector('.wp-site-blocks > header');
				const sticky = header && getComputedStyle(header).position === 'sticky' ? header.offsetHeight : 0;
				window.scrollTo({
					top: window.scrollY + loop.getBoundingClientRect().top - sticky - 24,
					behavior: reduced ? 'auto' : 'smooth',
				});

				const first = loop.querySelector('.wp-block-post a');
				if (first) {
					first.focus({ preventScroll: true });
				}
			})
			.catch(() => {
				window.location.href = link.href;
			});
	});
})();
