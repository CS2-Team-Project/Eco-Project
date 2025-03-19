
<!DOCTYPE html>
<html lang="en">
  <head>
   
     @include('admin.css');
     <style type="text/css">
        .title
        {
            color:white; padding-top: 60px; font-size: 25px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        </style>

  </head>
  <body>
   
      @include('admin.sidebar');

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">

        <div class ="container" align ="center">

        <h1 class="title">Stock Products</h1>

        <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div style="padding: 15px;">
        <label>Product ID</label>
        <input type="text" name="title" placeholder="enter the product ID" required="">
</div>

<div style="padding: 15px;">
        <label>Category ID</label>
        <input type="text" name="title" placeholder="Enter the category ID" required="">
</div>

<div style="padding: 15px;">
        <label>Product Name</label>
        <input type="text" name="title" placeholder="Enter the product name" required="">
</div>

<div style="padding: 15px;">
        <label>Purchasing Price</label>
        <input type="text" name="title" placeholder="Enter the product cost" required="">
</div>


<div style="padding: 15px;">
        <label>Selling Price</label>
        <input type="text" name="title" placeholder="Enter the product price" required="">
</div>

<div style="padding: 15px;">
        <label>Description</label>
        <input type="text" name="title" placeholder="Enter the product descriptions" required="">
</div>

<div style="padding: 15px;">
            <label>Stock by Size</label>
            <div id="size-quantity-container">
                <div class="size-quantity-row">
                    <select name="size[]">
                        <option value="">Select Size</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                    </select>
                    <input type="number" name="quantity[]" placeholder="Enter quantity" min="1" required="">
                    <button type="button" onclick="removeRow(this)">Delete</button>
                </div>
            </div>
            <button type="button" onclick="addSizeRow()">Add Size</button>
        </div>
        

</div>
</div>
<script>
    function addSizeRow() {
        let container = document.getElementById('size-quantity-container');
        let newRow = document.createElement('div');
        newRow.classList.add('size-quantity-row');
        newRow.innerHTML = `
            <select name="size[]">
                <option value="">Select Size</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>

            </select>
            <input type="number" name="quantity[]" placeholder="Enter quantity" min="1" required="">
            <button type="button" onclick="removeRow(this)">Delete</button>
        `;
        container.appendChild(newRow);
    }

    function removeRow(button) {
        button.parentElement.remove();
    }
</script>


        @include('admin.navbar');

          <!-- partial -->

          @include('admin.script');
      
  </body>
</html>