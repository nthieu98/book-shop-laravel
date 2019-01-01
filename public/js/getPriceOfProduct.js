$('.product_id').keyup(function () {
  $('#price').val(Number($('.product_id option:selected').attr('product-price')));
  var name = (($('.product_id option:selected').attr('product-name')));
  // var value = $("option:selected", this).val();
    // $("#name > option[value=" + name + "]").attr("selected", true);
  $('#name').val(name);

  });
  $('.product_id').click(function() {
    console.log($('#pname').val());
    $('#price').val(Number($('.product_id option:selected').attr('product-price')));
    var name = (($('.product_id option:selected').attr('product-name')));
    $("#s2id_pname > option[value='" + String(name) + "']").attr("selected", true);
    // name = '12';
    // console.log(name);
    // $('#pname').val(name);
    console.log($('#s2id_pname').val());
    // window.open(location.reload(true));
    // document.getElementById('name').value=name;

});
