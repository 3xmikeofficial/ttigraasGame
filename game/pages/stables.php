<div class="card bg-dark">
    <div class="card-header">Stables</div>
    <div class="card-body">
        <form action="<?php $PHP_SELF; ?>" method="post">
            <select name="mounts" class="form-control">
                <option value="mount[]">Pony</option>
                <option value="mount[]">Horse</option>
                <option value="mount[]">Unicorn</option>
                <option value="mount[]">Direwolf</option>
                <option value="mount[]">Dragon</option>
            </select>
            <input type="submit" name="buy_mount" value="Purchase" class="btn btn-success bg-success mt-3 form-control">
        </form>
        <?php 
            if(isset($_POST["buy_mount"])){
                echo Core::Alert("Work in progress!", "danger");
            }
        ?>
    </div>
</div>