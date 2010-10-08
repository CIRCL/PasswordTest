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

	$('#plus_informations_link').fancybox({
		'transitionIn'	: 'fade',
		'transitionOut'	: 'fade'
	});

	$("#slider").slider({
			range: "min",
			value: motDePasseDefaut,
			min: motDePasseMin,
			max: motDePasseMax,
			slide: function(event, ui) {
				$('#longueur_MdP_ecrit').html(ui.value);
				$('#longueur_MdP').val(ui.value);
			}
	});
	$('#longueur_MdP_ecrit').html($("#slider").slider("value"));
	$('#longueur_MdP').val($("#slider").slider("value"));

	//replace checkboxes
	$('.chkimg').click(function(){
		if ($('input[name='+$(this).attr('id')+']').attr('checked'))
		{
			$(this).attr('src',"images/delete.png");
			$('input[name='+$(this).attr('id')+']').attr('checked',false);
		}
		else
		{
			$(this).attr('src',"images/check.png");
			$('input[name='+$(this).attr('id')+']').attr('checked',true);
		}
	});
	$('input[type=checkbox]').each(function(){
		if ($(this).attr('checked'))
		{
			$('#'+$(this).attr('name')).attr('src',"images/check.png");
		}
		else
		{
			$('#'+$(this).attr('name')).attr('src',"images/delete.png");
		}
	});
}) ;
