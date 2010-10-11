$(document) . ready(
function()
{
        //click on the first button
	$('#longueur_next').click(function(){
                $('#longueur').fadeOut('fast',function(){$('#type').fadeIn('fast')});
        });

	//click on the second button
	$('#submit').click(function(){
		check=$("input:checked").length;
		if (check==0)
		{
			$('.error').fadeIn();
			return false;
		}
		$('#submit').css({ "display":"none" });
		$('#submit_wait').css({ "display":"block" });
		$.ajax( {
		type: 'POST' ,
		data: {
			lang: $('input[name=lang]').val(),
			longueur_MdP: $('input[name=longueur_MdP]').val(),
			set_chars_minuscules: $('input[name=set_chars_minuscules]:checked').val(),
			set_chars_majuscules: $('input[name=set_chars_majuscules]:checked').val(),
			set_chars_chiffres: $('input[name=set_chars_chiffres]:checked').val(),
			set_chars_speciaux: $('input[name=set_chars_speciaux]:checked').val()
		},
		url: 'eval.php',
		success: function(data) {
				$('#resultats').html(data);
				$('.error').fadeOut();
				$('input[name=longueur_MdP]').val(motDePasseDefaut);
				$('#longueur_MdP_ecrit').html(motDePasseDefaut);
				$("#slider").slider('option', 'value', motDePasseDefaut);
				$('input[type=checkbox]').each(function() {$(this).attr('checked',false)});
				$('#type').fadeOut('fast',function(){
					//après la disparition de la deuxième page
					$('#resultats').fadeIn('fast');
					resetCheckBoxImages();
					$('#submit').css({ "display":"block" });
					$('#submit_wait').css({ "display":"none" });
				});
				activateInfoBoxes();
			},
		error: function() {
			alert('An error occurred!');
			}
		});
		return false;
        });

	//click on the third button
	$('#reset').live('click',function(){
		$('#resultats').fadeOut('fast',function(){$('#longueur').fadeIn('fast')});
	});

	//slider
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
	resetCheckBoxImages();
	activateInfoBoxes();
}) ;

//infoboxes
function activateInfoBoxes()
{
	$('#plus_informations_link').fancybox({
		'transitionIn'	: 'fade',
		'transitionOut'	: 'fade'
	});
	$('#attaque_standard_link').fancybox({
		'transitionIn'	: 'fade',
		'transitionOut'	: 'fade'
	});
	$('#attaque_distribuee_link').fancybox({
		'transitionIn'	: 'fade',
		'transitionOut'	: 'fade'
	});
	$('#attaque_top500_number_one_link').fancybox({
		'transitionIn'	: 'fade',
		'transitionOut'	: 'fade'
	});
	$('#attaque_totalcomputing_link').fancybox({
		'transitionIn'	: 'fade',
		'transitionOut'	: 'fade'
	});
}

function resetCheckBoxImages()
{
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
}