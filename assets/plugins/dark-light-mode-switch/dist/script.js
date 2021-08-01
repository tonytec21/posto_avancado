$('#main_dark_mode').toggleClass(localStorage.toggled);

function darkLight() {
  /*DARK CLASS*/
  if (localStorage.toggled != 'dark') {
    $('#main_dark_mode, p').toggleClass('dark', true);
    localStorage.toggled = "dark";
     
  } else {
    $('#main_dark_mode, p').toggleClass('dark', false);
    localStorage.toggled = "";
  }
}

/*Add 'checked' property to input if background == dark*/
if ($('#main_dark_mode').hasClass('dark')) {

$( "#checkBox_darkmode").prop('checked', true);
 
   
} else {

  $( "#checkBox_darkmode").prop('checked', false);

}