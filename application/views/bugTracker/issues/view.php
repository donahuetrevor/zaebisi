<div id="form_container">
    <a href="<?=site_url("bug-tracker-issues/list/")?>"><?=ucfirst(_('Go to issue list'))?></a>

    <h3>Issue Detail</h3>
    Date : <span><?=$issueObj->datetime_added?></span>  <br />

    Title : <span><?=$issueObj->name?></span>       <br />
    <hr>
    <p><?=$issueObj->description?></p>
    <hr>
    <br />
</div>

<div class="comments">
    <?php if ( $issueObj->commentmode == '1'): ?>
        <?php include(APPPATH.'views\bugTracker\comments\list.php'); ?>
        <a href="<?=site_url("bug-tracker-issue-comment/create/".$issueObj->id)?>"><?=ucfirst(_('Add commnet'))?></a>

    <?php else : ?>
             <h3>Topic of commets was closed</h3>
    <?php endif; ?>
</div>

