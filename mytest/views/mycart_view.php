<main>
    <?php if ($cartProducts != "null" && count($cartProducts) > 0): ?>
        <table style="border: 1px solid black;border-collapse: collapse;">
            <thead>
                <th>Product</th>
                <th>Qty</th>
                <th>Price $</th>
                <th>Total $</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                <?php foreach ($cartProducts as $product): $id = $product['id'];?>
	                <tr>
	                <td><?php echo $product['name'] ?></td>
	                <td><input id="qty-<?php echo $id ?>" type="number" name="qty" size="2" style="width: 2rem;" value="<?php echo $product['qty'] ?>" min="0" max="99" step="1" onchange="updateLinkUrl(<?php echo $product['id'] ?>)"></td>
	                <td><?php echo $product['price'] ?></td>
			        <td><?php echo $product['total'] ?></td>
			        <td><a id="productId-<?php echo $id ?>" href="mycart?action=update&product_id=<?php echo $id ?>&qty=" class="button">Update</a></td>
			        <td><a href="mycart?action=delete&product_id=<?php echo $id ?>" class="button">Delete</a></td>
			        </tr>
	            <?php endforeach;?>
            </tbody>
        </table>
    <?php else: ?>
        <div><p>No products available</p></div>
    <?php endif;?>
    <script src="static/js/my-cart.js"></script>
</main>