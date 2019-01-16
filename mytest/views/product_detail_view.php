<main>
    <form action="add-to-cart" method="POST">
        <div>
            <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>">
            <label for="name">Product:</label>
            <input type="text" id="name" size="50" value="<?php echo $product['name'] ?>">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" cols="50" rows="5"><?php echo $product['description'] ?>
            </textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" id="price" value="<?php echo $product['price'] ?>">
        </div>
        <div>
            <img src="<?php echo $product['image_url'] ?>" alt="" width="300" height="300">
        </div>
        <div>
            <label for="qty">Quantity:</label>
            <input type="number" name="qty" id="qty" min="0" step="1" value="1">
            <input type="submit" value="Add to Cart">
        </div>
    </form>
</main>