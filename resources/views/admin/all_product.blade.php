@include('admin.admin_navbar')
<style>
table {
    margin: 80px auto;
    width: 70%;
    border-collapse: collapse; 
}

table th,
table td {
   
    line-height: 1.1; 
}
</style>


<table class="table table-bordered table-dark table-hover ">
    <thead>
        <tr>
           
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Image</th>
            <th>btn</th>
          
        </tr>
    </thead>
    
    
    <tbody>
        @foreach ($product as $p)
    
        <tr>
            
            <td>{{$p->pro_name}}</td>
            <td>{{$p->pro_price}}</td>
            <td>{{$p->pro_description}}</td>
            <td>{{$p->image[0]}}</td>
            
             <td><a href="{{ url('/update', $p->id) }}" class="btn border-light  bg-dark text-light">Update</a>
             <a href="{{ url('/delete', $p->id) }}" class="btn btn-danger">Delete</a></td>
            
        </tr>
        @endforeach
    </tbody>
</table>



