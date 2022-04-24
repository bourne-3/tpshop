<x-layout/>
    <!-- 右 -->
    <div class="content">
        <div class="header">
            <h1 class="page-title">商品列表</h1>
        </div>

        <div class="well">
            <!-- search button -->
            <form action="{{ url('/goods/') }}" method="get" class="form-search">
                <div class="row-fluid" style="text-align: left;">
                    <div class="pull-left span4 unstyled">
                        <p> 商品名称：<input class="input-medium" name="keyword" value="{{request()->input('keyword')}}" type="text"></p>
                    </div>
                </div>
                <button type="submit" class="btn">查找</button>
                <a class="btn btn-primary" href="{{ url('/goods/create') }}">新增</a>
            </form>
        </div>
        <div class="well">
            <!-- table -->
            <table class="table table-bordered table-hover table-condensed">
                <thead>
                    <tr>
                        <th>编号</th>
                        <th>商品名称</th>
                        <th>商品价格</th>
                        <th>商品数量</th>
                        <th>商品logo</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $item)
                        <tr class="success">x
                            <td>{{$item->id}}</td>
                            <td><a href="{{ url('/goods/read', ['id' => $item->id]) }}">{{$item->goods_name}}</a></td>
                            <td>{{$item->goods_price}}</td>
                            <td>{{$item->goods_number}}</td>
                            <td><img src="{{ \Illuminate\Support\Facades\Storage::url($item->goods_logo) }}"></td>
                            <td>{{$item->create_time}}</td>
                            <td>
                                <a href="{{ url('/goods/edit', ['id' => $item->id]) }}"> 编辑 </a>
                                <a href="javascript:void(0);" onclick="if(confirm('确认删除？')) location.href='{{ url('/goods/delete', ['id' => $item->id]) }}'"> 删除 </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <!-- pagination -->
            <div class="pagination">
                <ul>
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">Next</a></li>
                </ul>
            </div>
        </div>

        <!-- footer -->
        <footer>
            <hr>
            <p>© 2017 <a href="javascript:void(0);" target="_blank">ADMIN</a></p>
        </footer>
    </div>

