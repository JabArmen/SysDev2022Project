<script>
    
      function show() {
    var button2 = document.querySelector("#closeB");
    button2.addEventListener('click', function runThisOnButtonClick(event) {
    
      document.getElementsByClassName("overlay")[0].style.visibility = "hidden";
      document.getElementsByClassName("overlay")[0].style.opacity = "0";
});
    function news(){
    document.getElementsByClassName("overlay")[0].style.visibility = "visible";
    document.getElementsByClassName("overlay")[0].style.opacity = "1";
    }
    document.getElementsByClassName("overlay")[0].style.visibility = "visible";
    document.getElementsByClassName("overlay")[0].style.opacity = "1";
  }
  show();

  </script>