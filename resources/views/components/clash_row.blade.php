<tr>
    <td>
        @php
            echo $age_group_id;
        @endphp
    </td>
    <td>
        @php
            echo $weight_cat_id;
        @endphp
    </td>
    <td>
        @php
            echo $start_time;
        @endphp
    </td>
    <td>
        @php
            echo $clash_status_id;
        @endphp
    </td>
    <td>
        <a href="{{ route('clashes', [$clash_id], 'edit') }}" class="card-link"
            data-toggle="tooltip" title="{{ config('tooltips.clash_edit_button') }}">Szerkesztés</a>
    </td>
    <td>
        <a href="{{ route('matchedit', [$clash_id], 'edit') }}" class="card-link"
            data-toggle="tooltip" title="{{ config('tooltips.clash_start_button') }}">Indítás</a>
    </td>
</tr>