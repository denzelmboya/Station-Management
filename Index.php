<!DOCTYPE html>
<html>
<head>
<style>
h1 {
  position: relative;
  left: 320px;
  top: 50px;
  font-size:60px;
  text-shadow: 2px 2px 20px gold;
  width: 730px;
}
h2 {
  position: relative;
  left: 250px;
  font-size:200%;
  font-family:Microsoft JhengHei Light;
}
h3 {
  position: relative;
  left: 250px;
  bottom: 6px;
  font-size:200%;
  font-family:Microsoft JhengHei Light;
}
.station {
  padding: 2px -3px;
  font-size:100px;
  height: 1px;
  text-shadow: 2px 2px 20px gold;
}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
#header{
	background-color: gold;
	height: 330px;
    position: static;
    top: 30px;
    width: 100%;
	display: inline-block;
	margin:0 auto;
}
div.motto {
  position: absolute;
  top: 184px;
  left: 520px;
  width: 280px;
  height: 100px;
  font-size: 25px;
  color: grey;
  font-family: Brush Script Std;
}
ul {
  list-style-type: none;
  margin: 10px;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  top: 45px;
  position: relative;
  left: 268px;
  width: 800px;
  display: inline-block;
}
li {
  float: left;
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 27.2px;
  text-decoration: none;
}
li a:hover {
  background-color: #111;
}
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=submit]:hover {
  background-color: #45a049;
}
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 16px;
}
.button {
  padding: 10px 6px;
  font-size: 14px;
  position: relative;
  left: 110px;
  bottom: 58px;
  cursor: pointer;
}
.logg{
   background-color: #4CAF50;
   margin: 8px 0;
   padding: 10px 6px;
   top:350px;
   display: inline;
   float: left;
   margin-right:-104px;
}
</style>
<title>Petrol Station</title>
</head>
<body>
<section id="header" ><h1>KOBIL STATION ONLINE</h1>
<div class="motto">Help Us Serve You Better</div>
<ul>
  <li><a  href="index.php?page=pumps">Pumps &nbsp; &nbsp; </a></li>
  <li><a  href="index.php?page=tanks">Tanks &nbsp; &nbsp; </a></li>
  <li><a  href="index.php?page=sales">Sales &nbsp; &nbsp; </a></li>
  <li><a  href="index.php?page=fuel">Fuel &nbsp; &nbsp; </a></li>
  <li><a  href="index.php?page=refill">Refill &nbsp;&nbsp; </a></li>
  <li><a  href="index.php?page=attendants">Attendants &nbsp; &nbsp; </a></li>
  <li><a  href="index.php?page=readings">Readings &nbsp; &nbsp; </a></li>
</ul></section>
<div class="logg" ><a href="index.php?page=login" style="text-decoration:none;">login</a></div>
<?php
if(isset($_GET['page'])){
	if($_GET['page']=='pumps'){
		include_once('pumptables.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='edit'){
		include_once('edit.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='forms'){
		include_once('pumps.html');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='tanks'){
		include_once('tanktables.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='edittable'){
		include_once('edittable.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='formtank'){
		include_once('tanks.html');
	}
    else{
		if(isset($_GET['page'])){
	if($_GET['page']=='sales'){
		include_once('salestable.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='salestable'){
		include_once('editsales.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='formsales'){
		include_once('sales.html');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='fuel'){
		include_once('fueltable.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='fueledit'){
		include_once('editfuel.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='fuelform'){
		include_once('fuel.html');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='refill'){
		include_once('refilltable.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='editrefill'){
		include_once('editrefill.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='refillform'){
		include_once('refill.html');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='attendants'){
		include_once('attendantstable.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='editattendants'){
		include_once('editattendants.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='attendantsform'){
		include_once('attendants.html');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='readings'){
		include_once('readingstable.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='editreading'){
		include_once('editreading.php');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='readingsform'){
		include_once('readings.html');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='login'){
		include_once('login.html');
	}
	else{
		if(isset($_GET['page'])){
	if($_GET['page']=='signup'){
		include_once('signup.html');
	}
}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}}
?>
</body>
</html>