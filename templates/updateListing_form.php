<?php foreach ($rows as $row): ?>


<h3><?= $row["title"] ?></h3>

<div>

    <p> <?= $row["Description"]?></p>

    <p><?= $row["Address"]?></p>
    <form action="updateSpecificListing.php" method="post">
                    <input type="hidden" name="hidden2" value="<?= $row['propertyid'] ?>">
                    <button class="btn" type="submit" value="Update this listing">Update this listing</button>
    </form>
</div>

<hr>

<? endforeach ?> 

