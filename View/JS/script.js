$(document).ready(function () {
  $("#otp").click(function () {
    $.ajax({
      type: "POST",
      url: "./Controller/otp.php",
      data: {
        email: $('#email').val()
      },
      success: function (response) {
        $('#otpf').show();
        $('#email').hide();
      },
    });
  });

  $(document).on('click','.cart',function(){
    var productId = $(this).data('productid');
    var email = $(this).data('user');
    $.ajax({
      url: "../Controller/ajax-cart.php",
      method: 'POST',
      data: {
        'product-id': productId,
        'email' : email
      },
      success: function (response) {
        console.log(response);
      }

    })
    })

    $(document).on('click','.remove',function(){
      var id = $(this).data('productid');
      var user = $(this).data('user');
      console.log(id);
      console.log(user);
      $.ajax({
        url: "../Controller/ajax-cart-delete.php",
        method: 'POST',
        data: {
          'product-id': id,
          'user': user
        },
        success: function (response) {
          console.log(response);
          location.reload();
        }

      })
    })

  $(document).on('click', '.buy', function () {
    var id = $(this).data('productid');
    var user = $(this).data('user');
    console.log(id);
    console.log(user);
    $.ajax({
      url: "../Controller/ajax-buy.php",
      method: 'POST',
      data: {
        'product-id': id,
        'user': user
      },
      success: function (response) {

        location.reload();
        alert("Order Placed succesfully and invoice sent on your mail!!!");
      }

    })
  })
  })

