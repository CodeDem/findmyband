$(document).ready(function () {
  //on click Sign up show registration form and hide login
  $("#signup").click(function () {
    $("#first").slideUp("slow",function () {
        $("#second").slideDown("slow");
    });
  });

  //on click Sign up show Login form and hide registration
  $("#signin").click(function () {
    $("#second").slideUp("slow",function () {
        $("#first").slideDown("slow");
    });
  });
});
