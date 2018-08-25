@extends('admin.app')

@section('htmlheader_title')
用户管理
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <section class="block">
      <div class="block-content">
        <div class="row">
          <div class="col-md-8">
            @verbatim
            <div class="form-inline push-20">
              <div class="form-group">
                <label><i class="fa  fa-filter"></i> 筛选： </label>
                <select class="form-control input-sm" v-model="keyword">
                  <option v-for="(se,index) in valueSelect" :key="index" :value="se.value">{{se.label}}</option>
                </select>
                <select class="form-control input-sm" v-model="type">
                  <option v-for="(se,index) in typeSelect" :key="index" :value="se.value">{{se.label}}</option>
                </select>
              </div>
              <div class="form-group">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" v-model="value" placeholder="">
                  <span class="input-group-btn">
                    <button class="btn btn-default btn-flat" @click="search" type="submit">搜索</button>
                  </span>
                </div>

                <div class="form-group">
                  <label><i class="fa  fa-flag"></i> 排序： </label>
                  <select class="form-control input-sm" v-model="sort">
                    <option v-for="(se,index) in sortSelect" :key="index" :value="se.value">{{se.label}}</option>
                  </select>
                  <select class="form-control input-sm" v-model="sortBy">
                    <option v-for="(se,index) in sortBySelect" :key="index" :value="se.value">{{se.label}}</option>
                  </select>
                </div>
              </div>
            </div>
            @endverbatim
          </div>
          <div class="col-md-4 text-right">
            <a href="users/create" class="btn btn-default btn-sm margin-left"><i class="fa fa-plus"></i> 添加账户</a>
          </div>
        </div>
      </div>
    </section>

    <section class="block block-primary">
      <div class="block-header with-border">
        <h3 class="block-title">用户列表</h3>
        <div class="block-tools pull-right">
        </div>
      </div>
      <div class="block-content">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th width="50" class="hidden-xs">ID</th>
              <th>称呼</th>
              <th class="hidden-xs">登陆名</th>
              <th width="120" class="hidden-xs">角色</th>
              <th colspan="2" width="120">管理</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            @php
            //dd($user);
            @endphp
            @if(true)
            <tr>
              <td class="hidden-xs"> {{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td class="hidden-xs">{{ $user->email }}</td>
              <td class="hidden-xs">
                @if($user->roles)
                @foreach($user->roles as $role)
                <span class="label label-info">{{ $role->display_name }}</span>
                @endforeach
                @endif
              </td>
              <!-- <td>{{ $user->wechat_openid?'绑定':'' }}</td> -->
              <td width="60"><a class="btn btn-default btn-xs" href="{{ URL::route('admin.users.edit', $user->id) }}"><i class="fa fa-edit"></i> 编辑</a></td>
              <td width="60">
                {!! Form::open(['route' => ['admin.users.update', $user->id], 'method' => 'DELETE']) !!}
                  {!! Form::submit('删除', ['class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("此操作将会删除远端数据，确定删除？");']) !!}
                  {!!  Form::close() !!}
                @php
                /*
                <form action="{{route('admin.users.delete', $user->id)}}" method="POST">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                    <input class="btn btn-danger btn-xs" onclick="return confirm('确定删除?');" type="submit" value="删除">
                </form>
                */
                 @endphp
              </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
          {{ $users->links() }}
        </div>
        <div class="block-footer"></div>
      </section>
    </div>

  </div>
  @endsection
@push('htmlend')
<script src="{{ asset('assets/js/vue.js') }}"></script>
<script type="text/javascript">
const app = new Vue({
  el: '#app',
  data: {
    url: '{{route('admin.users.index')}}',
    keyword: 'name',
    type: '=',
    typeSelect: [
      { value: '=',label: '等于'},
      { value: 'like',label: '包含'}
    ],
    value: null,
    valueSelect: [
      { value: 'name',label: '称呼'}
    ],
    sort: 'id',
    sortSelect: [
      { value: 'id',label: '创建时间'},
      { value: 'name',label: '称呼'}
    ],
    sortBy: '-',
    sortBySelect: [
      { value: '-',label: '倒序'},
      { value: '',label: '正序'}
    ],
    filter: @json(request('filter'))
  },
  methods: {
    init() {
      let filter = JSON.parse(this.filter);
      let sort = @json(request('sort'));
      // console.log(sort);
      this.type = filter[this.keyword]['operation'];
      this.value = filter[this.keyword]['value'];
      sortFirst = sort.substr(0, 1);
      if(sortFirst == '-'){
        this.sortBy = '-';
        this.sort = sort.substr(1, sort.length - 1);
      console.log(this.sort);
      }else{
        this.sortBy = '';
        this.sort = sort;
      }
      // this.sort = filter['sort'];
      // this.sortBy = filter['sortBy'];
    },
    search() {
      let filter = {};
      if(this.value){
      filter[this.keyword] = {
        operation: this.type,
        value: this.value
      };
        let para = {
          page: 1,
          per_page: 10,
          sort: this.sortBy + this.sort,
          filter: filter
        };
        // this.filter = JSON.stringify(para);
        console.log(json2params(this.url,para));
        // newUrl = +'?'+this.filter;
        location.href = json2params(this.url,para);
        // console.log(newUrl);
      }else{
        alert('请输入搜索内容!');
      }
    }
  },
  mounted() {
    this.init();
  }

});
</script>
@endpush