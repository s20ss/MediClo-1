$('#blur').click(function(){
  $('img').addClass('unfocus');
  $('#modal').fadeIn('slow');
  $('.info').fadeIn('slow');
  });

$('#modal').click(function(){
  $('img').removeClass('unfocus');
  $(this).fadeOut('fast');
  $('.info').fadeOut('slow');
});