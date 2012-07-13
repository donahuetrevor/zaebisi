<div id="form_container">
    <h1>Issue Detail</h1>
    Name : <span><?=$issueObj->name?></span>       <br />
    Date : <span><?=$issueObj->datetime_added?></span>
</div>

<div class="comments">
    <?php include(VIEWPATH.'bug_tracker\comments\list.php'); ?>
    <?php //include('../comments/create.php'); ?>
</div>

