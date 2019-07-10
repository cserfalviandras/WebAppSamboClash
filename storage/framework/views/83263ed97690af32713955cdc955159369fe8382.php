<tr>
    <td>
        <?php
            echo $name;
        ?>
    </td>
    <td>
        <?php
            echo $age_group_id;
        ?>
    </td>
    <td>
        <?php
            echo $weight_cat_id;
        ?>
    </td>
    <td>
        <?php
            echo $organization_id;
        ?>
    </td>
    <td>
        <a href="<?php echo e(route('competitors.edit', [$comp_id], 'edit')); ?>" class="card-link">Szerkesztés</a>
    </td>
</tr><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/components/competitor_row.blade.php ENDPATH**/ ?>