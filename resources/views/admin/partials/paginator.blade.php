<?php
$presenter = new \Illuminate\Pagination\BootstrapThreePresenter($paginator);
?>
@if ($paginator->lastPage() > 1)
<ul class="pagination">
    <?php echo $presenter->render(); ?>   
</ul>
<div style="display: inline-block;margin: 20px 0;border-radius: 4px;width:150px;padding:2px 2px 2px 20px;">
    <form action="{{$paginator->url(0)}}">
    <div class="input-group input-group-sm">
        @if(!empty($param))
        @foreach($param as $k=>$v)
        <input type="hidden" value="{{$v}}" name="{{$k}}" >
        @endforeach
        @endif
        <input class="form-control"  type="number" name="page" min="0" max="<?php echo $paginator->lastPage(); ?>" value="<?php echo $paginator->currentPage(); ?>" placeholder="页 #">
        <span class="input-group-btn">
          <button type="submit" class="btn btn-default btn-flat">跳转</button>
      </span>
  </div>
  </form>
</div>
@endif