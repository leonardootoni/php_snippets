<?php require_once "header.php"?>
<main>
    <form action="process.php">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="" id="name">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="text" name="age" id="age">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="text" name="address" id="address">
        </div>
        <div>
            <label for="postalCode">Postal Code:</label>
            <input type="text" name="postalCode" id="postalCode">
        </div>

        <input type="submit" value="Submit" id="submitBtn">
    </form>
</main>
<script src="main.js"></script>
<?php require_once "footer.php"?>