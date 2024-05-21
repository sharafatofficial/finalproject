<aside class="col-lg-4 @@sidebar">
 


 <!-- categories -->
 <div class="widget widget-categories">
   <h4 class="widget-title"><span>Categories</span></h4>
   <ul class="list-unstyled widget-list">
       @foreach($category as $cat)
     <li><a href="{{url('cat_detail').'/'.$cat->id}}" class="d-flex">{{$cat->name}}<small class="ml-auto"></small></a></li>
  @endforeach
   </ul>
 </div><!-- tags -->

 <div class="widget">
   <h4 class="widget-title"><span>Tags</span></h4>
   <ul class="list-inline widget-list-inline widget-card">
    @foreach($tags as $tag)
     <li class="list-inline-item"><a href="{{url('tag_detail/'.$tag->id)}}">{{$tag->name}}</a></li>
    @endforeach
    </ul>
 </div><!-- recent post -->
   <!-- post-item -->
 <!-- Social -->
</aside>