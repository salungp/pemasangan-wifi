$(function() {
  let currentLink = $('a[href="'+location.href+'"]').parents('li')
  currentLink.addClass('active')
	$('.select2').select2()
});


$(function () {
  $('#example1').DataTable();
});

if (document.querySelector('#harga')) {
	new rupiahFormat('#harga').getValue();
}

$('.box-table').css('overflow-x', 'auto');

$('#logo').on('change', previewImage);

function previewImage() {
	let oFReader = new FileReader()
			oFReader.readAsDataURL(document.getElementById('logo').files[0]);

	oFReader.onload = oFREvent => {
		$('#button-logo').css('background', '#ffffff');
		$('#button-logo i').hide();
		$('#image-preview').show();
		$('#image-preview').attr('src', oFREvent.target.result);
	}
}