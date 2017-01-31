<!DOCTYPE html>
<html>
<script type="text/javascript" src="js/jquery.js"></script>
<link rel="stylesheet" href="css/css101.css">
<script type="text/javascript">
var count = 0;
$(function(){
    $('p#add_field').click(function(){
        count += 1;
        $('#container').append(
                '<strong>Problem #' + count + '</strong><br />' 
                + 'Joddd<br>' +'<textarea rows="4" cols="50" name="task[]"></textarea><br>' 
                + 'A:' + '<input id="cA_' + count + '" name="choiceA[]' + '" type="text" />'
                + 'B:' + '<input id="cB_' + count + '" name="choiceB[]' + '" type="text" />'
                + 'C:' + '<input id="cC_' + count + '" name="choiceC[]' + '" type="text" />'
                + 'D:' + '<input id="cD_' + count + '" name="choiceD[]' + '" type="text" />'
                + 'Key:' + '<input id="key_' + count + '" name="key[]' + '" type="text" />'
                + '<br>');
    
    });
});
</script> 

<body>

<?php
    //If form was submitted
    if (isset($_POST['btnSubmit'])) {
        //create instance of database class
        include('connect_upload.php');
        $db = new mysqli($servername, $username, $password);
        
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        if(mysqli_select_db($db, "expassion"))
            echo "yes\n";
        else echo "no\n";
        /* return name of current default database */
        if ($result = mysqli_query($db, "SELECT DATABASE()")) {
            $row = mysqli_fetch_row($result);
            printf("Default database is %s.\n",$row[0]);
            mysqli_free_result($result);
        }
        //Check if user has actually added additional task to prevent a php error
        if ($_POST['task']) {
            
            $contest_name = $_POST['contest_name'];
            $subject = $_POST['category'];
            echo "$contest_name "."$subject<br>"; 
            $sql_contest = "INSERT INTO contest (name, grouptask) VALUES ('$contest_name', '$subject')";
            if($db->query($sql_contest)){
                echo "contest added!";
            }
            else echo "no contest added!  "."$db->error";
            //get last inserted userid
            $inserted_contest_id = $db->insert_id;
            
            //Loop through added task
            $i = 0;
            foreach ( $_POST['task'] as $val ) {
                $task = $_POST['task'][$i];
                $cA = $_POST['choiceA'][$i];
                $cB = $_POST['choiceB'][$i];
                $cC = $_POST['choiceC'][$i];
                $cD = $_POST['choiceD'][$i];
                $key = $_POST['key'][$i];
                $i++;
                /*//Insert into websites table
                $sql_website = sprintf("INSERT INTO websites (Website_URL) VALUES ('%s')",
                                       $db->real_escape_string($value) );  
                $result_website = $db->query($sql_website);
                $inserted_website_id = $db->insert_id;
                
                //Insert into users_websites_link table
                $sql_users_website = sprintf("INSERT INTO users_websites_link (UserID, WebsiteID) VALUES ('%s','%s')",
                                       $db->real_escape_string($inserted_user_id),
                                       $db->real_escape_string($inserted_website_id) );  
                $result_users_website = $db->query($sql_users_website);
                */
                $sql_task = "INSERT INTO task (subject, grouptask, task, choiceA, choiceB, choiceC, choiceD, checkAnswer)
                            VALUES ('$subject', '$inserted_contest_id', '$task', '$cA', '$cB', '$cC', '$cD', '$key')";
                if($db->query($sql_task))
                    echo "task added!";
                else echo "Error :  "."$db->error";
            }
            
        } else {
        
            //No additional task added by user
            
        }
        echo "<h1>User Added, <strong>" . count($_POST['task']) . "</strong> website(s) added for this user!</h1>";
        
        //disconnect mysql connection
        $db->close();
    }
?>

<?php if (!isset($_POST['btnSubmit'])) { ?>
    <h1>New Contest</h1>
    <form name="test" method="post" action="">
        <label for="name">Contest:</label>
        <input type="text" name="contest_name" id="contest" />
        
        <div class="spacer"></div>
        
        <label for="name">Subject:</label>
        <select id="category-select" name="category">
            <option value="">select subject</option>
            <option value="0" >Mathemetics</option>
            <option value="1" >English</option>
            <option value="2" >Social</option>
            <option value="3" >Physics</option>
            <option value="4" >Chemistry</option>
            <option value="5" >Biology</option>
            <option value="6" >Thai</option>
        </select>
        
        <div class="spacer"></div>
    
        <div id="container">
            <p id="add_field"><a href="#"><span>&raquo; Add problems.....</span></a></p>
        </div>
        
        <div class="spacer"></div>
        <input id="go" name="btnSubmit" type="submit" value="Submit" class="btn" />
    </form>
<?php } ?>


<!--
<form action="addtask.php" method="post">
    <p>Joddd</p>
    <textarea rows="4" cols="50" name="Z"></textarea><br>
    A: <input type="text" name="A"><br>
    B: <input type="text" name="B"><br>
    C: <input type="text" name="C"><br>
    D: <input type="text" name="D"><br>
    Key: <input type="text" name="key"><br>
    <input type="submit">
 </form>
*/
-->


        <script src="js/vendor/what-input.js"></script>
        <script src="js/vendor/foundation.js"></script>
        <script src="js/app.js"></script>
</body>
</html>