 @isset($categories)
     

 <div class="list-group">
                    @foreach($categories as $category)
                    <li class="list-group-item">
                        <a href="#">{{$category->name}}<span class="badge bg-danger float-end">{{$category->articleCount()}}</span></a>
                    </li>
                  @endforeach         
                  @endisset   
               
               
               
               
