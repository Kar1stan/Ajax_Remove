<?php include_once __DIR__ . '/header.php' ?>
<div class="container">
    <?php if(count($products) > 0) { ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Articul</th>
                <th scope="col">Image</th>
                <th scope="col">Image name</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($products as $key => $product) { ?>
            <tr>
                <th scope="row"><?= $key ?></th>
                <td><?= $product['name'] ?></td>
                <td><?= $product['articul'] ?></td>
                <td><img src='/storage/<?= $product['image'] ?? 'placeholder.png' ?>' style='height: 40px;'></td>
                <td><?= $product['image'] ?></td>
                <button type="button" data-id="<?=$key?>" class="btn-danger button-delete">Remove</button>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <? } else { ?>
    <h4 class="text-center">No data</h4>
    <?php } ?>
</div>

<script>
$(".button_delete").click(function({
alert($(this).data('id');
$rem=$(this);
$msg='Удаление успешно';
}));
$($rem).remove();
$.ajax({
  method: "POST",
  url: "app/ProductsController.php",
  data:$rem,
})
  .success(function( msg ) {
    toastr.success(msg);
  });
  </script>
<?php include_once __DIR__ . '/footer.php' ?>