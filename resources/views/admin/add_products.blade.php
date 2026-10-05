
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>
<style>
  form{
      padding: 20px 30px;
  }
  .alert {
    margin-top: 80px;
    position: relative;
    z-index: 1100;
}
</style>
<body>
    @include('admin.admin_navbar')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
    <h2>Add Product</h2>

    <form id="productForm" action="{{url('/product')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Product Name -->
        <div>
            <label>Product Name:</label><br>
            <input type="text" name="pro_name"  id="name" >
            <small id="nameError" style="color: red; flex-direction:column "></small>
        </div>
        <br>

         <select name="category" required>
        <option value="mobile">Mobile</option>
        <option value="case">Case</option>
        <option value="powerbank">Power Bank</option>
        <option value="airburds">Air Burds</option>
        <option value="headphones">Headphones</option>
    </select>
  <br>
        <!-- Price -->
        <div>
            <label>Price:</label><br>
            <input type="number" name="pro_price" required>
        </div>
        <br>

        <!-- Description -->
        <div>
            <label>Description:</label><br>
            <textarea name="pro_description" rows="4" cols="30" required></textarea>
        </div>
        <br>

        <!-- Image -->
        <div>
            <label>Product Image:</label><br>
            <input type="file" name="image[]" multiple required>
        </div>
        <br>

        <button type="submit" >Add Product</button>

    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
//     const name = document.getElementById("name");


// name.addEventListener("keydown", function(e) {
//     if (e.key === "Enter") {
//        console.log(name.value);
//     }
// });
//   const name = document.getElementById("agenumber");

// name.addEventListener("keydown", function(e) {

//     if (e.key === "A") {

//         let ageNumber = parseInt(name.value);

//         if (ageNumber === 18) {
//             alert("Your age is " + ageNumber);
//         }

//     }

// });
const form = document.getElementById("productForm");
const name = document.getElementById("name");
const nameError = document.getElementById("nameError");

form.addEventListener("submit", function(e) {

    if (name.value === "") {
        e.preventDefault();
        nameError.innerText = "Name is required";
    }

});
</script>
</body>
</html>