@extends('admin.app')

@section('htmlheader_title')
活动管理
@endsection

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<section class="block block-primary">
			<div class="block-header">
				<ul class="block-options">
					<li>
						<a class="btn btn-default btn-sm" href="{{ URL::route('admin.event.create') }}"><i class="fa fa-plus"></i> 添加活动</a>
					</li>
				</ul>
				<h3 class="block-title">活动管理</h3>
			</div>

			<div class="block-content">

				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="50">#</th>
							<th width="100">名称</th>
							<th width="90">限制人数</th>
							<th width="90">报名人数</th>
							<th>截止日期</th>
							<th>图</th>
							<th>活动二维码</th>
							<th colspan="3" width="120">管理</th>
						</tr>
					</thead>
					<tbody>
						@foreach($events as $e)
						<tr>
							<td>{{ $e->id }}</td>
							<td>{{ $e->title }}</td>
							<td>{{ $e->limit }}</td>
							<td>{{ $e->event_user()->count() }}</td>
							<td>{{ $e->date }}</td>
							<td style="white-space: inherit;">
								<img src="{{$e->cover_image}}" width='50'/>
							</td>
							<td style="white-space: inherit;">
								<a href="{{$e->qrcode}}" target="_blank"><img src="{{$e->qrcode}}" width='50'/></a>
							</td>
							<td width="60"><a class="btn btn-default btn-xs" href="{{ URL::route('admin.event.edit', $e->id) }}"><i class="fa fa-edit"></i> 编辑</a></td>
							<td width="60">
								<!-- <a class="btn btn-default btn-xs" href="{{ URL::route('admin.event.come', $e->id) }}"> 签到</a> -->
								<button class="btn btn-default btn-xs qiandao" data-toggle="modal" data-target="#qiandao" data-id="{{$e->id}}" type="button"><i class="si si-user-following"></i>签到</button>
							</td>

							<td width="60">{!! Form::open(['route' => ['admin.event.update', $e->id], 'method' => 'DELETE']) !!}
								{!! Form::submit('删除', ['class' => 'btn btn-danger btn-xs', 'onclick' => 'return confirm("确定删除?");']) !!}
								{!!  Form::close() !!}
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@include('admin.partials.paginator', ['paginator' => $events])
			</div>
			<div class="block-footer"></div>
		</section>
	</div>
</div>
<div class="modal fade" id="qiandao" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideleft">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">活动签到 <small>当前活动ID:<span id="id"></span></small></h3>
                </div>
	            <div class="block-content block-content-narrow" >
                	<div class="form-group has-warning" style="min-height: 40px;">
                	    <div class="col-sm-9">
                	        <div class="form-material">
                	            <input class="form-control" type="text" id="user_id" name="user_id" placeholder="扫码或者手动输入用户ID">
                	            <label for="user_id">扫码填入</label>
                	        </div>
                	    </div>
                	</div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">取消</button>
                <button class="btn btn-sm btn-primary" type="button" onclick="sbmt()"><i class="fa fa-check"></i> 确认</button>
            </div>
        </div>
    </div>
</div>
<!-- Small Modal -->
<div class="modal" id="msg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-light">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">通知</h3>
                </div>
                <div class="block-content">

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> 关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- END Small Modal -->
<script type="text/javascript">
    function sbmt() {
    	id = jQuery('#id').text();
    	user_id = jQuery('#user_id').val();
    	if(user_id){
    		    	 $.ajax({
    		    	  url: "/admin/event/come/"+id+"/"+user_id,
    		    	  method: "POST",
    		    	  data: { '_token':'{{ csrf_token() }}'},
    		    	  dataType: "json",
    		    	}).done(function(msg) {
    		    	  // console.log(msg);
    		    	  // if(txt === '赞'){
    		    	    if(msg.statu >0){
    		    	    	showmodal(msg.msg);
    		    	    	console.log(msg.msg);
    			    	  }else{
    		    	    	showmodal(msg.msg);
    			    	    console.log(msg.msg);
    			    	  }
    			    	  jQuery('#user_id').val('');
    		    	}).fail(function(res) {
						showmodal('请求失败,稍后重试.');
    		    	});
    	}else{
    		showmodal('请输入签到人ID');
    	}
    }
    function showmodal(msg) {
    	jQuery('#msg .block-content').text(msg);
    	jQuery('#msg').modal('show');
    }
	jQuery(function () {
    jQuery('.qiandao').on('click',function () {
    	id = jQuery(this).data('id');
    	jQuery('#id').text(id);
    	// console.log(id);
    })
  });
</script>
@endsection