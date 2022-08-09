<?php
require_once 'curl_user.php';
require_once 'userTransaction.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- CSS  -->
    <link rel="stylesheet" href="/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<!--Nav bar-->
<nav class="navbar navbar-expand-lg" style="background-color: #e3e3e3;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/transaction/user/<?php print $rand?>">Random user</a>

        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
            <!-- Transaction menu -->
        <?php if (isset($_GET['q'])): ?>
            <a class="navbar-brand" href="/">Home</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li>
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">Available users list</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal1">Current user transaction</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <?php foreach ($response as $r): ?>
                               <a class="link" id="modal-link" href="/transaction/user/<?php echo $r['id'] ?>">User: <?php echo $r['id'] . "</br>" ?></a>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <?php endif; ?>
        <!-- Transaction menu end -->
    </div>
</nav>

<!--Table-->
<p class="table-title">
    <span>User table</span>
</p>

<table class="table">
    <thead class="table-dark">
    <tr>
        <th scope="col">id</th>
        <th scope="col">name</th>
        <th scope="col">email</th>
        <th scope="col">status</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($response as $r): ?>
        <tr>
            <th scope="row"><?php print $r['id'] . "</br>" ?></th>
            <td><?php print $r['name'] . "</br>" ?> </td>
            <td><?php print $r['email'] . "</br>" ?> </td>
            <td><?php print $r['status'] . "</br>" ?> </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">User <?php echo $id ?> transaction:</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach ($response_list as $resl): ?>
                    <pre>
                    <?php print 'customer_id: ' . $resl['customer_id'] . "<br/>" ?>
                    <?php print 'identifier: ' . $resl['identifier'] . "<br/>" ?>
                    <?php print 'timestamp: ' . $resl['timestamp'] . "<br/>" ?>
                    <?php print 'timestamp: ' . $resl['line']['price'] . "<br/>" ?>
                    <?php print 'product_name: ' . $resl['line']['product_name'] . "<br/>" ?>
                    <?php print 'quantity: ' . $resl['line']['quantity'] . "<br/>" ?>
                    <?php print '_______________________' . "<br/>" ?>
                    </pre>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>


