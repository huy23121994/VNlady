<?php $stt = 1 ?>
<div class="">
    <table class="table table-striped" id="list-item" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th width="127px">Created Time</th>
                <th width="127px">Updated Time</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created Time</th>
                <th>Updated Time</th>
            </tr>
        </tfoot>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td><?php echo $stt; $stt++ ?></td>
                <td><a href="{{url('manager/item/'.$item['id'].'/edit')}}">{{$item['title']}}</a></td>
                <td>{{substr($item['description'], 0,100).' ...' }}</td>
                <td>{{$item['created_at']}}</td>
                <td>{{$item['updated_at']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>