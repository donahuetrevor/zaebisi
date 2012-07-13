<div id="form_container">
    <h1>list of issues</h1>
    <?php foreach($issueList as $issueObj): ?>
    <div>
        <a href="<?=site_url("bug-tracker-issues/view/").'/'.$issueObj->id?>"><?=$issueObj->name?></a>
    </div>
    <?php endforeach; ?>
</div>
