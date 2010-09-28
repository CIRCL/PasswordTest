$(document) . ready(
function()
{
        $('#longueur_next').click(function(){
                $('#longueur').fadeOut('fast',function(){$('#type').fadeIn('fast')});
        });
	$('#submit').click(function(){
		check=$("input:checked").length;
		if (check==0)
		{
			$('.error').fadeIn();
			return false;
		}
		return true;
        });
	$('#up').click(function(){
		var longueur = parseInt($('#longueur_MdP').val()) + 1;
		if (longueur>30) longueur=30;
                $('#longueur_MdP_ecrit').html(longueur+"");
		$('#longueur_MdP').val(longueur+"");
        });
	$('#down').click(function(){
		var longueur = parseInt($('#longueur_MdP').val()) - 1;
		if (longueur<1) longueur=1;
                $('#longueur_MdP_ecrit').html(longueur+"");
		$('#longueur_MdP').val(longueur+"");
        });
}) ;
