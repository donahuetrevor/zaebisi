<div class="box">
    <div class="box-header">
        <h1><?=_('issue list')?></h1>
    </div>

    <table class="datatable">
        <thead>
        <tr>
            <th><?=ucfirst(_('ID'))?></th>
            <th><?=ucfirst(_('title'))?></th>
            <th><?=ucfirst(_('status'))?></th>
            <th><?=ucfirst(_('priority'))?></th>
            <th><?=ucfirst(_('date added'))?></th>
            <th><?=ucfirst(_('actions'))?></th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($issue_list)): ?>
            <?php foreach($issue_list as $issue_obj): ?>
            <tr>
                <td><?=$issue_obj->id?></td>
                <td><?=$issue_obj->name?></td>
                <td><?=$issue_obj->status?></td>
                <td><?=$issue_obj->priority?></td>
                <td><?=time_since($issue_obj->datetime_added)?></td>
                <td>
                    <a href="<?=site_url('bug-tracker-issues/view').'/'.$issue_obj->id?>" class="button plain"><?=ucfirst(_('details'))?></a>
                    <a href="<?=site_url('bug-tracker-issues/edit').'/'.$issue_obj->id?>" class="button plain"><?=ucfirst(_('edit'))?></a>
                    <a href="<?=site_url('bug-tracker-issues/delete').'/'.$issue_obj->id?>" class="button plain"><?=ucfirst(_('delete'))?></a>
                </td>
            </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
