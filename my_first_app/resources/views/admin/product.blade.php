
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
        <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
        @csrf
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
            @foreach ($products as $product)
<tr>
    <!-- Each row has its own form -->
    <form action="{{ url('uploadproduct') }}" method="post">
        @csrf
        <td>{{ $product->id }}</td>
        <td>{{ $product->category }}</td>
        <td>{{ $product->name }}</td>
        <td>
            <!-- Show current stock levels -->
            <p>Small: {{ $product->stock_s }}</p>
            <p>Medium: {{ $product->stock_m }}</p>
            <p>Large: {{ $product->stock_l }}</p>
        </td>
        <td>
            <!-- Inputs to update stock -->
            <input type="number" class="form-control" name="stock_s" placeholder="Add stock (S)" min="0">
            <input type="number" class="form-control" name="stock_m" placeholder="Add stock (M)" min="0">
            <input type="number" class="form-control" name="stock_l" placeholder="Add stock (L)" min="0">
        </td>
        <td>
            <!-- Update Price -->
            <input type="text" class="form-control" name="price" value="{{ $product->price }}" placeholder="Update Price">
        </td>
        <td>
            <!-- Send product ID with hidden input -->
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <!-- Submit the form for this specific product -->
            <button type="submit" class="btn-edit">Update</button>
        </td>
    </form>
</tr>
@endforeach


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


</script>


 <!--- hi--->