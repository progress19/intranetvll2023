	
<div class="container-keypad">
	<ul class="keypad">
		<a href="#" class="press" id="7">
			<li class="button">
				<p class="number">7</p>
			</li>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="press" id="8">
			<li class="button">
				<p class="number">8</p>
			</li>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="press" id="9">
			<li class="button">
				<p class="number">9</p>
			</li>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="press" id="4">
			<li class="button">
				<p class="number">4</p>
			</li>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="press" id="5">
			<li class="button">
				<p class="number">5</p>
			</li>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="press" id="6">
			<li class="button">
				<p class="number">6</p>
			</li>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="press" id="1">
			<li class="button">
				<p class="number">1</p>
			</li>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="press" id="2">
			<li class="button">
				<p class="number">2</p>
			</li>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="press" id="3">
			<li class="button">
				<p class="number">3</p>
			</li>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="press" id="DEL">
			<li class="button clear">
				<p class="number"><span class="glyphicon glyphicon-remove"></p>
			</li>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="press" id="0">
			<li class="button">
				<p class="number">0</p>
			</li>
			<div class="clearfix"></div>
		</a>
		<a href="#" class="press" id="GO">
			<li class="button go">
				<p class="number"><span class="glyphicon glyphicon-ok"></span></p>
			</li>
			<div class="clearfix"></div>
		</a>
	</ul>
</div>

<script>
	
	/* teclado virtual */
	$('input').mousedown(function(e){
		e.preventDefault();
		$(this).blur();
		return false;
	});
	var flag = false;
	$(".press").bind('touchstart click', function(event) {
		if (!flag) {
			flag = true;
			setTimeout(function() {
				flag = false;
			}, 100);
			event.preventDefault();
			console.log("clicked");
			var input = $(this).attr('id');
			console.log("this: " + input);
			var existing = $("#pass").val();
			var result;
			clearTimeout(autenticacion_time);
			autenticacion_time = setInterval('recarga()',5000);

//alert($("#pass").val().length);

if (input == "DEL") {
	result = existing.slice(0,-1);
	$("#pass").val(result);
	console.log("delete");

} else {

	console.log(input);
	existing = $("#pass").val();
	console.log(existing);
	result = existing + input;
	$("#pass").val(result);
}

if (input == "GO" || $("#pass").val().length==4)  {

	clearTimeout(autenticacion_time);
	autenticacion_time = setInterval('recarga()',9000);
	autenticacion(<?php echo $tarjetaId; ?>,$("#pass").val())

} 

}

return false
});

</script>