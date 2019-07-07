<tr>
    <td>
        @php
            echo $name;
        @endphp
    </td>
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
            echo $organization_id;
        @endphp
    </td>
    <td>
        <a href="{{ route('competitors.edit', [$comp_id], 'edit') }}" class="card-link">Szerkesztés</a>
    </td>
</tr>