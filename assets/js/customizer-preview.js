/**
 * BanglaTrack Theme — Customizer live-preview bindings.
 *
 * Each setting maps to a CSS custom property on :root.
 *
 * @package BanglaTrackDeveloper
 */
( function ( api ) {
	'use strict';

	var colorMap = {
		btd_color_green:        '--btd-green',
		btd_color_green_dark:   '--btd-green-dark',
		btd_color_green_light:  '--btd-green-light',
		btd_color_green_50:     '--btd-green-50',
		btd_color_blue:         '--btd-blue',
		btd_color_blue_light:   '--btd-blue-light',
		btd_color_red:          '--btd-red',
		btd_color_red_light:    '--btd-red-light',
		btd_color_gold:         '--btd-gold',
		btd_color_gold_light:   '--btd-gold-light',
		btd_color_dark_bg:      '--btd-dark-bg',
		btd_color_dark_surface: '--btd-dark-surface',
		btd_color_dark_text:    '--btd-dark-text',
		btd_color_body_bg:      '--btd-body-bg',
		btd_color_surface:      '--btd-surface'
	};

	Object.keys( colorMap ).forEach( function ( settingId ) {
		api( settingId, function ( setting ) {
			setting.bind( function ( newVal ) {
				document.documentElement.style.setProperty( colorMap[ settingId ], newVal );
			} );
		} );
	} );
} )( wp.customize );
