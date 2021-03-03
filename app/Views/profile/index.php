<section class="py-3">
    <div class="conainer p-0">
        <div class="row">
            <?php require_once VIEWS."/profile/_profile.php"?>
            <div class="col-lg-9 mx-3">
                <section class="pt-2">
                    <header>
                        <h2>My Orders</h2>
                        <?php if(count($orders)>0):?>

                        <p>All orders <?=count($orders)?></p>
                        <?php else:?>
                            <h2>No Orders Yet</h2>
                        <?php endif?>
                    </header>
                </section>

                <div class="row mt-3">
                    <?php if(count($orders)>0):?>
                        <table>
                            <tr>
                                <th>#</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php foreach ($orders as $order) :?>
                                <tr>
                                    <td><?=$order->id?></td>
                                    <td><?=$order->order_date?></td>
                                    <td><?=$order->status?></td>
                                    <td>
                                        <a href="/profile/orders/view/<?=$order->id?>"><button>View</button></a>
                                        <a href="/profile/orders/check/<?=$order->id?>"><button>Check Out</button></a>
                                    </td>
                                </tr>
                               
                            <?php endforeach ?>
                        </table>

                    <?php endif?>
                </div>
            </div> 
        </div>


    </div>



</section>