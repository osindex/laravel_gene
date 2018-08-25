@php
//dd($name);
$label = isset($label) ? $label : '正文';
$name = isset($name) ? $name : 'content';
$content = isset($content) ? $content : '';
@endphp
    <div class="summernote-textarea">
        <textarea id="summernote_{{$name}}" name="{{$name}}">
           {{ $content }}
        </textarea>
    </div>
{!! $slot !!}
@push('htmlstart')
<link rel="stylesheet" type="text/css" href="{{ asset('summernote/summernote.css')}} ">
@endpush
@push('htmlend')
<script src="{{ asset('summernote/summernote.min.js')}} "></script>
@if(!isset($jqUploadJs))
<script src="{{ asset('assets/js/plugins/file.js')}} "></script>
@php
$jqUploadJs = true;
//避免重复引入js
@endphp
@endif
@endpush
@push('scripts')
jQuery('#summernote_{{$name}}').summernote({
        height: 200,
        styleTags: ['p', 'blockquote', 'pre', 'h3', 'h4', 'h5'],
        callbacks: {
            onImageUpload: function(files) {
                var data = new FormData();
                console.log(files);
                data.append("uploadfile", files[0]);
                data.append("_token", $('meta[name="csrf-token"]').attr('content'));
                jQuery.ajax({
                    data: data,
                    type: 'POST',
                    url: '{{ url('/admin/upload') }}',
                    cache: false,
                    contentType: false,
                    //"application/json; charset=utf-8;",
                    processData: false,
                    statusCode: {
                        200: function (data) {
                            if (data.state === true) {
                                jQuery('#summernote_{{$name}}').summernote('insertImage', data.url, data.name);
                            } else {
                                swal(data.msg, "上传失败");
                            }
                        },
                        422: function (data) {
                            var result = jQuery.parseJSON(data.responseText);
                            jQuery.each(result.errors, function (field, errors) {
                                jQuery.each(errors, function (index, message) {
                                    swal(message, "上传失败","error");
                                })
                            });
                        },
                        404: function () {
                            swal(message, "上传失败","error");
                        },
                        403: function () {
                            swal('你没有权限进行上传操作', "上传失败","error");
                        },
                        419: function () {
                            swal('服务器未发现文件', "上传失败","error");
                        },
                        413: function () {
                            swal('上传图片大小超出服务器', "上传失败","error");
                        },
                        401: function () {
                            swal('你没有权限进行上传操作', "上传失败","error");
                        },
                        500: function () {
                            swal('服务器开小差了，请在线', "上传失败","error");
                        }
                    }
                });
            }
        }
    });
@endpush