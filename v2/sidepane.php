
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<h1 class="red">FILTERS</h1>
<div class="box">
	<h3>ADVANCE SEARCH</h3>
	<input type="text" name="search_text" id="search_text" class="textInputs search form-control" placeholder="Search Assets..." >
	
<div id="result" style="text-align: left;padding: 2px 8px;font-size: 18px;line-height: 1.5;font-weight: lighter;"></div>
</div>
<br>
<div class="box">
	<h3>PRICE</h3>
	<a href="index.php?cat=price&subcat=free"><button class="ghostButtons">FREE</button></a>
	<a href="index.php?cat=price&subcat=05"><button class="ghostButtons">$0 - $5</button></a>
	<a href="index.php?cat=price&subcat=550"><button class="ghostButtons">$5 - $50</button></a>
	<a href="index.php?cat=price&subcat=50p"><button class="ghostButtons">ABOVE $50</button></a>
</div>




<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{ $('#result').html(data);}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{ load_data(search);}
		else
		{ load_data();}
	});
});
</script>