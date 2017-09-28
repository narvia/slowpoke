var Slowpoke = {
	baseUrl: 'http://localhost/slowpoke/api_index.php',
	type: "",
	src: "",
	dest: "",
	
	addEventHandlers: function() {
		$('#parse-html').on('click', this.parseHtml);
		return this;
	},
	
	parseHtml: function() {
		$('#parse-html').attr('disabled', 'disabled');
		$('.button-spinner.parse').removeClass('hdn');
		
		$('#result-set').addClass('hdn');
		$('#results').html('');
		
		var html = $('#pasted-html').val();
		
		// ping off our request
		$.ajax({
			url: Slowpoke.baseUrl + '/load_html',
			method: 'POST',
			data: html
		}).done(Slowpoke.processResponse);
	},
	
	// display result to user
	processResponse: function(data) {
		if (data) {
			$('.button-spinner.parse').addClass('hdn');
			$('#parse-html').removeAttr('disabled');
			
			$('#results').html(data);
			$('#result-set').removeClass('hdn');
		}

	}
};

$(document).ready(function() {
	Slowpoke.addEventHandlers();
});