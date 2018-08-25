@extends('admin.app')

@section('subject',$tableName)

@section('htmlheader_title')
{{$tableName}}
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <section class="block">
      <div class="block-content">
        <div class="row">
          <div class="col-md-10">
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
                  <button class="btn btn-sm btn-default btn-flat" @click="search('sort')" type="submit">排序</button>
                </div>
              </div>
            </div>
            @endverbatim
          </div>
          <div class="col-md-2 text-right">
            <a href="news/create" class="btn btn-default btn-sm margin-left"><i class="fa fa-plus"></i> 添加数据</a>
          </div>
        </div>
      </div>
    </section>

    <section class="block block-primary">
      <div class="block-header with-border">
        <h3 class="block-title">数据列表</h3>
        <div class="block-tools pull-right">
        </div>
      </div>
      <div class="block-content fulltable">
        <table class="table table-bordered table-striped">
          <thead>
              <tr>
                  <th class="text-center" style="width: 50px;">#</th>
                  <th>标题</th>
                  <th>作者</th>
                  <th>关键词</th>
                  <th>备注</th>
                  <th>发布时间</th>
                  <th>更新时间</th>
                  <th colspan="2" width="120">管理</th>
              </tr>
          </thead>
          <tbody>
            @foreach($tableList as $tableItem)
            <tr>
              <td style="white-space:nowrap">{{$tableItem->id}}</td>
              <td style="white-space:nowrap">{{$tableItem->title}}</td>
              <td style="white-space:nowrap">{{$tableItem->auther}}</td>
              <td style="white-space:nowrap">{{$tableItem->keyword}}</td>
              <td style="white-space:nowrap">{{$tableItem->note}}</td>
              <td style="white-space:nowrap">{{$tableItem->published_at}}</td>
              <td style="white-space:nowrap">{{$tableItem->updated_at}}</td>
              <!-- <td>{{ $tableItem->wechat_openid?'绑定':'' }}</td> -->
              <td width="60"><a class="btn btn-default btn-xs" href="{{ URL::route('admin.news.edit', $tableItem->id) }}"><i class="fa fa-edit"></i> 编辑</a></td>
              <td width="60">
                {!! Form::open(['route' => ['admin.news.update', $tableItem->id], 'method' => 'DELETE']) !!}
                  {!! Form::submit('删除', ['class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("此操作将会删除远端数据，确定删除？");']) !!}
                {!!  Form::close() !!}
              </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $tableList->links() }}
        </div>
        <div class="block-footer"></div>
      </section>
    </div>

  </div>
  @endsection
@push('htmlend')
<script src="{{ asset('assets/js/vue.js') }}"></script>
<script type="text/javascript">
new Vue({
  el: '#app',
  data: {
    url: '{{route('admin.news.index')}}',
    keyword: 'title',
    type: '=',
    typeSelect: [
      { value: '=',label: '等于'},
      { value: 'like',label: '包含'}
    ],
    value: null,
    valueSelect: [
      { value: 'title',label: '标题'}
    ],
    sort: 'id',
    sortSelect: [
      { value: 'id',label: '创建时间'},
      { value: 'title',label: '标题'}
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
      // console.log(filter);
      if(filter && filter[this.keyword]){
        this.type = filter[this.keyword]['operation'];
        this.value = filter[this.keyword]['value'];
      }
      if(sort){
        sortFirst = sort.substr(0, 1);
        if(sortFirst == '-'){
          this.sortBy = '-';
          this.sort = sort.substr(1, sort.length - 1);
        // console.log(this.sort);
        }else{
          this.sortBy = '';
          this.sort = sort;
        }
      }
      // this.sort = filter['sort'];
      // this.sortBy = filter['sortBy'];
    },
    search(func) {
      let filter = {};
      if(this.value || func === 'sort'){
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