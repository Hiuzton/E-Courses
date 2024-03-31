<?php
require("mysql.php");

$sql = "SELECT * FROM user_question ORDER BY id desc";
$result= mysqli_query($conexiune, $sql);
if(mysqli_num_rows($result)>0){
   while($row=mysqli_fetch_array($result)){
    echo "<article>
            <div class=\"users-ques\">
               <div class=\"dates\">
               <h4>".$row['name'].":</h4>
               <p>".$row['ques_time']."</p>
               </div>
               <p>".$row['question']."</p>
            </div>
           <hr> 
         </article";
   }
}
?>