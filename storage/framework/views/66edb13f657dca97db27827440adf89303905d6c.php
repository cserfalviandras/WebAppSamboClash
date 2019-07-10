<tr>
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
            echo $start_time;
        ?>
    </td>
    <td>
        <?php
            echo $clash_status_id;
        ?>
    </td>
    <td>
        <a href="<?php echo e(route('clashes', [$clash_id], 'edit')); ?>" class="card-link">Szerkesztés</a>
    </td>
</tr><?php /**PATH D:\Development\POC_laravel_sambo\WebAppSamboClash_versioned\resources\views/components/clash_row.blade.php ENDPATH**/ ?>