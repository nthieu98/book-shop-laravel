$('.numberic_value').keyup(function() {
	var mul = 1;
	var quantity = Number($('#quantity').val());
	var price = Number($('#price').val());
	mul *= quantity;
	mul *= price;
	// $('.numeric_value').each(function() {
	//     sum += Number($(this).val());
	// });
	console.log(mul);
	$('#total').text(mul);
});
$('.numberic_value').click(function() {
	var mul = 1;
	var quantity = Number($('#quantity').val());
	var price = Number($('#price').val());
	mul *= quantity;
	mul *= price;
	// $('.numeric_value').each(function() {
	//     sum += Number($(this).val());
	// });
	console.log(mul);
	$('#total').text(mul);
});
$('.product_id').keyup(function () {
	var mul = 1;
	var quantity = Number($('#quantity').val());
	var price = Number($('#price').val());
	mul *= quantity;
	mul *= price;
	// $('.numeric_value').each(function() {
	//     sum += Number($(this).val());
	// });
	console.log(mul);
	$('#total').text(mul);
  });
  $('.product_id').click(function() {
	var mul = 1;
	var quantity = Number($('#quantity').val());
	var price = Number($('#price').val());
	mul *= quantity;
	mul *= price;
	// $('.numeric_value').each(function() {
	//     sum += Number($(this).val());
	// });
	console.log(mul);
	$('#total').text(mul);
  });
