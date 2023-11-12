
$('#dataTable').on('click', 'tr', function() {
    var values = $(this).find('td').map(function() {
        return $(this).text();
    });
	$('#getuser').val(values[1]);
	$('#getuser1').val(values[1]);
	$('#getfn').val(values[2]);
	$('#getln').val(values[3]);
	$('#getcn').val(values[4]);
  
});
