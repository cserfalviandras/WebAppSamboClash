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
        <a data-toggle="tooltip" title="{{ config('tooltips.organization_edit_button') }}" href="{{ route('organization.edit', [$id], 'edit') }}" class="card-link">Szerkesztés</a>
    </td>
</tr>