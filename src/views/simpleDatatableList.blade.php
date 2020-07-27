<!DOCTYPE html>
<html>

<head>
    <title>{{isset($title)?$title:"Dynamic Tables"}}</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                @if(isset($table_cols))
                    @foreach($table_cols as $col_name)
                        <th>{{$col_name}}</th>
                    @endforeach
                @endif                    
            </tr>
        </thead>
        <tbody>
            @foreach($result_set as $result)
            <tr>
                @foreach($table_cols as $col_name)
                <td>{{isset($result[$col_name])?$result[$col_name]:''}}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                if(isset($table_cols))
                    @foreach($table_cols as $col_name)
                        <th>{{$col_name}}</th>
                    @endforeach
                @endif
            </tr>
        </tfoot>
    </table>
</body>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

</html>
