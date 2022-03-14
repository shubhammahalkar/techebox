@if (count($offer_ids) > 0)




    <table class="table">
        <tr>
            <th>Sr.no</th>
            <th>Title</th>

        </tr>

        @foreach ($offer_ids as $key => $id)
            @php
                $offer = \App\Models\Offer::findOrFail($id);
            @endphp
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $offer->title }}</td>


            </tr>
        @endforeach
    </table>

@endif
