<tr>
    <td>
        <input type="checkbox" name="removedClashes[]" value="{{$clash_id}}">
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
            echo $start_time;
        @endphp
    </td>
    <td>
        @php
            echo $clash_status_id;
        @endphp
    </td>
    <td>
        <a href="{{ route('clashes', [$clash_id], 'edit') }}" class="card-link">Szerkesztés</a>
    </td>
</tr>