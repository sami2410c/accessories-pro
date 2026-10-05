@include('admin.admin_navbar')
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    
</head>
<style>
  form{
      padding: 20px 30px;
  }
</style>
<body>

    <h2>Add Product</h2>
{{-- action="{{url('/product')}}" method="POST" enctype="multipart/form-data --}}
{{-- @csrf --}}


<form action="{{ url('/update', $update->id) }}" method="POST" enctype="multipart/form-data">
  @csrf

    <!-- ID -->
    <label>ID: {{ $update->id }}</label><br>

    <!-- Name -->
    <input type="text" name="pro_name" value="{{ $update->pro_name }}" required><br><br>

    <!-- Category -->
      <select name="category" required>
        <option value="mobile">Mobile</option>
        <option value="case">Case</option>
        <option value="powerbank">Power Bank</option>
        <option value="airburds">Air Burds</option>
        <option value="headphones">Headphones</option>
    </select><br><br>

    <!-- Price -->
    <input type="number" name="pro_price" value="{{ $update->pro_price }}" required><br><br>

    <!-- Description -->
    <textarea name="pro_description">{{ $update->pro_description }}</textarea><br><br>

    <!-- Image -->
    <input type="file" name="image[]" multiple required><br><br>

    <!-- Old Image -->
    <img src="{{ asset('img_upload/'.$update->image[0]) }}" width="80"><br><br>

    <button type="submit">Update Product</button>
</form>
</body>
</html>