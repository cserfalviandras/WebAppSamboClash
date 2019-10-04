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
            if (isset($competitors->where("id", ($competitors_in_clash["comp_id"] ))->first()->name)) {
                echo $competitors->where("id", ($competitors_in_clash["comp_id"] ))->first()->name;
            }
        @endphp
    </td>
    <td>
        @php
            if (isset($competitors->where("id", ($competitors_in_clash["comp_id_2"] ))->first()->name)) {
                echo $competitors->where("id", ($competitors_in_clash["comp_id_2"] ))->first()->name;
            }
        @endphp
    </td>
    <td>
        <a href="{{ route('clashes', [$clash_id], 'edit') }}" class="card-link">Szerkesztés</a>
    </td>
</tr>