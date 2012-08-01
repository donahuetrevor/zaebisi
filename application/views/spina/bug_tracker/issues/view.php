<a href="<?=site_url("bug-tracker-issues/list/")?>" class="button"><?=ucfirst(_('go back'))?></a>
<a href="<?=site_url('bug-tracker-issues/edit').'/'.$issue_obj->id?>" class="button"><?=ucfirst(_('edit'))?></a>
<a href="<?=site_url('bug-tracker-issues/delete').'/'.$issue_obj->id?>" class="button"><?=ucfirst(_('delete'))?></a>
<?php if ( $issue_obj->commentmode == '1'):?>
    <a href="<?=site_url("bug-tracker-issue-comments/create/".$issue_obj->id)?>" class="button"><?=ucfirst(_('add commnet'))?></a>
<?php endif; ?>
<br /><br />
<div id="view_issue" class="box">
    <div class="box-header">
        <h1>Issue Details</h1>
    </div>
    <div class="box-content">
        <div class="column-left">
            <h3><?=$issue_obj->name?></h3>
            <p><?=$issue_obj->description?></p>
        </div>
        <div class="column-right">
            <div style="margin-bottom: 5px;"><span class="glyph user"></span> <?=$user_obj->first_name.' '.$user_obj->last_name?></div>
            <div style="margin-bottom: 5px;"><span class="glyph calendar"></span> <?=time_since($issue_obj->datetime_added)?></div>
            <div style="margin-bottom: 5px;"><span class="glyph eye"></span> <?=($issue_obj->visible)? ucfirst(_('public')) : ucfirst(_('private'))?></div>
            <div style="margin-bottom: 5px;"><span class="glyph flag"></span> <?=ucfirst(_($issue_obj->priority))?></div>
            <div>
                <?php if( !(in_array($auth->user_id, $users_issue_assigned) && $issue_obj->status == 'new') ) :  ?>
                <span class="glyph pinpoint"></span> <?=ucfirst(_($issue_obj->status))?>
                <?php else : ?>
                <form method="post" action="" novalidate="novalidate">
                    <p>
                        <select name="select_status" id="select_status" placeholder="status" class="{validate:{required:true}}">
                            <option value="acknowledged" <?=($issue_obj->status == 'acknowledged') ? 'selected' : ''?>><?=ucfirst(_('acknowledged'))?></option>
                            <option value="confirmed" <?=($issue_obj->status == 'confirmed') ? 'selected' : ''?>><?=ucfirst(_('confirmed'))?></option>
                        </select>
                    </p>
                    <p style="position: relative; z-index: 99;">
                        <input type="submit" value="Save" class="button" id="save_issue_details" />
                    </p>

                </form>
                <?php endif; ?>
            </div>
        </div>
        <div class="clear"></div>
        <div class="comments">
            <?php if ( $issue_obj->commentmode == '1' && !empty($comments_list)):?>

                <?php include( APPLICATIONPATH.'views/spina/bug_tracker/comments/list.php'); ?>

            <?php elseif(!($issue_obj->commentmode == '1')) : ?>
            <h3><?=ucfirst(_('Topic of commets was closed'))?></h3>
            <?php else : ?>
                <h3><?=ucfirst(_('No comments'))?></h3>
            <?php endif; ?>
        </div>

    </div>

</div>

