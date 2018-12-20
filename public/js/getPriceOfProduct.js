$('.product_id').keyup(function () {
	$('#price').val(Number($('.product_id option:selected').attr('product-price')));
  });
  $('.product_id').click(function() {
	$('#price').val(Number($('.product_id option:selected').attr('product-price')));
  });
