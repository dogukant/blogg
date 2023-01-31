 @isset($categories)


 <div class="list-group">
                    @foreach($categories as $category)
                    <li class="list-group-item @if(Request::segment(2)==$category->slug) active @endif">
                        <a @if(Request::segment(2)!=$category->slug) href="{{route('category',$category->slug)}}" @endif>{{$category->name}}<span class="badge bg-danger float-end">{{$category->articleCount()}}</span></a>
                    </li>
                  @endforeach
                  @endisset




