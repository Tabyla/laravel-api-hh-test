$(document).ready(function () {
  $('.letter').on('click', function () {
    $('.letter').css('color', 'black');
    $('.city-list').hide();
    const selectedLetter = $(this).data('letter');
    $('#city-list-' + selectedLetter).show();
    $(this).css('color', '#0070ff');
  });
});
