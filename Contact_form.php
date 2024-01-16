 <?php

require 'config.php';



if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['delete_submit'])){
        if(isset($_POST['delete_attribute']) && isset($_POST['delete_value'])){
        $delete_attribute = $_POST['delete_attribute'];
        $delete_value = $_POST['delete_value'];

        $sql = "DELETE FROM contact_form WHERE $delete_attribute = '$delete_value'";
        if(mysqli_query($conn, $sql)){
            echo"value deleted successfully";
            }
            else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            header("Location: Contact_form.php");
            exit();

        }
        else{
            echo "please enter the attribute and value";
        }
        
    }

    else{
    echo'form submitted successfully';
    $name = $_POST['name'];
    $age = $_POST['age'];
    $number = $_POST['number'];
    $email = $_POST['email'];


    $sql = "INSERT INTO contact_form (name , number , age , email) VALUES ('$name' , '$number' , '$age' , '$email')";
    if(mysqli_query($conn, $sql)){
    echo"table updated successfully";
    }
    else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    header("Location: Contact_form.php");
    exit();
}
}




?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <style> 
        body{
            background-color: orange;
            height:calc(100vh-10px);
            width: calc(100%-10px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transform: translate(0, 50%);

        }

        .container{
            background-color: azure;
            height: max-content;
            width: 50%;
            display: flex;
            /* flex-direction: column; */
            justify-content: space-between;
            align-items: center;
            border: 5px solid black;
            margin: 10px;
        }

        label,input{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            font-weight:400;
            color: black;
            padding:5px;
            margin: 5px;
            font-size: large;
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        form{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            height: 100%;
            width: 100%;
            margin: 20px;
        }

        .data_table{
            background-color: azure;
            height: auto;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 5px solid black;
            margin: 10px;
        }

    </style>

    
    <div class = "container">
        
    <!-- -------name -->
    <div>
    <h1 style="margin:20px"> Contact Form </h1>
    <form method="POST" action="Contact_form.php" onsubmit="event.preventDefault">
    <label> Name </label>
    <input type="text" required id="name" name="name" placeholder="Enter your name">
    <!-- Age -->
    <label> Age </label>
    <input type="number" required id="age" name="age" placeholder="Enter your age">
    <!-- email Id -->
    <label> Email Id </label>
    <input type="email" required id="email" name="email" placeholder="Enter your Email-Id">
    <!-- phone number -->
    <label> Phone Number </label>
    <input type="text" required id="number" name="number" placeholder="Enter your phone number">
    
    <button type="submit" name="submit" style = "background:green ;font-size:large; padding:5px; margin:5px ; border-radius:5px ; transform:translate(50%,0) ;cursor:pointer">Submit</button>
</form>
</div>

        <div>
            <span> <h2 style="margin:20px"> DELETE FORM </h2> </span>
            
            <form method="POST" action= "contact_form.php" onsubmit="event.preventDefault">
            
                <input type="text" id="delete_attribute" name="delete_attribute" placeholder="ATTRIBUTE ">
                <input type="text" id="delete_value" name="delete_value" placeholder="VALUE">
                <button type="submit" name="delete_submit" style="background:red ;font-size:large; padding:5px; margin:5px ; border-radius:5px ; transform:translate(50%,0); cursor:pointer">Delete</button>
            
            </form>
        </div>
</div>

<div class= "data_table">
    <?php 
    $sql = "SELECT * FROM contact_form";
    $result = mysqli_query($conn, $sql);
    echo "<table border='1'>
    <tr>
    <th>Name</th>
    <th>Age</th>
    <th>Email</th>
    <th>Phone Number</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['age'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['number'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    ;

    ?>
</div>


</body>
</html>