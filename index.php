<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 5px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
}

}
.x{
    text-align:center;
     
}
  .button3 {background-color: #f44336;}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}


label {
color: RED;
font-weight: bold;
display: block;
width: 150px;
float: center;
}
</style>
  
   
</head>
<body>


<?php






$host="remotemysql.com";
$dbname="uDYKY0PoM9";
$user="uDYKY0PoM9";
$pass="J0YI906nOw";

try{
$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

for($i=0;$i<9999;$i++)
if(isset($_POST[$i]))
 if($_POST[$i]=='Stergere'){

 $sql="DELETE FROM caini WHERE id=$i"; 
 $q = $DBH->prepare($sql);
      $q->execute(['id' => $i]);
 }
else if($_POST[$i]=='Modificare')
echo "AM VRUT SA MODIFIC RANDUL $i"; 

if(isset($_POST['inserare'])){
    $statement="INSERT INTO caini (id,rasa,nume,greutateKg,inaltimeCm) values (?,?,?,?,?)";
    $stmt = $DBH->prepare($statement);
    $stmt->execute([$_POST['id_caine'],$_POST['Rasa'],$_POST['Nume'],$_POST['Greutate'],$_POST['Inaltime']]);
}

$sd = $DBH->query('SELECT * from caini');

echo "<table class='table table-hover' style='width:60%; margin-right: auto; margin-left: auto; ' >";
echo "<tr>";
echo  " <th> id     </th>";
echo  "<th> Rasa    </th>";
echo   "<th> Nume      </th>";
echo  "<th> Greutate Kg   </th>";
echo  "<th> Inaltime Cm</th>";
echo   "<th> STERGERE    </th>";



while($row=$sd->fetch()){
    echo "<tr>";
    $aux=$row['id'];
    echo "<td>".$row['id']."</td>" ;
    echo "<td>".$row['rasa']."</td>";
    echo "<td>".$row['nume']."</td>";
    echo "<td>".$row['greutateKg']."</td>";
    echo "<td>".$row['inaltimeCm']."</td>";
    echo "<td>"."<form method='post'><input type='submit' name=$aux class='button3' value='Stergere'"."</tr>";
    

}


?>
</table>
<div>
<form method="post"> 
        <label> id_caine </label>
        <input type="text" name="id_caine">
        <br>
        <label> Rasa </label>
        <input type="text" name="Rasa">
        <br>
        <label> Nume </label>
        <input type="text" name="Nume">
        <br>
        <label> Greutate</label>
        <input type="text" name="Greutate">
        <br>
        <label> Inaltime </label>
        <input type="text" name="Inaltime">
        

 <br><br>
        <input type="submit" name="inserare"
        class="button" value="inserare" /> 
    </form>
</div>

