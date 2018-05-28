<section>
    <section id="applicationContent">
        <h1>Teachers</h1>
        <?php

        require ("mysqli_connect.php");
        $q = "SELECT lname FROM teacher WHERE";
        $r = @mysqli_query($dbc,$q);

        if($r){
            while ($raw = mysqli_fetch_array($r, MYSQLI_ASSOC)){
                echo "<div class=\"form\">
                    <p>".$raw['lname']."</p>
                    <a style=\"color: #c97876\" onclick=\"removeTeacher(this)\">Remove</a>
                </div>";
            }
        }
        ?>
    </section>
</section>