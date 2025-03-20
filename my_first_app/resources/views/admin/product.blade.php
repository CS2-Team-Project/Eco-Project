
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta name="csrf-token" content="{{ csrf_token() }}">

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
            @foreach ($products as $product) <!---products means the table itself--->
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
            </tr> <!----the foundations for adding products is here -->
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
    function addSizeRow() { //adds functionality to adjust table stock
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

        function updateProduct(productId) {
        let stock_s = document.getElementById(`stock_s_${productId}`).value;
        let stock_m = document.getElementById(`stock_m_${productId}`).value;
        let stock_l = document.getElementById(`stock_l_${productId}`).value;

        fetch(`/admin/update-product/${productId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json', //may need to troubleshoot this 
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ //this should work?
                stock_s: stock_s,
                stock_m: stock_m,
                stock_l: stock_l
            })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); //Show success message
        })
        .catch(error => console.error('Error:', error));
    }

    //Function to delete a product
    function deleteProduct(productId) {
        if (confirm("Are you sure you want to delete this product?")) {
            fetch(`/admin/delete-product/${productId}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload(); // Reload the page to update the list
            })
            .catch(error => console.error('Error:', error));
        }
    }

</script>


 