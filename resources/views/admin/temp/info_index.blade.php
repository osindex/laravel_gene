@extends('admin.app')

@section('htmlheader_title')
    {{$tableName}}
@endsection

@section('subject')
    {{$tableName}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="block">
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4 text-right">
                            <a href="{{$table}}/create" class="btn btn-default btn-sm margin-left"><i class="fa fa-plus"></i> 添加{{$tableName}}</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="block block-primary">
                <div class="block-header with-border">
                    <h3 class="block-title">{{$tableName}}列表</h3>
                    <div class="block-tools pull-right">
                        <small class="text-success">若内容未显示完全,请向右滑动</small>
                    </div>
                </div>
                <div class="block-content fulltable">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            @foreach ($columns as $key => $element)
                                @if ($key == 'id')
                                <th width="50" class="hidden-xs">ID</th>
                                @else
                                <th>{{ $element }}</th>
                                @endif
                            @endforeach
                            <th colspan="2">管理</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($tableList as $tableItem)
                        <tr>
                            @foreach ($columns as $key => $element)
                                <td style="white-space:nowrap">
                                @if (str_contains($key,'->'))
                                @php
                                    $relation = explode('->', $key);
                                @endphp
                                {{ $tableItem->{$relation[0]}->{$relation[1]} }}
                                @elseif ($key == 'img')
                                    @if(file_exists(public_path($tableItem->img)))
                                    <a target="_blank" href="{{ $tableItem->img }}"><img src="{{ $tableItem->img }}" width="200px"></a>
                                    @else
                                    暂无
                                    @endif
                                @else
                                {{ str_limit(strip_tags($tableItem->{$key}),50) }}
                                @endif
                                </td>
                            @endforeach
                            <td><a class="btn btn-default btn-xs" href="{{ URL::route("admin.{$table}.edit", $tableItem->id) }}"><i class="fa fa-edit"></i> 编辑</a></td>
                            <td>
                                {!! Form::open(['route' => ["admin.{$table}.update", $tableItem->id], 'method' => 'DELETE']) !!}
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