<font color="#000000" face="微軟正黑體" style="text-align: center">
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th width="100" style="text-align: center">id</th>
                        <th width="100" style="text-align: center">名稱</th>
                        <th width="120" style="text-align: center">token</th>
                        <th width="100" style="text-align: center">修改</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($restaurant as $rs)
                        <tr>
                            {{--<td>{{$sf->id}}</td>--}}
                            <td>{{$rs->id}}</td>
                            <td>{{$rs->name}}</td>
                            <td>{{$rs->token}}</td>
                            <td><a href="{{ route('backstage.manager.token.edit',$rs->id) }}" class="btn btn-info" style="text-decoration:none;">修改</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
</font>