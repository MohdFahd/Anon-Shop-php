$(document).ready(function () {
  var isLiked = false;
  $(".btn-action").on("click", function () {
    var productId = $(this).data("product-id");
    console.log(productId);

    // Toggle the flag variable
    isLiked = !isLiked;

    // Determine the background color and text color based on the current state
    var newBackColor = isLiked ? "black" : "";
    var newColor = isLiked ? "white" : "";

    //Check if the background color is already applied
    if ($(this).css("background-color") != newBackColor || "") {
      $(this).css("background-color", newBackColor);
    }

    // Check if the text color is already applied
    if ($(this).css("color") != newColor || "") {
      $(this).css("color", newColor);
    }

    // Send an AJAX request to update the database
    $.ajax({
      type: "POST",
      url: "functions/code.php",
      data: {
        pro_id: productId,
        myfavorites: true,
      },
      success: function (response) {
        if (response == 200) {
          $(".count-heart").load(location.href + " .count-heart > *");
          $(".count-heart-m").load(location.href + " .count-heart-m > *");
        } else if (response == 300) {
          window.location.href = "./login.php";
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
      },
    });
  });
});
$(document).ready(function () {
  $(".addtocart").on("click", function () {
    var productId = $(this).data("product-id");
    var exsitQty = $(this).find(".exsit_qty").data("exsit_qty");
    console.log(exsitQty);
    console.log("Button clicked"); // Add this line for debugging
    // Send an AJAX request to update the database
    $.ajax({
      type: "POST",
      url: "./functions/code.php",
      data: {
        pro_id: productId,
        qty: 1,
        exsitQty: "exsitQty",
        addtocart: true,
      },
      success: function (response) {
        if (response == 200) {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Your product has been saved",
            showConfirmButton: false,
            timer: 1500,
          });
        } else if (response == 300) {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Your product has been updated",
            showConfirmButton: false,
            timer: 1500,
          });
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
      },
    });
  });
});
// $(document).ready(function () {
//   $(".cancel_order").on("click", function () {
//     var order_id = $(this).find(".cancel_order").data("exsit_qty");
//     console.log("Button clicked"); // Add this line for debugging
//     console.log(order_id);
//     Send an AJAX request to update the database
//     $.ajax({
//       type: "POST",
//       url: "./functions/code.php",
//       data: {
//         pro_id: productId,
//         qty: 1,
//         exsitQty: "exsitQty",
//         addtocart: true,
//       },
//       success: function (response) {
//         if (response == 200) {
//           Swal.fire({
//             position: "center",
//             icon: "success",
//             title: "Your product has been saved",
//             showConfirmButton: false,
//             timer: 1500,
//           });
//         } else if (response == 300) {
//           Swal.fire({
//             position: "center",
//             icon: "success",
//             title: "Your product has been updated",
//             showConfirmButton: false,
//             timer: 1500,
//           });
//         }
//       },
//       error: function (xhr, status, error) {
//         console.error("AJAX Error:", error);
//       },
//     });
//   });
// });
//

$(document).ready(function () {
  // Add click event handlers for the buttons
  $(".button-plus").on("click", function () {
    var inputField = $(this).closest(".input-group").find(".quantity-field");
    // Increment the value in the input field (up to max)
    inputField.val(function (i, currentValue) {
      var newValue = parseInt(currentValue, 20) + 1;
      return newValue <= 20 ? newValue : currentValue;
    });
  });

  $(".button-minus").on("click", function () {
    var inputField = $(this).closest(".input-group").find(".quantity-field");
    // Decrement the value in the input field (down to min)
    inputField.val(function (i, currentValue) {
      var newValue = parseInt(currentValue, 20) - 1;
      return newValue >= 1 ? newValue : currentValue;
    });
  });
});
$(document).ready(function () {
  $(document).on("click", "#btn_action", function (e) {
    e.preventDefault();
    var productId = $(this).data("product-id");
    console.log(productId);
    $.ajax({
      type: "POST",
      url: "functions/code.php",
      data: {
        pro_id: productId,
        myfavoritesDelete: true,
      },
      success: function (response) {
        if (response == 200) {
          $(".myfavorite").load(location.href + " .myfavorite > *");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
      },
    });
  });
});
