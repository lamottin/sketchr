jQuery(function($) {
	
	$('.datepicker').datepicker({
		
		dateFormat : 'dd-mm-yy',
		date : 0,
		changeMonth: true,
		changeYear: true,
		constrainInput: false
	});
	
	/* French initialisation for the jQuery UI date picker plugin. */
	/* Written by Keith Wood (kbwood{at}iinet.com.au),
	Stéphane Nahmani (sholby@sholby.net),
	Stéphane Raimbault <stephane.raimbault@gmail.com> */
	$.datepicker.regional['fr'] = {
		closeText: 'Fermer',
		prevText: 'Pr&eacute;c&eacute;dent',
		nextText: 'Suivant',
		currentText: 'Aujourd\'hui',
		monthNames: ['Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin',
		'Juillet', 'Ao&ucirc;t', 'Septembre', 'Octobre', 'Novembre', 'D&eacute;cembre'],
		monthNamesShort: ['Janv', 'F&eacute;vr', 'Mars', 'Avril', 'Mai', 'Juin',
		'Juil', 'Ao&ucirc;t', 'Sept', 'Oct', 'Nov', 'D&eacute;c'],
		dayNames: ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
		dayNamesShort: ['dim.', 'lun.', 'mar.', 'mer.', 'jeu.', 'ven.', 'sam.'],
		dayNamesMin: ['D','L','M','M','J','V','S'],
		weekHeader: 'Sem.',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	
	$.datepicker.setDefaults($.datepicker.regional['fr']);
});