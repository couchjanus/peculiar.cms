<section class="py-5">
    <header class="text-center">
        <p class="text-muted text-uppercase mb-1">Get in touch</p>
        <h2 class="h5 text-uppercase mb-4">Contact Us</h2>
    </header>

    <div class="row">
        <div class="col-md-4 company-info">
            <h3>Peculiar Shopaholic</h3>
            <?php if(isset($address)):?>
            <ul>
                <li><i class="fa fa-road"></i> <?= $address['street']?></li>
                <li><i class="fas fa-map-marker-alt"></i> <?= $address['city']?></li>
                <li><i class="fas fa-home"></i> <?= $address['country']?></li>
                <li><i class="fa fa-phone"></i> <?= $address['mobile']?></li>
                <li><i class="fa fa-envelope"></i> <?= $address['email']?></li>
            </ul>
            <?php endif?>
        </div>


        <div class="col-md-8">
            <table class="contact">
                <form id="contact-form" method="POST">
                    <tr class="table-row">
                        <td class="table-cell half">
                            <label>Name</label>
                            <input type="text" name="name" id="name" required>
                        </td>
                        <td class="table-cell">
                            <label>E-mail Address</label>
                            <input type="email" name="email" id="email" required>
                        </td>
                    </tr>


                    <tr class="table-row">
                        <td class="table-cell" colspan="2">
                            <label>Message</label>
                            <textarea name="message" rows="5" id="message"></textarea>
                        </td>
                    </tr>

                    <tr class="table-row">
                        <td class="table-cell" colspan="2">
                            <button type="submit">Submit</button>
                        </td>
                    </tr>
                </form>
            </table>

        </div>


    </div>
    <?php if(isset($messages)):?>
        <?php foreach($messages as $row):?>
            <li class="mb-2">Customer <?=$row['name']?> texted this <?=$row['message']?> at: <?=date("d-m-Y", strtotime($row['created_at']))?></li>
        <?php endforeach?>

    <?php endif?>

</section>

<?php require_once VIEWS."/layouts/partials/site/newsletter.php"?>