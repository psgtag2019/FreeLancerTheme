<?php get_header(); ?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <?php _e( 'Menu', 'freelancer' ); ?>
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio"><?php _e( 'Portfolio', 'freelancer' ); ?></a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about"><?php _e( 'About', 'freelancer' ); ?></a>
                </li>
                <li class="nav-item mx-0 mx-lg-1">
                    <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact"><?php _e( 'Contact', 'freelancer' ); ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php PG_Helper::rememberShownPost(); ?>
        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
            <header class="masthead bg-primary text-white text-center">
                <div class="container d-flex align-items-center flex-column">
                    <!-- Masthead Avatar Image -->
                    <?php echo PG_Image::getPostImage( null, 'post-thumbnail', array(
                            'class' => 'masthead-avatar mb-5'
                    ), 'both', null ) ?>
                    <!-- Masthead Heading -->
                    <h1 class="masthead-heading text-uppercase mb-0"><?php bloginfo( 'name' ); ?></h1>
                    <!-- Icon Divider -->
                    <div class="divider-custom divider-light">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <!-- Masthead Subheading -->
                    <p class="masthead-subheading font-weight-light mb-0"><?php bloginfo( 'description' ); ?></p>
                </div>
            </header>
            <?php
                $portfolio_args = array(
                    'post_type' => 'portfolio_item',
                    'post_status' => 'publish',
                    'nopaging' => true,
                    'order' => 'ASC',
                    'orderby' => 'menu_order'
                )
            ?>
            <?php $portfolio = new WP_Query( $portfolio_args ); ?>
            <?php if ( $portfolio->have_posts() ) : ?>
                <section class="page-section portfolio" id="portfolio">
                    <div class="container">
                        <!-- Portfolio Section Heading -->
                        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?php _e( 'Portfolio', 'freelancer' ); ?></h2>
                        <!-- Icon Divider -->
                        <div class="divider-custom">
                            <div class="divider-custom-line"></div>
                            <div class="divider-custom-icon">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="divider-custom-line"></div>
                        </div>
                        <!-- Portfolio Grid Items -->
                        <div class="row">
                            <!-- Portfolio Item 1 -->
                            <?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
                                <div class="col-md-6 col-lg-4">
                                    <a href="<?php echo '#portfolioModal-'.get_the_ID() ?>" class="portfolio-item"><div class="portfolio-item mx-auto" data-toggle="modal" data-target="<?php echo '#portfolioModal-'.get_the_ID() ?>">
                                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                                <div class="portfolio-item-caption-content text-center text-white">
                                                    <i class="fas fa-plus fa-3x"></i>
                                                </div>
                                            </div>
                                            <?php echo PG_Image::getPostImage( null, 'large', array(
                                                    'class' => 'img-responsive',
                                                    'sizes' => 'max-width(320px) 85vw, max-width(768px) 55vw, max-width(1024px) 34vw, max-width(1600px) 350px, 350px'
                                            ), 'both', null ) ?>
                                        </div></a>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                            <!-- Portfolio Item 2 -->
                            <!-- Portfolio Item 3 -->
                            <!-- Portfolio Item 4 -->
                            <!-- Portfolio Item 5 -->
                            <!-- Portfolio Item 6 -->
                        </div>
                        <!-- /.row -->
                    </div>
                </section>
            <?php endif; ?>
            <section class="page-section bg-primary text-white mb-0" id="about">
                <div class="container">
                    <!-- About Section Heading -->
                    <h2 class="page-section-heading text-center text-uppercase text-white"><?php the_title(); ?></h2>
                    <!-- Icon Divider -->
                    <div class="divider-custom divider-light">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <!-- About Section Content -->
                    <?php $columns = explode( "<hr>", get_the_content() );
                           $column_1 = ''; $column_2 = '';
                           if(count($columns) > 0) { $column_1 = $columns[0]; }
                           if(count($columns) > 1) { $column_2 = $columns[1]; } ?>
                    <div class="row">
                        <div class="col-lg-4 ml-auto">
                            <p class="lead"><?php echo $column_1 ?></p>
                        </div>
                        <div class="col-lg-4 mr-auto">
                            <p class="lead"><?php echo $column_2 ?></p>
                        </div>
                    </div>
                    <!-- About Section Button -->
                    <?php
                        $attachments_args = array(
                            'category_name' => 'resume',
                            'post_type' => 'attachment',
                            'post_status' => 'any',
                            'nopaging' => true
                        )
                    ?>
                    <?php $attachments = new WP_Query( $attachments_args ); ?>
                    <?php if ( $attachments->have_posts() ) : ?>
                        <?php while ( $attachments->have_posts() ) : $attachments->the_post(); ?>
                            <?php PG_Helper::rememberShownPost(); ?>
                            <div class="text-center mt-4">
                                <a class="btn btn-xl btn-outline-light" href="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>"><i class="fas fa-download mr-2"></i><?php _e( 'Resume&nbsp;', 'freelancer' ); ?></a>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.', 'freelancer' ); ?></p>
                    <?php endif; ?>
                </div>
            </section>
            <section class="page-section" id="contact">
                <div class="container">
                    <!-- Contact Section Heading -->
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><?php _e( 'Contact Me', 'freelancer' ); ?></h2>
                    <!-- Icon Divider -->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                    </div>
                    <!-- Contact Section Form -->
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                            <form name="sentMessage" id="contactForm" novalidate="novalidate" action="<?php echo esc_url( get_template_directory_uri() ); ?>/mail/contact_me.php" method="post">
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <label>
                                            <?php _e( 'Name', 'freelancer' ); ?>
                                        </label>
                                        <input class="form-control" id="name" type="text" placeholder="Name" required="required" data-validation-required-message="Please enter your name.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <label>
                                            <?php _e( 'Email Address', 'freelancer' ); ?>
                                        </label>
                                        <input class="form-control" id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Please enter your email address.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <label>
                                            <?php _e( 'Phone Number', 'freelancer' ); ?>
                                        </label>
                                        <input class="form-control" id="phone" type="tel" placeholder="Phone Number" required="required" data-validation-required-message="Please enter your phone number.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <label>
                                            <?php _e( 'Message', 'freelancer' ); ?>
                                        </label>
                                        <textarea class="form-control" id="message" rows="5" placeholder="Message" required="required" data-validation-required-message="Please enter a message."></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="success"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">
                                        <?php _e( 'Send', 'freelancer' ); ?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="footer text-center">
                <div class="container">
                    <div class="row">
                        <!-- Footer Location -->
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <h4 class="text-uppercase mb-4"><?php echo get_post_meta( get_the_ID(), 'footer1_title', true ); ?></h4>
                            <p class="lead mb-0"><?php echo get_post_meta( get_the_ID(), 'footer1_text', true ); ?></p>
                        </div>
                        <!-- Footer Social Icons -->
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <h4 class="text-uppercase mb-4"><?php echo get_post_meta( get_the_ID(), 'footer2_title', true ); ?></h4>
                            <?php if ( get_post_meta( get_the_ID(), 'social_facebook', true ) ) : ?>
                                <a class="btn btn-outline-light btn-social mx-1" href="<?php echo get_post_meta( get_the_ID(), 'social_facebook', true ); ?>"> <i class="fab fa-fw fa-facebook-f"></i> </a>
                            <?php endif; ?>
                            <?php if ( get_post_meta( get_the_ID(), 'social_twitter', true ) ) : ?>
                                <a class="btn btn-outline-light btn-social mx-1" href="<?php echo get_post_meta( get_the_ID(), 'social_twitter', true ); ?>"> <i class="fab fa-fw fa-twitter"></i> </a>
                            <?php endif; ?>
                            <?php if ( get_post_meta( get_the_ID(), 'social_linkedin', true ) ) : ?>
                                <a class="btn btn-outline-light btn-social mx-1" href="<?php echo get_post_meta( get_the_ID(), 'social_linkedin', true ); ?>"> <i class="fab fa-fw fa-linkedin-in"></i> </a>
                            <?php endif; ?>
                            <?php if ( get_post_meta( get_the_ID(), 'social_dribbble', true ) ) : ?>
                                <a class="btn btn-outline-light btn-social mx-1" href="<?php echo get_post_meta( get_the_ID(), 'social_dribbble', true ); ?>"> <i class="fab fa-fw fa-dribbble"></i> </a>
                            <?php endif; ?>
                        </div>
                        <!-- Footer About Text -->
                        <div class="col-lg-4">
                            <h4 class="text-uppercase mb-4"><?php echo get_post_meta( get_the_ID(), 'footer3_title', true ); ?></h4>
                            <p class="lead mb-0"><?php echo get_post_meta( get_the_ID(), 'footer3_text', true ); ?></p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    <?php endwhile; ?>
