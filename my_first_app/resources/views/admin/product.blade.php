
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

      <div class="container-fluid page-body-wrapper">

        <div class ="container" align ="center">

        <h1 class="title">Manage Products</h1>

            <table>
            <thead>
            <tr>
            <th>ID</th>
            <th>Category</th>
            <th>Name</th>
            <th>Stock (S/M/L)</th>
            <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($productdata as $product)
                <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->name }}</td>
            <td>
            <input type="number" class="form-control" id="stock_s_{{ $product->id }}" value="{{ $product->stock_s }}" min="0">
            <input type="number" class="form-control" id="stock_m_{{ $product->id }}" value="{{ $product->stock_m }}" min="0">
            <input type="number" class="form-control" id="stock_l_{{ $product->id }}" value="{{ $product->stock_l }}" min="0">
            </td>
            <td>
            <button class="btn-edit" onclick="updateProduct({{ $product->id }})">Update</button>
            <button class="btn-delete" onclick="deleteProduct({{ $product->id }})">Delete</button>
            </td>
            </tr> <!----the foundations for adding products should now be there -->
            @endforeach
            </tbody>
             </table>
            </div>
            </div>

@include('admin.navbar')
@include('admin.script')

</body>
</html>

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


 