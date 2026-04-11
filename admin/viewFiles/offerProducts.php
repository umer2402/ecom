<div class="col-12">
  <h2>Product Management</h2>
  <table id="productTable" class="display">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>SKU</th>
        <th>Price</th>
        <th>Featured</th>
        <th>Special</th>
        <th>Offer</th>
        <th>New</th>
      </tr>
    </thead>
    <tbody id="productList" class="text-center"></tbody>
  </table>
</div>
  <script>
    const statuses = ['featured', 'special', 'offer', 'new'];

    function renderStatusButtons(productId, assignedStatuses) {
      return statuses.map(status => {
        const hasStatus = assignedStatuses.includes(status);
        const btnClass = hasStatus ? 'removeStatusBtn btn-danger' : 'assignStatusBtn btn-success';
        const action = hasStatus ? 'Remove' : 'Add';
        return `<button class="${btnClass} btn" data-status="${status}" data-product-id="${productId}">${action} ${status}</button>`;
      }).join(' ');
    }

    function loadProducts() {
      $.ajax({
        url: 'scripts/getProducts.php',
        method: 'GET',
        success: function(data) {
          let rows = '';
          data.forEach(product => {
            rows += `
              <tr>
                <td>${product.productName}</td>
                <td>${product.SKU}</td>
                <td>${product.price}</td>
                ${statuses.map(status => {
                  const has = product.statuses.includes(status);
                  const action = has ? 'Remove' : 'Add';
                  const btnClass = has ? 'removeStatusBtn btn btn-danger' : 'assignStatusBtn btn btn-success';
                  return `<td><button class="${btnClass}" data-product-id="${product.productId}" data-status="${status}">${action}</button></td>`;
                }).join('')}
              </tr>
            `;
          });
          $('#productList').html(rows);
          $('#productTable').DataTable();
        }
      });
    }

    // Assign status
    $(document).on('click', '.assignStatusBtn', function() {
      const productId = $(this).data('product-id');
      const status = $(this).data('status');

      $.post('scripts/assignStatus.php', { productId, status }, function() {
        loadProducts();
      });
    });

    // Remove status
    $(document).on('click', '.removeStatusBtn', function() {
      const productId = $(this).data('product-id');
      const status = $(this).data('status');

      $.post('scripts/removeStatus.php', { productId, status }, function() {
        loadProducts();
      });
    });

    $(document).ready(function() {
      loadProducts();
    });
  </script>


