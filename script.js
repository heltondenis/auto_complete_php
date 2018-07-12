// -
function expand() {
  $(".search").toggleClass("close");
  $(".input").toggleClass("square");
  if ($('.search').hasClass('close')) {
    $('input').focus();
  } else {
    $('input').blur();
  }
}
$('button').on('click', expand);

$(function(){
	$('#busca').on('keyup', function() {

		var texto = $(this).val();

		$.ajax({
           url:'buscar.php',
           type: 'POST',
           data: {texto:texto},
           success:function(html){
           	$('#resultado').html(html);
           }
		});
	});
})
