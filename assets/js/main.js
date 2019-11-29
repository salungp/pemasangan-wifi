$(function() {
  let currentLink = $('a[href="'+location.href+'"]').parents('li');
  currentLink.addClass('active');
});

$(function () {
  $('#example1').DataTable();
});

if (document.querySelector('#harga')) {
	new rupiahFormat('#harga').getValue();
}

$('.box-table').css('overflow-x', 'auto');