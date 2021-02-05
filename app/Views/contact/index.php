<section class="py-5">
    <header class="text-center">
        <p class="text-muted text-uppercase mb-1">Get in touch</p>
        <h2 class="h5 text-uppercase mb-4">Contact Us</h2>
    </header>

    <div class="row">
        <div class="col-md-4 company-info">
            <h3>Peculiar Shopaholic</h3>
            <ul>
                <li><i class="fa fa-road"></i> 44 Main Street</li>
                <li><i class="fa fa-phone"></i> (555) 555-5555</li>
                <li><i class="fa fa-envelope"></i> <a href="" class="email" data-cfemail="186c7d6b6c586870777d767160367b7775">[email&#160;protected]</a></li>
            </ul>
        </div>


        <div class="col-md-8">
            <table class="contact">
                <form id="contact-form">
                    <tr class="table-row">
                        <td class="table-cell half">
                            <label>Name</label>
                            <input type="text" name="name" id="name" required>
                        </td>
                        <td class="table-cell half">
                            <label>Company</label>
                            <input type="text" name="company" id="company">
                        </td>
                    </tr>

                    <tr class="table-row">
                        <td class="table-cell">
                            <label>E-mail Address</label>
                            <input type="email" name="email" id="email" required>
                        </td>
                        <td class="table-cell">
                            <label>Phone Number</label>
                            <input type="text" name="phone" id="phone">
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
</section>

<?php require_once VIEWS."/layouts/partials/site/newsletter.php"?>