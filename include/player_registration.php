<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #00FFC1;
}

/* Style the buttons inside the tab */
.tab a {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab a:hover {
  background-color: #00A2FF;
  color: black;
}

/* Create an active/current tablink class */
.tab a.active {
  background-color: #FF7800;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

</style>
</head>
<body>

<div class="tab">
  <a class="tablinks" onclick="openCity(event, 'p1')" href="#IDontExist" >Player 1 (Leader)</a>
  <a class="tablinks" onclick="openCity(event, 'p2')" href="#IDontExist" >Player 2 </a>
  <a class="tablinks" onclick="openCity(event, 'p3')" href="#IDontExist" >Player 3 </a>
  <a class="tablinks" onclick="openCity(event, 'p4')" href="#IDontExist" >Player 4 </a>
</div>

<div id="p1" class="tabcontent">
  <h3 align="center"><u>Team Leader</u></h3>
  
  <label for="field1"><span>Game Name <span class="required">*</span></span><input type="text" class="input-field" name="p1_name" value="" placeholder="Game name goes here..." required="" /></label> 

  <label for="field1"><span>Whatsapp No <span class="required">*</span></span><input type="tel" class="input-field" name="p1_whp" value="" placeholder="Whatsapp Number goes here..." required="" /></label>


</div>

<div id="p2" class="tabcontent">
  <h3 align="center"><u>Player 2</u></h3>
  
  <label for="field1"><span>Game Name <span class="required">*</span></span><input type="text" class="input-field" name="p2_name" value="" placeholder="Game name goes here..." /></label>  
  <label for="field1"><span>Whatsapp No <span class="required">*</span></span><input type="tel" class="input-field" name="p2_whp" value="" placeholder="Whatsapp Number goes here..."  /></label>
</div>

<div id="p3" class="tabcontent">
  <h3 align="center"><u>Player 3</u></h3>
   <label for="field1"><span>Game Name <span class="required">*</span></span><input type="text" class="input-field" name="p3_name" value="" placeholder="Game name goes here..."  /></label>
  <label for="field1"><span>Whatsapp No <span class="required">*</span></span><input type="tel" class="input-field" name="p3_whp" value="" placeholder="Whatsapp Number goes here..." /></label>
</div>

<div id="p4" class="tabcontent">
  <h3 align="center"><u>Player 4</u></h3>
  
  <label for="field1"><span>Game Name <span class="required">*</span></span><input type="text" class="input-field" name="p4_name" value="" placeholder="Game name goes here..." /></label>

  <label for="field1"><span>Whatsapp No <span class="required">*</span></span><input type="tel" class="input-field" name="p4_whp" value="" placeholder="Whatsapp Number goes here..." /></label>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>