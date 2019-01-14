<main>
    <?php if(count($products) > 0) : ?>
        <table style="border: 1px solid black;border-collapse: collapse;">
            <thead>
                <th>Product</th>
                <th>Description</th>
                <th>Price $</th>
                <th></th>
            </thead>
            <?php foreach($products as $product) : ?>
            <tbody>
                <td><?php echo $product['name']?></td>
                <td><?php echo $product['description']?></td>
                <td><?php echo $product['price']?></td>
                <td><a href="product-detail?product_id=<?php echo $product['id'] ?>" class="button">Buy</a></button></td>
            </tbody>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <div><p>No products available</p></div>
    <?php endif; ?> 
</main>