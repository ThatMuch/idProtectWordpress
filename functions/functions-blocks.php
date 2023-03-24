<?php
/**
 * Register Block Types
 *
 * @package WordPress
 * @subpackage idProtect
 * @since idProtect 1.0.0
 */

 $icon = '<svg width="40" height="40" viewBox="0 0 40 40" fill="#152235" xmlns="http://www.w3.org/2000/svg">
<path d="M20.3605 39.714L20.3581 39.7157C20.2274 39.812 20.0986 39.9067 19.9721 40C19.8455 39.9067 19.7168 39.812 19.586 39.7157L19.5836 39.714C18.6905 39.0568 17.7002 38.3281 16.6527 37.5083C18.7683 36.2247 20.9722 34.6714 23.1056 32.7501L23.399 32.4859C25.3588 30.7479 27.3378 28.6963 29.1121 26.1889C32.397 21.5465 35.0585 15.1959 35.0125 6.23423L35.0103 5.81303L34.6026 5.70729C29.3494 4.34492 23.0692 3.79413 19.9882 3.70321L19.9721 3.70273L19.9559 3.70321C16.8749 3.79413 10.5947 4.34492 5.34153 5.70729L4.93381 5.81303L4.93165 6.23423C4.88566 15.1959 7.54713 21.5465 10.8321 26.1889C12.2227 28.1542 13.7392 29.8395 15.2736 31.3133C14.152 32.0813 13.0296 32.7613 11.9276 33.3748C5.95253 27.4337 0.107052 18.2044 1.11374 3.1062C7.42046 0.860429 16.2404 0.0983018 19.9666 0.000143136L19.9721 0L19.9774 0.000139483C23.7036 0.0982978 32.5237 0.860428 38.8304 3.1062C39.6043 14.7125 36.3291 22.8407 32.0743 28.6708C29.1038 32.741 25.6445 35.7066 22.7099 37.9589C21.8763 38.5986 21.0865 39.1798 20.3605 39.714Z" fill="#152235"/>
<path d="M20.0633 10.0333C15.5442 10.0333 11.6848 12.6052 10.1212 16.2357C11.6848 19.8662 15.5442 22.4381 20.0633 22.4381C24.5824 22.4381 28.4418 19.8662 30.0054 16.2357C28.4418 12.6052 24.5824 10.0333 20.0633 10.0333ZM20.0633 20.3707C17.5687 20.3707 15.5442 18.5182 15.5442 16.2357C15.5442 13.9532 17.5687 12.1008 20.0633 12.1008C22.5579 12.1008 24.5824 13.9532 24.5824 16.2357C24.5824 18.5182 22.5579 20.3707 20.0633 20.3707ZM20.0633 13.7548C18.5629 13.7548 17.3518 14.8629 17.3518 16.2357C17.3518 17.6085 18.5629 18.7167 20.0633 18.7167C21.5636 18.7167 22.7748 17.6085 22.7748 16.2357C22.7748 14.8629 21.5636 13.7548 20.0633 13.7548Z" fill="#152235"/>
</svg>
';
register_block_type(
	get_template_directory() . '/blocks/hero-section/block.json'
,
array(
	    'icon'  => $icon,
	),
);
register_block_type( get_template_directory() . '/blocks/section/block.json' ,
array(
	    'icon'  => $icon,
	),);
register_block_type( get_template_directory() . '/blocks/temoignage/block.json' ,
array(
	    'icon'  => $icon,
	),);
register_block_type( get_template_directory() . '/blocks/service/block.json' ,
array(
	    'icon'  => $icon,
	),);
register_block_type( get_template_directory() . '/blocks/logos/block.json' ,
array(
	    'icon'  => $icon,
	),);
register_block_type( get_template_directory() . '/blocks/link/block.json' ,
array(
	    'icon'  => $icon,
	),);
register_block_type( get_template_directory() . '/blocks/community/block.json' ,
array(
	    'icon'  => $icon,
	),);
register_block_type( get_template_directory() . '/blocks/widgetSidebar/block.json' ,
array(
	    'icon'  => $icon,
	),);
register_block_type( get_template_directory() . '/blocks/serviceSection1/block.json' ,
array(
	    'icon'  => $icon,
	),);
register_block_type( get_template_directory() . '/blocks/serviceSection2/block.json' ,
array(
	    'icon'  => $icon,
	),);
register_block_type( get_template_directory() . '/blocks/steps/block.json' ,
array(
	    'icon'  => $icon,
	),);
register_block_type( get_template_directory() . '/blocks/tarif/block.json' ,
array(
	    'icon'  => $icon,
	),);

?>
