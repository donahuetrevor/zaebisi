<div id="form_container">
    <h1>list of issues</h1>
    <?php foreach($issueList as $issueObj): ?>
    <div>
        <a href="<?=base_url("bug-tracker-issue/view/").'/'.$issueObj->id?>"><?=$issueObj->name?></a>
    </div>
    <?php endforeach; ?>
</div>