<?php else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.', 'freelancer' ); ?></p>
<?php endif; ?>
<!-- Masthead -->
<!-- Portfolio Section -->
<!-- About Section -->
<!-- Contact Section -->
<!-- Footer -->
<!-- Copyright Section -->
<section class="copyright py-4 text-center text-white">
    <div class="container">
        <small><?php _e( 'Copyright &copy;', 'freelancer' ); ?> <span><?php bloginfo( 'name' ); ?></span> <span><?php echo date( 'Y' ); ?></span></small>
    </div>
</section>
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"> <i class="fa fa-chevron-up"></i> </a>
</div>
<!-- Portfolio Modals -->
<!-- Portfolio Modal 1 -->
<?php
    $modals_args = array(
        'post_type' => 'portfolio_item',
        'post_status' => 'publish',
        'nopaging' => true,
        'order' => 'ASC',
        'orderby' => 'menu_order'
    )
?>
<?php $modals = new WP_Query( $modals_args ); ?>
<?php if ( $modals->have_posts() ) : ?>
    <?php while ( $modals->have_posts() ) : $modals->the_post(); ?>
        <div class="portfolio-modal modal fade" id="portfolioModal-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"> <i class="fas fa-times"></i> </span>
                    </button>
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title -->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"><?php the_title(); ?></h2>
                                    <!-- Icon Divider -->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon">
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <div class="divider-custom-line"></div>
                                    </div>
                                    <!-- Portfolio Modal - Image -->
                                    <?php echo PG_Image::getPostImage( null, 'large', array(
                                            'class' => 'img-fluid rounded mb-5'
                                    ), 'both', null ) ?>
                                    <!-- Portfolio Modal - Text -->
                                    <?php the_content(); ?>
                                    <button class="btn btn-primary" href="#" data-dismiss="modal">
                                        <i class="fas fa-times fa-fw"></i>
                                        <?php _e( 'Close Window', 'freelancer' ); ?>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php get_footer(); ?>