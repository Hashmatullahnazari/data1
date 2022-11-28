function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}



ClassicEditor
.create( document.querySelector( '#editor' ) )
.catch( error => {
console.error( error );
} );
