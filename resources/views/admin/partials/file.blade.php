<style type="text/css">
  #img_pre{
    max-height: 200px;
  }
  .file-input{
    position:relative;
  }
  input#uploadfile {
    position:absolute;
    left:0;
    top:0;
    opacity:0;
    width: 55px;
    height: 2.5em;
  }
  #img_progress{
    display: none;
  }
</style>
@php
// dd(file_exists(public_path($img)));
$defaultImg = isset($img) && file_exists(public_path($img)) ? $img : ($defaultImg ?? '/assets/img/avatars/avatar8.jpg');
// dd(isset($img) && file_exists(public_path($img)),$defaultImg);
$fileName = isset($fileName) ? $fileName : 'avatar';
$path = isset($path) ? 1 : 0;
@endphp
<div class="col-lg-6 animated fadeIn" style="{{isset($width)?('width:'.$width.'px;'):''}}{{isset($height)?('height:'.$height.'px;'):''}}">
    <div class="img-container {{ $animated ?? 'fx-img-rotate-l' }}">
        <img id="img_pre" class="img-responsive" src="{{ $defaultImg }}" alt="">
        <div class="img-options">
            <div class="img-options-content">
                <h3 class="font-w400 text-white push-5" id="img_title">{{ $title ?? '图片' }}</h3>
                <h4 class="h6 font-w400 text-white-op push-15" id="img_desc">{{ $desc ?? '操作' }}</h4>
                <div class="file-input btn btn-sm btn-default">
                    <i class="fa fa-pencil"></i>选择
                    <input type="file" name="uploadfile" id="uploadfile"
                    @if(in_array($fileName,['avatar','img']))
                    accept="image/*"
                    @endif
                    >
                </div>
                <input id="{{$fileName}}" name="{{$fileName}}" type="hidden" value="{{$img ?? ''}}">
                <button class="btn btn-sm btn-default" type="button" id="deletefile"><i class="fa fa-times"></i> 删除</button>
                <!-- <a class="btn btn-sm btn-default mt-10" id="sureup" href="javascript:void(0)"><i class="fa fa-file"></i> 上传</a> -->
            </div>
        </div>
    </div>
</div>
<div class="col-xs-6 col-sm-3 mt-30" id="img_progress">
    <i class="fa fa-4x fa-sun-o fa-spin"></i>
</div>
{!! $slot !!}
@push('htmlend')
@if(!isset($jqUploadJs))
<script src="{{ asset('assets/js/plugins/file.js')}} "></script>
@php
$jqUploadJs = true;
//避免重复引入js
@endphp
@endif
<script type="text/javascript">
  function AjaxFileUpload(fileInputId) {
    // data: {'Accept': 'application/x-www-form-urlencoded','Authorization': 'Bearer getToken()'},
    jQuery('#img_progress').show();
    jQuery.ajaxFileUpload({
        url:"/admin/upload",
        fileElementId: fileInputId, //文件上传域的ID，这里是input的ID，而不是img的
        dataType: 'json', //返回值类型 一般设置为json
        data: {_token: $('meta[name="csrf-token"]').attr('content'),type: '{{$fileName}}',path: {{$path}}},
        contentType: "multipart/form-data; charset=utf-8;",
        success: function (data) {
            //alert(data.state+" "+ data.msg);
            if (data.state === true){
                @if(in_array($fileName,['avatar','img']))
                jQuery('#img_pre').attr("src",data.url);
                @endif
if(data.path){
                  jQuery("#{{$fileName}}").val(data.path);
                }else{
                  jQuery("#{{$fileName}}").val(data.url);
                }
                jQuery('#img_title').text(data.name);
            }else{
                swal(data.msg, "上传失败");
            }
        },
        complete: function (data) {
          jQuery('#img_progress').hide();
        }

    });
  }
</script>
@endpush
@push('scripts')
jQuery('#deletefile').on('click',function(){
      jQuery("#img_pre").attr("src", "{{$defaultImg}}") ;
      jQuery("#{{$fileName}}").val('');
      jQuery('#img_title').text('');
      jQuery('#img_progress').hide();
})

jQuery('#sureup').on('click',function(){
      AjaxFileUpload('uploadfile');
})
jQuery('#uploadfile').on('change',function(){
  // console.log(this.files[0]);
  var objUrl = getObjectURL(this.files[0]) ; //获取图片的路径，该路径不是图片在本地的路径
  jQuery('#img_desc').text(objUrl.name);
  if (objUrl) {
      @if(in_array($fileName,['avatar','img']))
jQuery("#img_pre").attr("src", objUrl) ; //将图片路径存入src中，显示出图片
      @endif
      AjaxFileUpload('uploadfile');
  }
})

@endpush