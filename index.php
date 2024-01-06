<?php 
include __DIR__. '/partials/header.php';
// var_dump($comics);

if (isset($_GET['available'])) {
    $available = $_GET['available'];
    // foreach($comics as $item) {
    //     if ($item['available'] == (bool) $available) {
    //         $temp_array[] = $item;
    //     }
    // }
    // $comics = $temp_array;
    $comics = array_filter($comics, fn($item) => $available === 'all' || $item['available'] == $available);
}

if (isset($_GET['type'])) {
    $type = $_GET['type'];
    // foreach($comics as $type) {
    //     if ($item['type'] == $type) {
    //         $temp_array[] = $item;
    //     }
    // }
    // $comics = $temp_array;
    $comics = array_filter($comics, fn($item) => $type === 'all' || $item['type'] == $type);
}
?>
<main class="container mb-3">
    <div class="row gy-4">
        <?php if(count($comics) > 0) { ?>
            <?php foreach($comics as $item) { ?>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="card">
                    <img src="<?php echo $item['thumb'] ?>" class="card-img-top" alt="<?php echo $item['series'] ?>">
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $item['series'] ?>
                    </h5>
                    <p class="card-text">
                    <?php echo $item['type'] ?> <br/>
                    <?php echo $item['price'] ?> <br/>
                    </p>
                    <span class="btn <?php echo $item['available']? 'btn-success' : 'btn-danger'?>">
                        <?php echo $item['available'] ?>
                    </span>
                </div>
            </div>
            <?php } ?>
        <?php } else {?>
            <div class= "col-12 alert-danger alert">non ci sono risultati</div>
        <?php } ?>
    </div>
</main>
<?php 
include __DIR__. '/partials/footer.php';
?>