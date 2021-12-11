<?php include "./src/Scenario.php" ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Zigram</title>

    <style>
        .table td,
        .table th {
            padding: 0.25rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid pt-10">
        <div class="row">
            <div class="col-md-6">
                <b>Scenario 1 :</b>
                <ul>
                    <li> Buy:1 console, 2 televisions with different prices and 1 microwave . </li>
                    <li> Sort the items by price and output the total pricing</li>
                    <li> The console and televisions have extras; those extras are controllers.</li>
                    <li> The console has 2 remote controllers and 2 wired controllers.</li>
                    <li> <b>NOTE:</b> Price is randomly set to change output everytime.</li>
                </ul>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Extra</th>
                            <th scope="col">Sub Price(With Extras)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartItems->getSortedItems() as $price => $item) { ?>
                            <tr>
                                <td><?php echo ucfirst($item->getType()); ?></td>
                                <td><?php echo $item->getPrice(); ?></td>
                                <td>
                                    <?php if (count($item->extra)) {

                                        $extraItems = new ElectronicItems($item->extra);
                                    ?>

                                        <table class="table table-bordered">

                                            <tbody>
                                                <?php foreach ($extraItems->getSortedItems() as $extra) { ?>
                                                    <tr>
                                                        <td><?php echo ($extra->getWired() == 1) ? 'Wired' : 'Remote'; ?> Controller</td>
                                                        <td><?php echo $extra->getPrice(); ?></td>
                                                    </tr>

                                                <?php } ?>

                                                <tr>
                                                    <td>Total Price</td>
                                                    <td><?php echo $extraItems->getItemsTotalPrice(); ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    <?php } else {
                                        echo "No Extra";
                                    } ?>
                                </td>
                                <td><?php echo $price; ?></td>
                            </tr>

                        <?php } ?>

                        <tr>
                            <th scope="row" colspan="2"></th>
                            <th scope="row">Total Price</th>
                            <td><?php echo $cartItems->getItemsTotalPrice(); ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="col-md-6">
                <b>Scenario 2 :</b>
                <p>
                    That person’s friend saw her with her new purchase and asked her how much the 
                    console and its controllers had cost her.
                </p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Extra</th>
                            <th scope="col">Sub Price(With Extras)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $cItems = $cartItems->getItemsByType(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);
                        $consoleItems = new ElectronicItems($cItems);
                        foreach ($consoleItems->getSortedItems() as $price => $item) { ?>
                            <tr>
                                <td><?php echo ucfirst($item->getType()); ?></td>
                                <td><?php echo $item->getPrice(); ?></td>
                                <td>
                                    <?php if (count($item->extra)) {

                                        $extraItems = new ElectronicItems($item->extra);
                                    ?>

                                        <table class="table table-bordered">

                                            <tbody>
                                                <?php foreach ($extraItems->getSortedItems() as $extra) { ?>
                                                    <tr>
                                                        <td><?php echo ($extra->getWired() == 1) ? 'Wired' : 'Remote'; ?> Controller</td>
                                                        <td><?php echo $extra->getPrice(); ?></td>
                                                    </tr>

                                                <?php } ?>

                                                <tr>
                                                    <td>Total Price</td>
                                                    <td><?php echo $extraItems->getItemsTotalPrice(); ?></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    <?php } else {
                                        echo "No Extra";
                                    } ?>
                                </td>
                                <td><?php echo $price; ?></td>
                            </tr>

                        <?php } ?>

                        <tr>
                            <th scope="row" colspan="2"></th>
                            <th scope="row">Total Price</th>
                            <td><?php echo $consoleItems->getItemsTotalPrice(); ?></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>