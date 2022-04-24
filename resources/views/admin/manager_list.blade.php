<x-layout/>
<!-- 右 -->
<div class="content">
    <div class="header">
        <h1 class="page-title">管理员列表</h1>
    </div>

    <div class="well">
        <!-- search button -->
        <form action="" method="get" class="form-search">
            <div class="row-fluid" style="text-align: left;">
                <div class="pull-left span4 unstyled">
                    <p> 用户名：<input class="input-medium" name="" type="text"></p>
                </div>
            </div>
            <button type="submit" class="btn">查找</button>
            <a class="btn btn-primary" href={{ url('/manager/create') }}>新增</a>
        </form>
    </div>
    <div class="well">
        <!-- table -->
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>编号</th>
                    <th>用户名</th>
                    <th>昵称</th>
                    <th>邮箱</th>
                    <th>是否可用</th>
                    <th>上次登录时间</th>
                    <th>操作</th>
                </tr>
            </thead>

            @foreach($manager_list as $item)
                <tbody>
                <tr class="success">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->nickname }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $mapper[$item->status] }}</td>
                    <td>{{ $item->create_time }}</td>
                    <td>
                        <a href="{{ url('/manager/edit', ['id' => $item->id]) }}"> 编辑 </a>
                        <a href="javascript:void(0);" onclick="if(confirm('确认删除？')) location.href='{{ url('/manager/delete', ['id' => $item->id]) }}'"> 删除 </a>
                        <a href="{{ url('/manager/reset_password', ['id' => $item->id]) }}"> 重置密码 </a>
                    </td>
                </tr>
                </tbody>
            @endforeach


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

