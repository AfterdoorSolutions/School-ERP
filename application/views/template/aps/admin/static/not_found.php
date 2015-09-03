 <?php      $this->load->view(TEMPLATE_ADMIN_NAME.'/include/header');?>
 <section>
            <div class="notfoundpanel">
                <h1>404!</h1>
                <h3>The page you are looking for has not been found!</h3>
                <p>The page you are looking for might have been removed, had its name changed, or unavailable. Maybe you could try a search:</p>
                <a href="<?php echo admin_url(); ?>" class='btn btn-primary'>Back to Dashboard</a>
            </div><!-- notfoundpanel -->
        </section>
        <?php      $this->load->view(TEMPLATE_ADMIN_NAME.'/include/footer');?>