$(document).ready(function() {

	$("#F_scode").focus();

	$(function() {
        $('#input-search').on('keyup', function() {
          var rex = new RegExp($(this).val(), 'i');
            $('.searchable-container .st_item').hide();
            $('.searchable-container .st_item').filter(function() {
                return rex.test($(this).text());
            }).show();
        });
    });

	$('#alertsForm').on('change keyup',function(){
		var who = $('#F_who').val();
		var position = $('#F_position').val();
		var title = $('#F_title').val();
		var contents = $('#F_contents').val();
		var link = $('#F_link').val();
		var category1 = $('#F_category1').val();
		var category2 = $('#F_category2').val();
		var dayend = $('#F_dayend').val();

		$(".F_title").text(title);
		$(".F_contents").text(contents);
		$(".F_who").text(who);
		$(".F_position").text(position);
		$(".F_link").text(link);
		$(".F_category1").text(category1);
		$(".F_category2").text(category2);
		$(".F_dayend").text(dayend);
	});

	$('#contactForm').on('change keyup',function(){
		var mail = $('#staffmail').val();
		var name = $('#staffname').val();
		var to = $('#staffto').val();
		var title = $('#subject').val();
		var msg = $('#staffoffer').val();

		$('#re_title').text(title);
		$('#re_from').text(mail);
		$('#re_name').text(name);
		$('#re_to').text(to);
		$('#re_message').text(msg);

		if (mail != "" && name != "" && to != "" && title != "" && msg != "") {
			$("#submit_contact").prop("disabled", false);
			$('#contact_error').text('');
			$('#contact_error2').text('送信出来ます。');
			$('#contact_error2').addClass('green');
			$('#contact_error2').removeClass('red');
			$('#mail_checker3').addClass('blue');
			$('#mail_checker3').removeClass('yellow');
		}else{
			$("#submit_contact").prop("disabled", true);
			$('#contact_error').text('すべて必須入力項目です');
			$('#contact_error2').text('まだ送信出来ません');
			$('#contact_error2').addClass('red');
			$('#contact_error2').removeClass('green');
			$('#mail_checker3').addClass('yellow');
			$('#mail_checker3').removeClass('blue');
		}
	});
});

