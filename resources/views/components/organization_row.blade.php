<tr>
    <td>
        @php
            echo $name;
        @endphp
    </td>
    <td>
        @php
            echo $leader_name;
        @endphp
    </td>
    <td>
        <a data-toggle="tooltip" title="{{ config('tooltips.competitor_edit_button') }}" href="{{ route('competitors.edit', [$comp_id], 'edit') }}" class="card-link">Szerkesztés</a>
    </td>
</tr>