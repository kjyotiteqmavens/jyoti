$(document).ready(function () {
  $('#form').validate({
    rules: {
      fname: {
        required: true,
      },
      lname: {
        required: true,
      },
      phone: {
        required: true,
        minlength: 10,
        maxlength: 12,
        digits: true,

      },
      email: {
        required: true,
        email: true,
        maxlength: 255,

      },
      password: {
        required: true,
        minlength: 4
      },
      confirmpassword: {
        required: true,
        minlength: 4,
        equalTo: "#password"
      },
  
      gender: {
        required: true,
      }
    },
    messages: {
      fname: "Please enter your FirstName",
      lname: "Please enter your lastName",
      email: "Please enter your email",
      pss: "Please enter your password",
      cpss: "Please enter your confirm_password",
      phone: "Please enter your phone",
      gender: "Please select one",



    }

  });



});
