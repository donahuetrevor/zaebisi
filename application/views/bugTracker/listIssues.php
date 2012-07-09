<div>
<?php foreach($issueList as $issueObj): ?>
  <div>
      <a href="<?=base_url("index.php/bugTracker/detail_issue?")?>id_issue=<?=$issueObj->id?>"><?=$issueObj->name?></a>
  </div>
<?php endforeach; ?>
</div>
