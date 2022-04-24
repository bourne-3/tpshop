<x-layout/>
    <div class="content">
        <div class="header">
            <h1 class="page-title">管理员编辑</h1>
        </div>

        <div class="well">
            <!-- edit form -->
            <form action="{{ url('/manager/update') }}" method="post" id="tab">
                @csrf
                <input type="hidden" name="id" value={{$manager_detail->first()->id}}>

                <label>用户名：</label>
                <input type="text" name="username" value="{{ $manager_detail->first()->username }}" class="input-xlarge">
                <label>昵称：</label>
                <input type="text" name="nickname" value="{{ $manager_detail->first()->nickname }}" class="input-xlarge">
                <label>邮箱：</label>
                <input type="text" name="email" value="{{ $manager_detail->first()->email }}" class="input-xlarge">
                <button class="btn btn-primary" type="submit" >保存</button>
            </form>
        </div>
        <!-- footer -->
        <footer>
            <hr>
            <p>© 2017 <a href="javascript:void(0);" target="_blank">ADMIN</a></p>
        </footer>
    </div>

