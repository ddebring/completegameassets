<h1>SEARCH</h1>
<br>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<input type="text" name="search_text" id="search_text2" class="textInputs" placeholder="Search Anything..." class="form-control" />
			
<div id="result2" style="text-align: left;padding: 2px 8px;"></div>


<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch2.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{ $('#result2').html(data);}
		});
	}
	
	$('#search_text2').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{ load_data(search);}
		else
		{ load_data();}
	});
});
</script>




