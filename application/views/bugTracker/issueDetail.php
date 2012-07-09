<a href="<?=base_url("index.php/bugTracker/create_issue")?>">back to issues</a>
<div>
<?php foreach($issue as $issueObj): ?>
        <?= $issueObj->name?>
<?php endforeach; ?>
</div>
