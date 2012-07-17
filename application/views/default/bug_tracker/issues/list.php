<div id="form_container">
    <h3>list of issues</h3>
    <ol>
        <?php foreach($issueList as $issueObj): ?>
        <li>
            <span><a href="<?=site_url("bug-tracker-issues/view/").'/'.$issueObj->id?>"><?=$issueObj->name?></a></span> |
            <span><?=$issueObj->status?></span> |
            <span><?=$issueObj->priority?></span> |
            <span><?=$issueObj->datetime_lastedited?></span> |
            <span><?=$issueObj->user_id_added?></span>
            <hr>
        </li>
        <?php endforeach; ?>
    </ol>
</div>
