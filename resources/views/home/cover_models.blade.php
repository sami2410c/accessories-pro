


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    .all-brand{
      width: 100%;
      height: 500px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 20px;
    }
    .brand-box{
      width: 150px;
      height: 70px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius:20px; 
      background: black;
      color: white;
      cursor: pointer;
      transition: 0.7s;
        box-shadow: 0 10px 20px rgba(0,0,0,0.3);
       /* -webkit-box-reflect: below 3px
    linear-gradient(transparent, rgba(0,0,0,0.4)); */

    }
    
    .brand-box:hover{
      transform: translateY(-8px)
    }

    #sidebar{
      position: fixed;
      right: -300px;
      top: 0;
      width: 300px;
      height: 100vh;
      background: lightgray;
      transition: 0.3s;
      padding: 20px;
      box-sizing: border-box;
      z-index: 9999;
    }

    #sidebar.open{
      right: 0;
    }

    #modelsList p{
      font-size: 18px;
      margin: 15px 0;
    }
    .model-item{
  display: block;
  padding: 14px;
  margin: 8px 0;
  border-radius: 12px;
  background: linear-gradient(135deg, #fff, #f5f5f5);
  border: 1px solid #ddd;
  cursor: pointer;
  transition: 0.3s;
}
  </style>

</head>
<body>

  @include('home.home_navbar')

<div class="all-brand">
<div class="brand-box" onclick="showModels('iphone')">iPhone</div>
<div class="brand-box" onclick="showModels('samsung')">Samsung</div>
<div class="brand-box" onclick="showModels('oppo')">Oppo</div>
</div>

<div id="sidebar">
  <div id="modelsList"></div>
</div>

<script>
const brands = {
  iphone: ["iPhone 15", "iPhone 14", "iPhone 13"],
  samsung: ["Galaxy S24", "Galaxy A55", "Galaxy S23"],
  oppo: ["Oppo Reno 11", "Oppo A78"]
};

function showModels(brandName) {

    let models = brands[brandName];

    let html = "";

    models.forEach(function(model){

       html += `
<p class="model-item" onclick="goToProducts('${model}')">
    ${model}
</p>
`;
    });

    document.getElementById("modelsList").innerHTML = html;

    document.getElementById("sidebar").classList.add("open");
}

function goToProducts(modelName){
   window.location.href = "/model-products/" + encodeURIComponent(modelName);
}
</script>

</body>
</html>