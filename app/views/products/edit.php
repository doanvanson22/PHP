<?php
include_once 'app/views/share/header.php'
?>

<div class="row">

    <h1>
        <?php if(isset($errors))
                var_dump($errors);
            ?>
    </h1>

    <form action="/buoi4php/product/update/<?=$product->id?>" method="post" enctype="multipart/form-data">


        <input type="hidden" name="id" value="<?=$product->id?>">

        <div class="form-group">
            <label for="name">Name </label>
            <input type="text" class="form-control" id="name" name="name" value="<?=$product->name?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description"
                value="<?=$product->description?>">
        </div>
        <div class="form-group">
            <label for="price">Price</label>

            <input type="number" class="form-control" id="price" name="price" value="<?=$product->price?>">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <img src="/buoi4php/<?=$product->image?>" />
            <br>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php
include_once 'app/views/share/footer.php'
?>