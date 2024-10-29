(function (d, s, id) {
	'use strict';

	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {
		return;
	}
	js = d.createElement(s);
	js.id = id;
	js.src = '//foppro.com/js/cookie-monster.js';
	js.setAttribute('itkamer-cookie-monster-id', bafiadance_script_id);
	js.async = true;
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'itkamer-cookie-monster-js'));
