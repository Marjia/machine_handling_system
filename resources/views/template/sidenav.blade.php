
    <div id="mainbox" onclick="openfunction()">&#9776;</div>
    <div id="menu" class="sidemenu">
      <a href="#">profile</a>
      <a href="#">Dashboard</a>
      <a href="#" class="closebtn" onclick="closefunction()">$times;</a>
    </div>
<script type="text/javascript">
function openfunction(){
  document.getElementById("menu").style.width="300px";
  document.getElementById("mainbox").style.marginleft="300px";
}
function closefunction(){
  document.getElementById("menu").style.width="0px";
  document.getElementById("mainbox").style.marginleft="0px";
}

</script>
