<?php

class Shows
{
    
    
    function show_films()
    {
        
//connect to rdmbs database business
// Create connection
        $conn = mysqli_connect("localhost", "root", "", "galaxy cinema");
// Check connection
        if (!$conn) 
        {
           die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * from films ";
        
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) >0)
        {
            $row=mysqli_fetch_assoc($result);
            echo "<div class='films'>";
            echo  "<label><input type= 'radio' name='film' checked value=$row[ID]> $row[Title],   : $row[Start],    :$row[End]</label>";
            echo "</div>";
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<div class='films'>";
                echo  "<label><input type= 'radio' name='film' value=$row[ID] >$row[Title],       : $row[Start],      :$row[End]</label>";
                echo "</div>";
                
            }
          
            mysqli_close($conn);
        
        }
        
            
            
         
              
        
    }


    
    
    
    
}

