<tr>
    <td>
        <?php
            echo $name;
        ?>
    </td>
    <td>
        <?php
            echo $start_date;
        ?>
    </td>
    <td>
        <?php
            echo $end_date;
        ?>
    </td>
    <td>
        <a href="<?php echo e(route('competitions.edit', [$comp_id], 'edit')); ?>" class="card-link"
            data-toggle="tooltip" title="<?php echo e(config('tooltips.competition_edit_button')); ?>">Szerkesztés</a>
    </td>
</tr><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/components/competition_row.blade.php ENDPATH**/ ?>