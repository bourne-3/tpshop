<x-layout/>
<!-- 右 -->
<div class="content">
    <div class="header">
        <h1 class="page-title">管理员新增</h1>
    </div>

    <div class="well">
        <!-- add form -->
        <form action={{ url('/manager/save') }} method="post" id="tab">
            @csrf
            <label>用户名：</label>
            <input type="text" name="username" value="" class="input-xlarge">
            <label>昵称</label>
            <input type="text" name="nickname" value="" class="input-xlarge">
            <label>密码：</label>
            <input type="password" name="password" value="" class="input-xlarge">
            <label>邮箱：</label>
            <input type="text" name="email" value="" class="input-xlarge">
            <button class="btn btn-primary" type="submit">保存</button>
        </form>
    </div>
    <!-- footer -->
    <footer>
        <hr>
        <p>© 2017 <a href="javascript:void(0);" target="_blank">ADMIN</a></p>
    </footer>
</div>

