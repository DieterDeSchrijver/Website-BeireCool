

(function ($) {
	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
	var oct10 = new Date(2020,09,10);
	var oct11 = new Date(2020,09,11);
	
	if( !($("#dateLeveren option[value='NVT']").parent().is('span')) ) $("#dateLeveren option[value='NVT']").wrap('<span>');
	if( !($("#dateAfhalen option[value='NVT']").parent().is('span')) ) $("#dateAfhalen option[value='NVT']").wrap('<span>');

	$('#option').change(function(){

		console.log($('#option').find(":selected").text())
		if ($('#option').find(":selected").text() === 'Afhalen') {
			if( !($("#dateAfhalen option[value='NVT']").parent().is('span')) ) $("#dateAfhalen option[value='NVT']").wrap('<span>');
			$('#dateLeverenBox').css("display","none");
			$('#dateAfhalenBox').show();
			if( ($("#dateLeveren option[value='NVT']").parent().is('span')) ) $("#dateLeveren option[value='NVT']").unwrap();
			$('#dateLeveren').val('NVT');
		}else if($('#option').find(":selected").text() === 'Laten leveren'){
			if( !($("#dateLeveren option[value='NVT']").parent().is('span')) ) $("#dateLeveren option[value='NVT']").wrap('<span>');
			$('#dateLeverenBox').show();
			$('#dateAfhalenBox').css("display","none");
			if( ($("#dateAfhalen option[value='NVT']").parent().is('span')) ) $("#dateAfhalen option[value='NVT']").unwrap();
			$('#dateAfhalen').val('NVT');
		}
	})

	$('#date').change(function() {
		$('#time').val('');
		if ($('#date').find(":selected").text() === 'Zaterdag 10/10') {
			if( !($("#time option[value='12:00']").parent().is('span')) ) $("#time option[value='12:00']").wrap('<span>');
			$("#time option[value='12:00']").hide();
	
			if( ($("#time option[value='18:00']").parent().is('span')) ) $("#time option[value='18:00']").unwrap();
			if( ($("#time option[value='20:00']").parent().is('span')) ) $("#time option[value='20:00']").unwrap();
			$("#time option[value='18:00']").show();
			$("#time option[value='20:00']").show();
		}else if ($('#date').find(":selected").text() === 'Zondag 11/10') {
			if( ($("#time option[value='12:00']").parent().is('span')) ) $("#time option[value='12:00']").unwrap();
			$("#time option[value='12:00']").show();
	
			if( !($("#time option[value='20:00']").parent().is('span')) ) $("#time option[value='20:00']").wrap('<span>');
			if( !($("#time option[value='18:00']").parent().is('span')) ) $("#time option[value='18:00']").wrap('<span>');
			$("#time option[value='18:00']").hide();
			$("#time option[value='20:00']").hide();
		}
	})


	var checkin = $('#check_in').datepicker({
	  onRender: function(date) {
		return date.valueOf() > oct11.valueOf() || date.valueOf() < oct10.valueOf() ? 'disabled' : '';
	  }
	}).on('changeDate', function(ev) {
		changeSelect(ev.date);
		$('#time').val('');

	  if (ev.date.valueOf() > checkout.date.valueOf()) {
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate() + 1);
		checkout.setValue(newDate);
	  }
	  checkin.hide();
	  $('#check_out')[0].focus();
	}).data('datepicker');
	var checkout = $('#check_out').datepicker({
	  onRender: function(date) {
		return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
	  }
	}).on('changeDate', function(ev) {
	  checkout.hide();
	}).data('datepicker');

})(window.jQuery); // JavaScript Document

function changeSelect(date){
	if(date < new Date(2020,09,11)){

	}else{

	}

}