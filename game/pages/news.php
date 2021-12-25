<div class="row">

    <div class="col-9">

        <div class="card bg-dark">
            <div class="card-header bg-dark">Latest update</div>
            <div class="card-body bg-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quas omnis quam inventore eum quidem error, non nihil ullam nam repellendus minus soluta libero maiores blanditiis eius enim cum? Quam.</div>
        </div>

    </div>
    <div class="col-3">
        <div class="card bg-dark">
            <div class="card-header bg-dark text-center">Ranking</div>
            <div class="card-body bg-dark">
                <?php 
                
                    $characters = Character::getAll("level");
                    $i = 1;
                    foreach ($characters as $id => $char) {
                        echo '<div class="col-5 text-start float-start">'.$i.". ".$char["name"].'</div><div class="col-5 text-end float-end">Lv. '.$char["level"].'</div>';
                        $i++;
                    }
                
                ?>
            </div>
        </div>
    </div>

</div>