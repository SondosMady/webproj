<section>
    <section id="applicationContent">
        <h1>Applications</h1>
    <?php

    require ("mysqli_connect.php");
    $q = "SELECT * FROM apply_form WHERE approved = false";
    $r = @mysqli_query($dbc,$q);

    if($r){
        while ($raw = mysqli_fetch_array($r, MYSQLI_ASSOC)){
            echo "<div class=\"form\">
                    <p>".$raw['first_name']." ".$raw['last_name']."</p>
                    <p>".$raw['email']."</p>
                    <p>".$raw['phone_number']."</p>
                    <p>".$raw['interests']."</p>
                    <a style=\"color: #72c971\" id=\"1\" onclick=\"approvingForm(this)\">Approve</a>
                    <a style=\"color: #c97876\" id=\"0\" onclick=\"approvingForm(this)\">Disapprove</a>
                </div>";
        }
    }
    ?>
    </section>
</section>