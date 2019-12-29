$(document).ready(function() {
 $("#signup").click(function() {
   $("#first").css("display","box");
   $("#first").slideUp("slow", function() {
     $("#second").slideDown("slow");

   });
 });

 $("#signin").click(function() {
   $("#second").slideUp("slow", function() {
     $("#first").slideDown("slow");

   });
 });


});
function myFunction() {
  var x = $(document).getElementById("#second");

    console.log(1);
  if (x.style.display === "none") {
    console.log(2);
    x.style.display = "block";
  }else {
    console.log(3);
    x.style.display = "none";
  }
};

//this code is not working check whats wrong, maybe JQuery link in register.php,
//once its working add #second {display: none} to register_style.css
